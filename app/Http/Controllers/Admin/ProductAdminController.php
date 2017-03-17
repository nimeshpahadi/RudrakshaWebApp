<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rudraksha\Services\CategoryService;
use App\Rudraksha\Services\ProductService;
use Illuminate\Http\Request;


class ProductAdminController extends Controller
{

    /**
     * @var ProductService
     */
    private $productService;
    /**
     * @var CategoryService
     */
    private $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catprod = $this->productService->getProductasCategory();
        return view('admin/productAdmin/index', compact('catprod'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->categoryService->get_category();
        $active = "info";
        return view('admin/productAdmin/create', compact('category', 'active'));
    }


    /**
     * product description form show
     * @param $productid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createDesc($productid)
    {
        $active = "desc";
        return view('admin/productAdmin/createDesc', compact('productid', 'active'));
    }

    /**
     * stores product description
     * @param Request $request
     * @return $this
     */
    public function storeDesc(Request $request)
    {
        if ($this->productService->store_ProductDesc($request)) {
            $productdesc = $request->all();
            $productid = $productdesc['product_id'];
            return redirect()->route('product_image', compact('productid'))->withSuccess("Product Description added!");
        }
        return back()->withErrors("Something went wrong");

    }

    /**
     * image creation form blade
     * @param $productid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createImage($productid)
    {
        $product_image = $this->productService->get_product_image($productid);
        $active = "image";
        return view('admin/productAdmin/createImage', compact('productid', 'active', 'product_image'));
    }

    /**
     * for storing product images
     * @param Request $request
     * @return $this
     */
    public function storeImage(Request $request)
    {
        if ($data = $this->productService->store_ProductImage($request)) {
            return redirect()->route('products.index')->withSuccess("Product Image added!");
        }
        return back()->withErrors("Something went wrong");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($data = $this->productService->store_Product($request)) {
            $productid = $data->id;
            return redirect()->route('product_description', compact('productid'))->withSuccess("Product Info added!");
        }
        return back()->withErrors("Something went wrong");

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productid = $this->productService->get_product($id);
        $product_desc = $this->productService->get_product_desc($id);
        $product_image = $this->productService->get_product_image($id);
        return view('admin/productAdmin/show', compact('productid', 'product_desc', 'product_image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $active = "info";
        $category = $this->categoryService->get_category();
        $pro_id = $this->productService->get_product($id);
        return view('admin/productAdmin/edit', compact('pro_id', 'category', 'active'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($product = $this->productService->edit_productInfo($request, $id)) {

            return redirect()->route('products.index')->withSuccess("Product edited!");
        }
        return back()->withErrors('something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->productService->deleteproductInfo($id)) {
            return redirect('/admin/product')->withSuccess('Product Deleted');
        }
        return back()->withErrors('something went wrong');

    }

    /**
     * edit the description of product
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editDesc($id)
    {
        $desc = $this->productService->get_product_desc($id);
        $active = "desc";
        return view('admin/productAdmin/editDesc', compact('desc', 'active'));

    }

    /**
     * delete the description of product
     * @param $id
     * @return $this
     */
    public function deleteDesc($id)
    {
        if ($this->productService->deleteproductDesc($id)) {
            return redirect('/admin/product')->withSuccess('Product Description Deleted');
        }
        return back()->withErrors('something went wrong');

    }
    /**
     * delete the description of product
     * @param $id
     * @return $this
     */
    public function deleteImage($id)
    {
        if ($this->productService->deleteproductImage($id)) {
            return redirect('/admin/product')->withSuccess('Product Image Deleted');
        }
        return back()->withErrors('something went wrong');

    }
}
