<?php

declare(strict_types=1);

namespace Que\RequestPrice\Controller\Adminhtml\RequestPrice\Form;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Que\RequestPrice\Api\RequestPriceRepositoryInterface;

class Save extends Action implements HttpPostActionInterface
{
    /**
     * @param Context $context
     * @param RequestPriceRepositoryInterface $requestPriceRepository
     */
    public function __construct(
        Context                                 $context,
        private RequestPriceRepositoryInterface $requestPriceRepository
    ){
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->_request->getParams();

        $requestPrice = $this->requestPriceRepository->getById((int)$data['id']);

        try {
            $requestPrice->setName($data['name']);
            $requestPrice->setEmail($data['email']);
            $requestPrice->setComment($data['comment']);
            $requestPrice->setProductSku($data['product_sku']);
            $requestPrice->setCreatedAt($data['created_at']);
            $requestPrice->setStatus((int)$data['status']);

            $this->requestPriceRepository->save($requestPrice);

            $this->messageManager->addSuccessMessage('Request Price saved.');
        } catch (\Exception $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('request_price/requestprice/listing');

        return $resultRedirect;
    }
}
