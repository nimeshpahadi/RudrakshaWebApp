<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/13/17
 * Time: 1:41 PM
 */

namespace App\Rudraksha\Services;


use App\Rudraksha\Repositories\CategoryRepository;

class CategoryService
{

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function store_category($request)
    {
        $formData = $request->all();
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $data= $this->categoryRepository->storeCategory($formData);

        return $data;
    }

    public function get_category()
    {
        $data= $this->categoryRepository->getCategory();
        return $data;
    }
    public function get_categoryby_Id($id)
    {
        $data= $this->categoryRepository->getCategorybyId($id);
        return $data;
    }

    public function editcategory($request, $id)
    {
        $data= $this->categoryRepository->editCategory($request,$id);
        return $data;
    }

    public function store_category_benefit($request)
    {
        $formData = $request->all();
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $formData['benefit']= json_encode($formData['benefit']);
        $data= $this->categoryRepository->storeCategoryBenefit($formData);

        return $data;
    }

    public function get_category_benefit($id)
    {

        $data= $this->categoryRepository->getCategoryBenifit($id);
        return $data;
    }
}