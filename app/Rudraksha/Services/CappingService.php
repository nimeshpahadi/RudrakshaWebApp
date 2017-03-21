<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/21/17
 * Time: 2:31 PM
 */

namespace App\Rudraksha\Services;

use File;
use App\Rudraksha\Repositories\CappingRepository;

class CappingService
{

    /**
     * @var CappingRepository
     */
    private $cappingRepository;

    public function __construct(CappingRepository $cappingRepository)
    {

        $this->cappingRepository = $cappingRepository;
    }

    public function store_capping($request)
    {
        $formData = $request->all();
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $imagename =  $formData['type'].'_'.random_int(1,100). '.' . $formData['design_image']->getClientOriginalExtension();
        $destinationPath = storage_path('app/public/capping');
        $formData['design_image']->move($destinationPath, $imagename);
        $formData['design_image']=$imagename;
        $data= $this->cappingRepository->storeCapping($formData);
        return $data;
    }

    public function getallcap()
    {
        return $this->cappingRepository->get_capping();
    }

    public function getcap($id)
    {
        return $this->cappingRepository->get_cappingid($id);
    }

    public function edit_capping($request, $id)
    {
        $formData = $request->all();
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $imagename =  $formData['type'].'_'.random_int(1,100). '.' . $formData['design_image']->getClientOriginalExtension();
        $destinationPath = storage_path('app/public/capping');
        $formData['design_image']->move($destinationPath, $imagename);
        $formData['design_image']=$imagename;
        return $this->cappingRepository->editCapping($formData,$id);
    }

    public function delete_capping($id)
    {
        return $this->cappingRepository->deleteCapping($id);
    }
}