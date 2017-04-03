<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/23/17
 * Time: 2:19 PM
 */

namespace App\Rudraksha\Repositories\Api\Capping;


use App\Rudraksha\Entities\Capping;

class CappingApiRepository
{
    /**
     * @var Capping
     */
    private $capping;

    /**
     * CappingApiRepository constructor.
     * @param Capping $capping
     */
    public function __construct(Capping $capping)
    {
        $this->capping = $capping;
    }

    /**
     * @return mixed
     */
    public function getCappingData()
    {
        return $this->capping->select('*')
                    ->where('status', 1)
                    ->get();
    }
}