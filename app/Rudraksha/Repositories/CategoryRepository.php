<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/13/17
 * Time: 1:47 PM
 */

namespace App\Rudraksha\Repositories;


use App\Rudraksha\Entities\Category;
use App\Rudraksha\Entities\Category_benifit;
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
    /**
     * @var Category_benifit
     */
    private $category_benifit;

    public function __construct(Category $category, Log $log, Category_benifit $category_benifit)
 {
     $this->category = $category;
     $this->log = $log;
     $this->category_benifit = $category_benifit;
 }

    public function storeCategory($formData)
    {
        try {
            $this->category->create($formData);
            $this->log->info("category Created");
            return true;
        } catch (QueryException $e) {

            $this->log->error("category Creation Failed %s", [$e->getMessage()]);
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
            $data->mantra = $request->mantra;
            $data->update();
            $this->log->info("Category Updated", ['id' => $id]);

            return true;
        } catch (Exception $e) {
            $this->log->error("Category Update Failed %s", ['id' => $id], [$e->getMessage()]);
            return false;
        }
    }

    public function storeCategoryBenefit($formData)
    {
        try {
            $this->category_benifit->create($formData);
            $this->log->info("category  benefit Created");
            return true;
        } catch (QueryException $e) {
            $this->log->error("category Creation Failed");
            return false;
        }
    }

    /**
     * get category benefit as per categoryid
     * @param $id
     * @return mixed
     */
    public function getCategoryBenifit($id)
    {
       return $this->category_benifit->select('category_benifits.*','categories.name as catname')
           ->join('categories','categories.id','category_benifits.category_id')
           ->where('category_benifits.category_id',$id)->get();
    }

    public function getCatBenifit($id)
    {
        return $this->category_benifit->select('*')->where('id',$id)->first();
    }

    public function editCategoryBenefit($formData,$id)
    {
        try {

            $data = CategoryRepository::getCatBenifit($id);
            $data->benefit_heading = $formData['benefit_heading'];
            $data->benefit = $formData['benefit'];
            $data->update();
            $this->log->info("Category Benefit Updated", ['id' => $id]);
            return true;
        } catch (QueryException $e) {
            $this->log->error("Category Benefit Update  Failed %s", ['id' => $id], [$e->getMessage()]);

            return false;
        }
    }

    public function delete_benefit_heading($id)
    {
        try {
            $query = $this->category_benifit->find($id);
            $query->delete();
            $query;
            $this->log->info("Category Benefit Deleted",['id'=>$id]);
            return true;
        } catch (Exception $e) {
            $this->log->error("Category Benefit Deletion Failed",['id' => $id], [$e->getMessage()]);
            return false;
        }
    }

    public function DeleteCategory($id)
    {
        try {
            $query = $this->category->find($id);

            $query->delete();
            $this->log->info("Category  Deleted",['id'=>$id]);
            return true;
        } catch (QueryException $e) {
            $this->log->error("Category Deletion Failed",['id' => $id], [$e->getMessage()]);
            return false;
        }
    }

}