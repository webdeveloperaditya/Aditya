<?php
declare(strict_types=1);

namespace Aditya\Testimonials\Model;

use Aditya\Testimonials\Api\Data\TestimonialSearchResultsInterface;
use Exception;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Aditya\Testimonials\Api\Data\TestimonialInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Aditya\Testimonials\Api\TestimonialRepositoryInterface;
use Aditya\Testimonials\Api\Data\TestimonialInterfaceFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Aditya\Testimonials\Api\Data\TestimonialSearchResultsInterfaceFactory;
use Aditya\Testimonials\Model\ResourceModel\Testimonial as ResourceTestimonial;
use Aditya\Testimonials\Model\ResourceModel\Testimonial\CollectionFactory as TestimonialCollectionFactory;

class TestimonialRepository implements TestimonialRepositoryInterface
{
    /**
     * @param ResourceTestimonial $resource
     * @param TestimonialInterfaceFactory $testimonialFactory
     * @param TestimonialCollectionFactory $testimonialCollectionFactory
     * @param TestimonialSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        private ResourceTestimonial $resource,
        private TestimonialInterfaceFactory $testimonialFactory,
        private TestimonialCollectionFactory $testimonialCollectionFactory,
        private TestimonialSearchResultsInterfaceFactory $searchResultsFactory,
        private CollectionProcessorInterface $collectionProcessor,
        private SearchCriteriaBuilder $searchCriteria
    ) {
    }

    /**
     * Save Testimonial
     *
     * @param TestimonialInterface $testimonial
     * @return TestimonialInterface
     * @throws CouldNotSaveException
     */
    public function save(TestimonialInterface $testimonial): TestimonialInterface
    {
        try {
            $this->resource->save($testimonial);
        } catch (Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the testimonial: %1',
                $exception->getMessage()
            ));
        }
        return $testimonial;
    }

    /**
     * Retrieve Testimonial
     *
     * @param string $testimonialId
     * @return TestimonialInterface
     * @throws LocalizedException
     */
    public function get($testimonialId): TestimonialInterface
    {
        $testimonial = $this->testimonialFactory->create();
        $this->resource->load($testimonial, $testimonialId);
        if (!$testimonial->getId()) {
            throw new NoSuchEntityException(__('Testimonial with id "%1" does not exist.', $testimonialId));
        }
        return $testimonial;
    }

    /**
     * Retrieve Testimonial matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return TestimonialSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(
        SearchCriteriaInterface $searchCriteria = null
    ) {
        $collection = $this->testimonialCollectionFactory->create();
        if ($searchCriteria === null) {
            $searchCriteria = $this->searchCriteria->create();
        }
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $field = $filter->getField();
                $value = $filter->getValue();
                $collection->addFieldToFilter($field, $value);
            }
        }
        $collection->setCurPage($searchCriteria->getCurrentPage() ?: 1);
        $collection->setPageSize($searchCriteria->getPageSize() ?: 10);
        return $collection->getData();
    }

    /**
     * Delete Testimonial
     *
     * @param TestimonialInterface $testimonial
     * @return bool true on success
     * @throws LocalizedException
     */
    public function delete(TestimonialInterface $testimonial): bool
    {
        try {
            $testimonialModel = $this->testimonialFactory->create();
            $this->resource->load($testimonialModel, $testimonial->getTestimonialId());
            $this->resource->delete($testimonialModel);
        } catch (Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Testimonial: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete Testimonial by ID
     *
     * @param string $testimonialId
     * @return bool true on success
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById($testimonialId): bool
    {
        return $this->delete($this->get($testimonialId));
    }
}

