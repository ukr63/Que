<?php

namespace Que\RequestPrice\Api\Data;

interface RequestPriceInterface
{
    const ID = 'id';
    const NAME = 'name';
    const EMAIL = 'email';
    const COMMENT = 'comment';
    const PRODUCT_SKU = 'product_sku';
    const CREATED_AT = 'created_at';
    const STATUS = 'status';

    /**
     * @return int
     */
    public function getRequestPriceId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @return string
     */
    public function getComment(): string;

    /**
     * @return string
     */
    public function getProductSku(): string;

    /**
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * @return int
     */
    public function getStatus(): int;

    /**
     * @param string $id
     * @return RequestPriceInterface
     */
    public function setRequestPriceId(string $id): RequestPriceInterface;

    /**
     * @param string $name
     * @return RequestPriceInterface
     */
    public function setName(string $name): RequestPriceInterface;

    /**
     * @param string $email
     * @return RequestPriceInterface
     */
    public function setEmail(string $email): RequestPriceInterface;

    /**
     * @param string $comment
     * @return RequestPriceInterface
     */
    public function setComment(string $comment): RequestPriceInterface;

    /**
     * @param string $productSku
     * @return RequestPriceInterface
     */
    public function setProductSku(string $productSku): RequestPriceInterface;

    /**
     * @param string $createdAt
     * @return RequestPriceInterface
     */
    public function setCreatedAt(string $createdAt): RequestPriceInterface;

    /**
     * @param int $status
     * @return RequestPriceInterface
     */
    public function setStatus(int $status): RequestPriceInterface;
}
