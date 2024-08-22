<?php
declare(strict_types=1);

namespace Aditya\Testimonials\Model;

use Aditya\Testimonials\Api\Data\TestimonialInterface;
use Magento\Framework\Model\AbstractModel;

class Testimonial extends AbstractModel implements TestimonialInterface
{
    /**
     * @return void
     */
    public function _construct(): void
    {
        $this->_init(ResourceModel\Testimonial::class);
    }

    /**
     * Get Testimonial Id
     *
     * @return string|null
     */
    public function getTestimonialId(): ?string
    {
        return $this->getData(self::TESTIMONIAL_ID);
    }

    /**
     * Set Testimonial Id
     *
     * @param string $testimonialId
     * @return TestimonialInterface
     */
    public function setTestimonialId($testimonialId): TestimonialInterface|Testimonial
    {
        return $this->setData(self::TESTIMONIAL_ID, $testimonialId);
    }

    /**
     * Get Customer Name
     *
     * @return string|null
     */
    public function getCustomerName(): ?string
    {
        return $this->getData(self::CUSTOMER_NAME);
    }

    /**
     * Set Customer Name
     *
     * @param string $customerName
     * @return TestimonialInterface
     */
    public function setCustomerName($customerName): TestimonialInterface|Testimonial
    {
        return $this->setData(self::CUSTOMER_NAME, $customerName);
    }

    /**
     * Get Testimonial Content
     *
     * @return string|null
     */
    public function getTestimonialContent(): ?string
    {
        return $this->getData(self::TESTIMONIAL_CONTENT);
    }

    /**
     * Set Testimonial Content
     *
     * @param string $testimonialContent
     * @return TestimonialInterface
     */
    public function setTestimonialContent($testimonialContent): TestimonialInterface|Testimonial
    {
        return $this->setData(self::TESTIMONIAL_CONTENT, $testimonialContent);
    }

    /**
     * Get Rating
     *
     * @return string|null
     */
    public function getRating(): ?string
    {
        return $this->getData(self::RATING);
    }

    /**
     * Set Rating
     *
     * @param string $rating
     * @return TestimonialInterface
     */
    public function setRating($rating): TestimonialInterface|Testimonial
    {
        return $this->setData(self::RATING, $rating);
    }

    /**
     * Get Created At
     *
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set Created At
     *
     * @param string $createdAt
     * @return TestimonialInterface
     */
    public function setCreatedAt($createdAt): TestimonialInterface
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}

