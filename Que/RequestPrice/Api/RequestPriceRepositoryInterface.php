<?php

namespace Que\RequestPrice\Api;

use Que\RequestPrice\Api\Data\RequestPriceInterface;
use Que\RequestPrice\Api\Data\RequestPriceSearchResultsInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteriaInterface;

interface RequestPriceRepositoryInterface
{
    /**
     * @param RequestPriceInterface $requestPrice
     * @return bool
     */
    public function delete(RequestPriceInterface $requestPrice): bool;

    /**
     * @param int $requestPriceId
     * @return bool
     */
    public function deleteById(int $requestPriceId): bool;

    /**
     * @param int $requestPriceId
     * @return RequestPriceInterface
     */
    public function getById(int $requestPriceId): RequestPriceInterface;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param RequestPriceInterface $requestPrice
     * @return RequestPriceInterface
     */
    public function save(RequestPriceInterface $requestPrice): RequestPriceInterface;
}
