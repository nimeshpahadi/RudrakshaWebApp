<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/23/17
 * Time: 2:15 PM
 */

namespace App\Rudraksha\Services\Api\Capping;


use App\Rudraksha\Repositories\Api\Capping\CappingApiRepository;

class CappingApiService
{
    /**
     * @var CappingApiRepository
     */
    private $cappingApiRepository;

    /**
     * CappingApiService constructor.
     * @param CappingApiRepository $cappingApiRepository
     */
    public function __construct(CappingApiRepository $cappingApiRepository)
    {
        $this->cappingApiRepository = $cappingApiRepository;
    }

    /**
     * @return array
     */
    public function serviceCappingData()
    {
        $cappingData = $this->cappingApiRepository->repoCappingData();

        $cappingDetail = [];

        foreach ($cappingData as $data) {

            $cappingDetail[] = [
                'type' => $data->type,
                'design_image' => $data->design_image,
                'price' => $data->price,
                'metal_quantity_used' => $data->metal_quantity_used,
                'description' => $data->description,
            ];
        }
        return $cappingDetail;
    }
}