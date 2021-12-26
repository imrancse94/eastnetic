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
        $inputData = array_filter($request->all());
        $this->productService->productEdit($id,$inputData);
        return $this->sendResponse(
            $this->productService->response_data,
            $this->productService->status_message,
            $this->productService->status_code
        );
    }

    // get product by id
    public function getProductById($id){
        $this->productService->getProductById($id);
        return $this->sendResponse(
            $this->productService->response_data,
            $this->productService->status_message,
            $this->productService->status_code
        );
    }

    // get all active product list
    public function getProductList(){
        $params = request()->all();
        
        $this->productService->getAllActiveProducts($params);
        
        return $this->sendResponse(
            $this->productService->response_data,
            $this->productService->status_message,
            $this->productService->status_code
        );
    }


    // delete product by id
    public function deleteProductById($product_id){

        $this->productService->productDeleteById($product_id);
        return $this->sendResponse([],$this->productService->status_message,$this->productService->status_code);
    }


}
