<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/21/17
 * Time: 12:41 PM
 */

namespace App\Rudraksha\Services\Api\Category;


use App\Rudraksha\Repositories\Api\Category\CategoryApiRepository;
use App\Rudraksha\Repositories\CategoryRepository;

class CategoryApiService
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var CategoryApiRepository
     */
    private $categoryApiRepository;

    /**
     * CategoryApiService constructor.
     * @param CategoryApiRepository $categoryApiRepository
     * @internal param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryApiRepository $categoryApiRepository)
    {
        $this->categoryApiRepository = $categoryApiRepository;
    }

    /**
     * @return array
     */
    public function getCategoryList()
    {
        $categoryData = $this->categoryApiRepository->getCategoryData();

        $categoryDetail  = [];

        foreach ($categoryData as $category) {

            $x = $this->serviceCategoryBenefit($category->id);

            $categoryDetail['categories'][] = [
                'id' => $category->id,
                'code' => $category->code,
                'name' => $category->name,
                'short_description' => $category->short_description,
                'information' => $category->information,
                'face_no' => $category->face_no,
                'mantra' => $category->mantra,
                'benefits' => isset($x['benefit'])?$x['benefit']:[]
            ];
        }
        return $categoryDetail;
    }

    /**
     * @param $id
     * @return array
     */
    public function serviceCategoryBenefit($id)
    {
        $categoryData = $this->categoryApiRepository->getCategoryBenifit($id);

        $categoryBenefit = [];

        foreach ($categoryData as $category) {

            $categoryBenefit['benefit'][] = [
                'benefit_heading' => $category->benefit_heading,
                'benefit' => $category->benefit,
            ];
        }

        return $categoryBenefit;
    }
}