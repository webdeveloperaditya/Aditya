<?php
declare(strict_types=1);

namespace Aditya\Testimonials\Block;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template;
use Aditya\Testimonials\Api\TestimonialRepositoryInterface;
use Magento\Framework\View\Element\Template\Context;

class Testimonials extends Template
{
    /**
     * @param Context $context
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param TestimonialRepositoryInterface $testimonialRepository
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        private SearchCriteriaBuilder $searchCriteriaBuilder,
        private TestimonialRepositoryInterface $testimonialRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Get
     *
     * @return array
     * @throws LocalizedException
     */
    public function getTestimonialsDetails()
    {
        $searchCriteria = $this->searchCriteriaBuilder->create();
        $testimonialsDetails = $this->testimonialRepository->getList($searchCriteria);
        return $testimonialsDetails;
    }
}
