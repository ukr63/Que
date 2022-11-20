<?php

declare(strict_types=1);

namespace Que\RequestPrice\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Que\RequestPrice\Api\Data\RequestPriceInterface;
use Que\RequestPrice\Api\Data\RequestPriceSearchResultsInterfaceFactory;
use Que\RequestPrice\Api\RequestPriceRepositoryInterface;
use Que\RequestPrice\Model\RequestPriceFactory;
use Que\RequestPrice\Model\ResourceModel\RequestPrice as ResourceRequestPrice;
use Que\RequestPrice\Model\ResourceModel\RequestPrice\CollectionFactory;

class RequestPriceRepository implements RequestPriceRepositoryInterface
{

    public function __construct(
        private RequestPriceFactory                       $requestPriceFactory,
        private ResourceRequestPrice                      $resource,
        private CollectionFactory                         $collectionFactory,
        private RequestPriceSearchResultsInterfaceFactory $searchResultsFactory,
        private CollectionProcessorInterface              $collectionProcessor
    ) {
    }

    /**
     * @inheritDoc
     */
    public function delete(RequestPriceInterface $requestPrice): bool
    {
        try {
            $this->resource->delete($requestPrice);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the request price: %1', $exception->getMessage())
            );
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById(int $requestPriceId): bool
    {
        return $this->delete($this->getById($requestPriceId));
    }

    /**
     * @inheritDoc
     */
    public function getById(int $requestPriceId): RequestPriceInterface
    {
        $requestPrice = $this->requestPriceFactory->create();
        $this->resource->load($requestPrice, $requestPriceId);

        if (!$requestPrice->getId()) {
            throw new NoSuchEntityException(__('The request price with the "%1" ID doesn\'t exist.', $requestPriceId));
        }

        return $requestPrice;
    }

    /**
     * @inheritDoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function save(RequestPriceInterface $requestPrice): RequestPriceInterface
    {
        try {
            $this->isValid($requestPrice);
            $this->resource->save($requestPrice);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
        return $requestPrice;
    }

    public function isValid(RequestPriceInterface $requestPrice): void
    {
        if ($requestPrice->getEmail() === '' || filter_var($requestPrice->getEmail(), FILTER_VALIDATE_EMAIL) === false) {
            throw new \Exception((string)__("Email is not valid!"));
        }
        if ($requestPrice->getName() === '') {
            throw new \Exception((string)__("Name is empty!"));
        }
    }
}
