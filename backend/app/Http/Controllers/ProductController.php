<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
use App\Traits\FileUploadTrait;
class ProductController extends Controller
{
    use FileUploadTrait;
    
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
            if(!empty($data['image'])){
                $data['image'] = $this->getImageByFilePath($data['image']);
            }
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

    // get all active product list
    public function getProductList(){
        $params = request()->all();
        $data = $this->productService->getAllActiveProducts($params);
        $message = __("Product list get failed.");
        $code = config('constant.PRODUCT_GET_LIST_FAILED');
        if(!empty($data)){
            $message = __("Product list get successfully.");
            $code = config('constant.PRODUCT_GET_LIST_SUCCESS');
        }

        return $this->sendResponse($data,$message,$code);
    }


    // delete product by id
    public function deleteProductById($product_id){
        $message = __("Product deleted failed.");
        $code = config('constant.PRODUCT_DELETED_FAILED');
        
        if($this->productService->productDeleteById($product_id)){
            $message = __("Product deleted successfully.");
            $code = config('constant.PRODUCT_DELETED_SUCCESS');
        }

        return $this->sendResponse([],$message,$code);
    }


}
