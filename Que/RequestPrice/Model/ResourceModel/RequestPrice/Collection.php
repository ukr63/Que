<?php

declare(strict_types=1);

namespace Que\RequestPrice\Model\ResourceModel\RequestPrice;

use Que\RequestPrice\Model\RequestPrice as RequestPriceModel;
use Que\RequestPrice\Model\ResourceModel\RequestPrice as RequestPriceResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(RequestPriceModel::class, RequestPriceResourceModel::class);
    }
}
