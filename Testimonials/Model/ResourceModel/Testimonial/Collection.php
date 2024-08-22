<?php
declare(strict_types=1);

namespace Aditya\Testimonials\Model\ResourceModel\Testimonial;

use Aditya\Testimonials\Model\ResourceModel\Testimonial as TestimonialResourceModel;
use Aditya\Testimonials\Model\Testimonial as TestimonialModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'testimonial_id';

    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(
            TestimonialModel::class,
            TestimonialResourceModel::class
        );
    }
}
