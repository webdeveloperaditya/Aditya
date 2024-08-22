<?php
declare(strict_types=1);

namespace Aditya\Testimonials\Setup\Patch\Data;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Aditya\Testimonials\Api\Data\TestimonialInterfaceFactory;
use Aditya\Testimonials\Api\TestimonialRepositoryInterface;

class InstallSampleData implements DataPatchInterface
{
    /**
     * @param TestimonialInterfaceFactory $testimonialInterfaceFactory
     * @param TestimonialRepositoryInterface $testimonialRepositoryInterface
     */
    public function __construct(
        private TestimonialInterfaceFactory $testimonialInterfaceFactory,
        private TestimonialRepositoryInterface $testimonialRepositoryInterface
    ) {
    }

    /**
     * @return void
     * @throws LocalizedException
     */
    public function apply()
    {
        $sampleData = [
            [
                'customer_name' => 'John Doe',
                'testimonial_content' => 'This is an excellent product!',
                'rating' => 5,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'customer_name' => 'Jane Smith',
                'testimonial_content' => 'Great service and fast delivery.',
                'rating' => 4,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'customer_name' => 'Alice Johnson',
                'testimonial_content' => 'I am very satisfied with my purchase.',
                'rating' => 5,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];


        foreach ($sampleData as $data) {
            $testimonials = $this->testimonialInterfaceFactory->create();
            $testimonials->setData($data);
            $this->testimonialRepositoryInterface->save($testimonials);
        }

    }

    /**
     * @return array|string[]
     */
    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

}
