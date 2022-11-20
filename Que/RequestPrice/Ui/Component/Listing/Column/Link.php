<?php

declare(strict_types=1);

namespace Que\RequestPrice\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;
use Que\RequestPrice\Model\Config\Source\Status;

class Link extends Column
{
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $item['edit'] = '<a href=' . $this->context->getUrl('request_price/requestprice_form/edit', ['id' => $item['id']]) . '>Edit</a>';
                $item['status'] = Status::STATUS[$item['status']] ?? 'New';
            }
        }

        return $dataSource;
    }
}
