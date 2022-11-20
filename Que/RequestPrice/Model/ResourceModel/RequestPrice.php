<?php

declare(strict_types=1);

namespace Que\RequestPrice\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class RequestPrice extends AbstractDb
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('request_price', 'id');
    }
}
