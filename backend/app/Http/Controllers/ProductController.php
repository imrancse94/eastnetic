<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    // add new product
    public function addProduct(ProductRequest $request){
        $inputData = $request->all();
        $message = __("Product added failed.");
        $code = config('constant.PRODUCT_ADD_FAILED');
        $data = [];
        if($data = $this->productService->productAdd($inputData)){
            $message = __("Product added successfully.");
            $code = config('constant.PRODUCT_ADD_SUCCESS');
        }

        return $this->sendResponse($data,$message,$code);
    }

    // edit product
    public function editProduct(ProductRequest $request,$id){
        $inputData = $request->all();
        $message = __("Product edited failed.");
        $code = config('constant.PRODUCT_EDIT_FAILED');
        $data = [];
        if($data = $this->productService->productEdit($id,$inputData)){
            $message = __("Product edited successfully.");
            $code = config('constant.PRODUCT_EDIT_SUCCESS');
        }

        return $this->sendResponse($data,$message,$code);
    }

    // get product by id
    public function getProductById($id){
        $message = __("Product get failed.");
        $code = config('constant.PRODUCT_GET_BY_ID_FAILED');
        $data = [];
        if($data = $this->productService->getProductById($id)){
            $message = __("Product get successfully.");
            $code = config('constant.PRODUCT_GET_BY_ID_SUCCESS');
        }

        return $this->sendResponse($data,$message,$code);
    }


}
