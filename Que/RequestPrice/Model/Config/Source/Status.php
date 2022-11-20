<?php

declare(strict_types=1);

namespace Que\RequestPrice\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    const NEW = 1;
    const IN_PROGRESS = 2;
    const CLOSED = 3;

    const STATUS = [
        self::NEW => 'New',
        self::IN_PROGRESS => 'In Progress',
        self::CLOSED => 'Closed'
    ];

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            [
                'value' => self::NEW,
                'label' => __('New')
            ],
            [
                'value' => self::IN_PROGRESS,
                'label' => __('In Progress')
            ],
            [
                'value' => self::CLOSED,
                'label' => __('Closed')
            ]
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [self::NEW => __('New'), self::IN_PROGRESS => __('In Progress'), self::CLOSED => __("Closed")];
    }
}
