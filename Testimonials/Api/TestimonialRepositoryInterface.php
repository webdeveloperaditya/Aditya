<?php
declare(strict_types=1);

namespace Aditya\Testimonials\Api;

use Aditya\Testimonials\Api\Data\TestimonialInterface;
use Aditya\Testimonials\Api\Data\TestimonialSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

interface TestimonialRepositoryInterface
{

    /**
     * Save Testimonial
     *
     * @param TestimonialInterface $testimonial
     * @return TestimonialInterface
     * @throws LocalizedException
     */
    public function save(
        TestimonialInterface $testimonial
    ): TestimonialInterface;

    /**
     * Retrieve Testimonial
     *
     * @param string $testimonialId
     * @return TestimonialInterface
     * @throws LocalizedException
     */
    public function get($testimonialId): TestimonialInterface;

    /**
     * Retrieve Testimonial matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return TestimonialSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(
        SearchCriteriaInterface $searchCriteria = null
    );

    /**
     * Delete Testimonial
     *
     * @param TestimonialInterface $testimonial
     * @return bool true on success
     * @throws LocalizedException
     */
    public function delete(
        TestimonialInterface $testimonial
    ): bool;

    /**
     * Delete Testimonial by ID
     *
     * @param string $testimonialId
     * @return bool true on success
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById($testimonialId): bool;
}
