<?php

declare(strict_types=1);

namespace Que\RequestPrice\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Que\RequestPrice\Api\Data\RequestPriceInterface;
use Que\RequestPrice\Model\ResourceModel\RequestPrice as RequestPriceResource;

class RequestPrice extends AbstractExtensibleModel implements RequestPriceInterface
{
    protected function _construct()
    {
        $this->_init(RequestPriceResource::class);
        $this->setIdFieldName('id');
    }

    /**
     * @inheritDoc
     */
    public function getRequestPriceId(): int
    {
        return (int)parent::getData(self::ID);
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return parent::getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function getEmail(): string
    {
        return parent::getData(self::EMAIL);
    }

    /**
     * @inheritDoc
     */
    public function getComment(): string
    {
        return parent::getData(self::COMMENT);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt(): string
    {
        return parent::getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function getStatus(): int
    {
        return (int)parent::getData(self::STATUS);
    }

    /**
     * @inheritDoc
     */
    public function setName(string $name): RequestPriceInterface
    {
        return parent::setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function setEmail(string $email): RequestPriceInterface
    {
        return parent::setData(self::EMAIL, $email);
    }

    /**
     * @inheritDoc
     */
    public function setComment(string $comment): RequestPriceInterface
    {
        return parent::setData(self::COMMENT, $comment);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt(string $createdAt): RequestPriceInterface
    {
        return parent::setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @inheritDoc
     */
    public function setStatus(int $status): RequestPriceInterface
    {
        return parent::setData(self::STATUS, $status);
    }

    /**
     * @inheritDoc
     */
    public function setRequestPriceId(string $id): RequestPriceInterface
    {
        return parent::setData(self::ID, $id);
    }

    /**
     * @inheritDoc
     */
    public function getProductSku(): string
    {
        return parent::getData(self::PRODUCT_SKU);
    }

    /**
     * @inheritDoc
     */
    public function setProductSku(string $productSku): RequestPriceInterface
    {
        return parent::setData(self::PRODUCT_SKU, $productSku);
    }
}

