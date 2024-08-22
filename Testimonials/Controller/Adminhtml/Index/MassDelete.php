<?php
declare(strict_types=1);

namespace Aditya\Testimonials\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultInterface;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Framework\Exception\LocalizedException;
use Aditya\Testimonials\Api\TestimonialRepositoryInterface;
use Aditya\Testimonials\Model\ResourceModel\Testimonial\CollectionFactory;
class MassDelete extends Action
{
    public const ADMIN_RESOURCE = 'Aditya_Testimonials::Testimonial_delete';

    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     * @param TestimonialRepositoryInterface $testimonialRepositoryInterface
     */
    public function __construct(
        Context $context,
        private Filter $filter,
        private CollectionFactory $collectionFactory,
        private TestimonialRepositoryInterface $testimonialRepositoryInterface
    ) {
        parent::__construct($context);
    }

    /**
     * Mass Delete Action
     *
     * @return ResultInterface
     * @throws LocalizedException
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        foreach ($collection as $item) {
            $this->testimonialRepositoryInterface->deleteById($item->getTestimonialId());
        }
        $this->messageManager->addSuccessMessage(__('Testimonial have been deleted.'));
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('testimonials/index/details');
        return $resultRedirect;
    }
}
