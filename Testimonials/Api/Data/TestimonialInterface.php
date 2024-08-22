<?php
declare(strict_types=1);

namespace Aditya\Testimonials\Api\Data;

interface TestimonialInterface
{
    public const TESTIMONIAL_ID = 'testimonial_id';
    public const CUSTOMER_NAME = 'customer_name';
    public const TESTIMONIAL_CONTENT = 'testimonial_content';
    public const RATING = 'rating';

    public const CREATED_AT = 'created_at';

    /**
     * Get Testimonial Id
     *
     * @return string|null
     */
    public function getTestimonialId(): ?string;

    /**
     * Set Testimonial Id
     *
     * @param string $testimonialId
     * @return TestimonialInterface
     */
    public function setTestimonialId($testimonialId): TestimonialInterface;

    /**
     * Get Customer Name
     *
     * @return string|null
     */
    public function getCustomerName(): ?string;

    /**
     * Set Customer Name
     *
     * @param string $customerName
     * @return TestimonialInterface
     */
    public function setCustomerName($customerName): TestimonialInterface;

    /**
     * Get Testimonial Content
     *
     * @return string|null
     */
    public function getTestimonialContent(): ?string;

    /**
     * Set Testimonial Content
     *
     * @param string $testimonialContent
     * @return TestimonialInterface
     */
    public function setTestimonialContent($testimonialContent): TestimonialInterface;

    /**
     * Get Rating
     *
     * @return string|null
     */
    public function getRating(): ?string;

    /**
     * Set Rating
     *
     * @param string $rating
     * @return TestimonialInterface
     */
    public function setRating($rating): TestimonialInterface;

    /**
     * Get Created At
     *
     * @return string|null
     */
    public function getCreatedAt(): ?string;

    /**
     * Set Created At
     *
     * @param string $createdAt
     * @return TestimonialInterface
     */
    public function setCreatedAt($createdAt): TestimonialInterface;
}

