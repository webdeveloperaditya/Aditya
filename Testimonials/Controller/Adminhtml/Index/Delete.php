<?php
declare(strict_types=1);

namespace Aditya\Testimonials\Controller\Adminhtml\Index;

use Exception;
use Aditya\Testimonials\Api\TestimonialRepositoryInterface;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultInterface;
use Magento\Backend\App\Action;

class Delete extends Action
{
    public const ADMIN_RESOURCE = 'Aditya_Testimonials::Testimonial_delete';

    /**
     * @param Context $context
     * @param TestimonialRepositoryInterface $testimonialRepository
     */
    public function __construct(
        Context $context,
        private TestimonialRepositoryInterface $testimonialRepository
    ) {
        parent::__construct($context);
    }

    /**
     * Delete action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        try {
            $testimonialId = $this->getRequest()->getParam('testimonial_id');
            if ($testimonialId) {
                $this->testimonialRepository->deleteById($testimonialId);
                $this->messageManager->addSuccessMessage(__("Testimonial Delete Successfully."));
            } else {
                $this->messageManager->addError(__('Something is Wrong!, Please Try again'));
            }
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t delete record, Please try again."));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('testimonials/index/details');
        return $resultRedirect;
    }
}
