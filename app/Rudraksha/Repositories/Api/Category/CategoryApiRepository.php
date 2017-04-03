<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/21/17
 * Time: 1:41 PM
 */

namespace App\Rudraksha\Repositories\Api\Category;


use App\Rudraksha\Entities\Category;
use App\Rudraksha\Entities\Category_benifit;

class CategoryApiRepository
{
    /**
     * @var Category
     */
    private $category;
    /**
     * @var Category_benifit
     */
    private $category_benifit;

    /**
     * CategoryApiRepository constructor.
     * @param Category $category
     * @param Category_benifit $category_benifit
     */
    public function __construct(Category $category, Category_benifit $category_benifit)
    {
        $this->category = $category;
        $this->category_benifit = $category_benifit;
    }

    /**
     * @return mixed
     */
    public function getCategoryData()
    {
        return $this->category->select('*')->get();
    }

    /**
     * @return mixed
     */
    public function getAllCategoryBenifit()
    {
        $query = $this->category->select('categories.*', 'category_benifits.*')
                    ->join('category_benifits', 'category_benifits.category_id', 'categories.id')
                    ->get();

        return $query;
    }

    /**
     * @param null $category
     * @return mixed
     */
    public function getCategoryId($category=null)
    {
        $query= $this->category->select('*');

        if ($category!=null)
        {
            $query->where('id', $category);
        }

        return $query->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCategoryBenifit($id)
    {
        $query = $this->category_benifit->select('*')
                       ->where('category_id', $id)
                       ->get();

        return $query;
    }
}