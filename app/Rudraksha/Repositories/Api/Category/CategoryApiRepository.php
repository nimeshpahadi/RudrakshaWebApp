<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/21/17
 * Time: 1:41 PM
 */

namespace App\Rudraksha\Repositories\Api\Category;


use App\Rudraksha\Entities\Category;

class CategoryApiRepository
{
    /**
     * @var Category
     */
    private $category;

    /**
     * CategoryApiRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getCategoryData()
    {
        return $this->category->select('*')->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCategoryBenifit()
    {
        $query = $this->category->select('categories.*', 'category_benifits.*')
                    ->join('category_benifits', 'category_benifits.category_id', 'categories.id')
                    ->get();

        return $query;
    }
}