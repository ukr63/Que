<?php

declare(strict_types=1);

namespace Que\RequestPrice\Controller\Form;

use Magento\Catalog\Model\ProductRepository;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Que\RequestPrice\Api\RequestPriceRepositoryInterface;
use Que\RequestPrice\Model\RequestPriceFactory;
use Que\RequestPrice\Model\Config\Source\Status;

class Save implements HttpPostActionInterface
{
    /**
     * @param Http $request
     * @param RequestPriceRepositoryInterface $requestPriceRepository
     * @param RequestPriceFactory $requestPriceFactory
     * @param JsonFactory $jsonFactory
     * @param TimezoneInterface $timezone
     * @param ProductRepository $productRepository
     */
    public function __construct(
        private readonly Http                   $request,
        private RequestPriceRepositoryInterface $requestPriceRepository,
        private RequestPriceFactory             $requestPriceFactory,
        private JsonFactory                     $jsonFactory,
        private TimezoneInterface               $timezone,
        private ProductRepository               $productRepository
    ) {
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Json|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultJson = $this->jsonFactory->create();
        $data = $this->request->getParams();
        $date = $this->timezone->date();

        try {
            $requestPrice = $this->requestPriceFactory->create();
            $product = $this->productRepository->getById($data['productId'] ?? null);

            $requestPrice->setName($data['name'] ?? '');
            $requestPrice->setEmail($data['email'] ?? '');
            $requestPrice->setComment($data['comment'] ?? '');
            $requestPrice->setStatus(Status::NEW);
            $requestPrice->setProductSku($product->getSku());
            $requestPrice->setCreatedAt($date->format('Y-m-d H:i:s'));

            $this->requestPriceRepository->save($requestPrice);
            $resultJson->setData([
                'success' => [
                    'id' => $requestPrice->getId(),
                    'name' => ucfirst($requestPrice->getName()),
                    'message' => __("Запит на ціну відправленний")
                ]
            ]);
        } catch (\Exception $exception) {
            $resultJson->setData(['errors' => $exception->getMessage()]);
        }

        return $resultJson;
    }
}
