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
    public function __construct(Category $category, CategoryBenifit $categoryBenifit )
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
    public function getCategoryBenifit($id)
    {
        $query = $this->category->select('benifits.benifit_heading', 'benifits.benifit', 'benifits.created_at'
            ,'benifits.updated_at')
            ->join('benifits', 'benifits.category_id', 'categories.id')
            ->where('benifits.category_id', $id)
            ->get()->toArray();

        return $query;
    }
}