<?php
declare(strict_types=1);

namespace Aditya\Testimonials\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Testimonial extends AbstractDb
{
    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init('aditya_testimonials', 'testimonial_id');
    }
}

