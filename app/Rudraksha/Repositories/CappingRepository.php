<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/21/17
 * Time: 2:32 PM
 */

namespace App\Rudraksha\Repositories;


use App\Rudraksha\Entities\Capping;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\QueryException;
use File;


class CappingRepository
{
    /**
     * @var Capping
     */
    private $capping;
    /**
     * @var Log
     */
    private $log;

    public function __construct(Capping $capping,Log $log)
    {
        $this->capping = $capping;
        $this->log = $log;
    }

    public function storeCapping($formData)
    {
        try {
            $this->capping->insert($formData);
            $this->log->info("Capping Created");
            return true;
        } catch (QueryException $e) {

            $this->log->error("Capping Creation Failed %s", [$e->getMessage()]);
            return false;
        }
    }
    public function get_capping()
    {
        return $this->capping->select('*')->get();
    }

    public function get_cappingid($id)
    {
        return $this->capping->select('*')->where('id',$id)->first();
    }

    public function editCapping($formData, $id)
    {
        try {

            $data = CappingRepository::get_cappingid($id);
            $data->type = $formData['type'];
            $data->price = $formData['price'];
            $data->metal_quantity_used = $formData['metal_quantity_used'];
            $data->description = $formData['description'];
            $data->status = $formData['status'];
            $data->update();
            $this->log->info("Capping Updated", ['id' => $id]);

            return true;
        } catch (Exception $e) {
            $this->log->error("Capping Update Failed %s", ['id' => $id], [$e->getMessage()]);
            return false;
        }
    }

    public function deleteCapping($id)
    {
        try {
            $query = $this->capping->find($id);
            $query->delete();
            $query;
            $this->log->info("Capping Deleted",['id'=>$id]);
            return true;
        } catch (Exception $e) {
            $this->log->error("Capping Deletion Failed",['id' => $id], [$e->getMessage()]);
            return false;
        }
    }

    public function updateCappingImage($formData, $id)
    {
        try {

            $data = CappingRepository::get_cappingid($id);
            $name=$data->design_image;
            $path = storage_path().'/app/public/capping/';
            File::delete($path . $name);
            $data->design_image= $formData['design_image'];
            $data->update();
            $this->log->info("Capping Image updated");
            return true;

        } catch (QueryException $e) {

            $this->log->error("Capping Image Creation Failed : ",[$e->getMessage()]);
            return false;
        }
    }
}