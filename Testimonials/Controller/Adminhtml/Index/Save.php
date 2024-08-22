<?php
declare(strict_types=1);

namespace Aditya\Testimonials\Controller\Adminhtml\Index;

use Exception;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Aditya\Testimonials\Api\Data\TestimonialInterfaceFactory;
use Aditya\Testimonials\Api\TestimonialRepositoryInterface;

class Save extends Action
{
    public const ADMIN_RESOURCE = 'Aditya_Testimonials::Testimonial_save';

    /**
     * @param Context $context
     * @param TestimonialInterfaceFactory $testimonialInterfaceFactory
     * @param TestimonialRepositoryInterface $testimonialRepositoryInterface
     */
    public function __construct(
        Context $context,
        private TestimonialInterfaceFactory $testimonialInterfaceFactory,
        private TestimonialRepositoryInterface $testimonialRepositoryInterface
    ) {
        parent::__construct($context);
    }

    /**
     * Save testimonial
     *
     * @return ResultInterface|ResponseInterface|Redirect
     */
    public function execute(): ResultInterface|ResponseInterface|Redirect
    {
        /** @var Redirect $resultRedirect */
        $resultPageFactory = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if (!isset($data['testimonial_id'])) {
            $data['created_at'] = date('Y-m-d H:i:s');
        }
        try {
            $testimonials = $this->testimonialInterfaceFactory->create();
            $testimonials->setData($data);
            $this->testimonialRepositoryInterface->save($testimonials);
            $this->messageManager->addSuccessMessage(__("Holiday Saved Successfully."));
            if (isset($data['testimonial_id'])) {
                if ($this->getRequest()->getParam('back')) {
                    return $resultPageFactory->setPath('*/*/edit', ['testimonial_id' => $data['testimonial_id']]);
                }
            }
        } catch (Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
        return $resultPageFactory->setPath('testimonials/index/details');
    }
}
