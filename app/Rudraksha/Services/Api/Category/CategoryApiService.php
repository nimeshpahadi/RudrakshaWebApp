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
    public function getCategory()
    {
        $categoryData = $this->categoryApiRepository->getCategoryData();

        $categoryDetail  = [];

        foreach ($categoryData as $category) {
            $benifitData = $this->categoryApiRepository->getCategoryBenifit($category->id);
            $categoryDetail[]['categories'] = [
                'id' => $category['id'],
                'code' => $category['code'],
                'name' => $category['name'],
                'short description' => $category['short description'],
                'infromation' => $category['infromation'],
                'face_no' => $category['face_no'],
                'mantra' => $category['mantra'],
                'created_at' => $category['created_at'],
                'updated_at' => $category['updated_at'],

                'benifits' => [
                    'benifit_heading' => $benifitData['benifit_heading'],
                    'benifit' => $benifitData['benifit'],
                    'created_at' => $benifitData['created_at'],
                    'updated_at' => $benifitData['updated_at'],
                ]
            ];
        }
        return $categoryDetail;
    }
}