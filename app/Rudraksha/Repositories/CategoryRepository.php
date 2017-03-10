<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/13/17
 * Time: 1:47 PM
 */

namespace App\Rudraksha\Repositories;


use App\Rudraksha\Entities\Category;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Logging\Log;

class CategoryRepository
{
    /**
     * @var Category
     */
    private $category;
    /**
     * @var Log
     */
    private $log;

    public function __construct(Category $category, Log $log)
 {
     $this->category = $category;
     $this->log = $log;
 }

    public function storeCategory($formData)
    {
        try {
            $this->category->create($formData);
            $this->log->info("category Created");
            return true;
        } catch (QueryException $e) {
            $this->log->error("category Creation Failed");
            return false;
        }

    }

    public function getCategory()
    {
        $query= $this->category->select('*')
                                ->get();
        return $query;
    }
    public function getCategorybyId($id)
    {
        $query= $this->category->select('*')
            ->where('id',$id)
            ->first();
        return $query;
    }

    public function editCategory($request, $id)
    {
        try {

            $data = CategoryRepository::getCategorybyId($id);
            $data->code = $request->code;
            $data->name = $request->name;
            $data->short_description = $request->short_description;
            $data->information = $request->information;
            $data->status = $request->status;
            $data->face_no = $request->face_no;
            $data->update();
            $this->log->info("Category Updated", ['id' => $id]);

            return true;
        } catch (Exception $e) {
            $this->log->error("Category Update Failed", ['id' => $id]);

            return false;
        }
    }
}