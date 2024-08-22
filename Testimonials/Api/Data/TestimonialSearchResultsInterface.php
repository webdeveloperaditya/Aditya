<?php
declare(strict_types=1);

namespace Aditya\Testimonials\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface TestimonialSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get Testimonial list.
     *
     * @return TestimonialInterface[]
     */
    public function getItems();

    /**
     * Set Testimonial list.
     *
     * @param TestimonialInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

