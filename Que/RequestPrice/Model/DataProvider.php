<?php

declare(strict_types=1);

namespace Que\RequestPrice\Model;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Que\RequestPrice\Model\ResourceModel\RequestPrice\CollectionFactory;
use Que\RequestPrice\Model\ResourceModel\RequestPrice\Collection;

class DataProvider extends AbstractDataProvider
{
    protected $collection;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @return array
     */
    public function getData()
    {
        $items = $this->collection->getItems();
        $array = [];
        foreach ($items as $requestPrice)
            $array[$requestPrice->getId()] = $requestPrice->getData();
        return $array;
    }
}
