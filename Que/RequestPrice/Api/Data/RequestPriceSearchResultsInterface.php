<?php

namespace Que\RequestPrice\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface RequestPriceSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return RequestPriceInterface[]
     */
    public function getItems(): array;
    /**
     * @param RequestPriceInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
