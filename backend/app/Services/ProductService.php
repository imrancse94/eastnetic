<?php

namespace App\Services;

use App\Models\Product;
use App\Traits\FileUploadTrait;
class ProductService extends Service{
    
    use FileUploadTrait;

    // new product add
    public function productAdd($inputData){
        $product = null;
        \DB::beginTransaction();
        try{
            if(!empty($inputData['image'])){
                $inputData['image'] = $this->uploadFile("product",$inputData['image']);
            }

            $product = Product::create($inputData);
            if(!empty($product['image'])){
                $product['image'] = $this->getImageByFilePath($product['image']);
            }

            \DB::commit();

            $this->response_data = $product;
            $this->status_message = __("Product added successfully.");
            
        }catch(\Exception $ex){
           // dd($ex->getMessage());
            \DB::rollBack();
            $this->status_message = __("Product added failed.");
            $this->status_code = config('constant.PRODUCT_ADD_FAILED');
        }
        return $product;
    }

    // product edit by id
    public function productEdit($id,$inputData){

        \DB::beginTransaction();
        try{
            $product = Product::where('id',$id)->first();
            if(isset($inputData['image']) && !empty($inputData['image'])){
                $inputData['image'] = $this->uploadFile("product",$inputData['image'],$product->image);
            }
            if($product->update($inputData)){
                if(!empty($inputData['image'])){
                    $inputData['image'] = $this->getImageByFilePath($inputData['image']);
                }

                \DB::commit();
                $this->response_data = $inputData;
                $this->status_message = __("Product edited successfully.");
            }
            
        }catch(\Exception $ex){
            \DB::rollBack();
            $this->status_message = __("Product edited failed.");
            $this->status_code = config('constant.PRODUCT_EDIT_FAILED');
        }

        return $this->response_data;
    }

    // product delete by id
    public function productDeleteById($id){
        $data = false;
        $this->status_message = __("Product not found.");
        try{
            if($data = Product::where('id',$id)->delete()){
                $this->status_message = __("Product deleted successfully.");
            }
        }catch(\Exception $ex){
            dd($ex->getMessage());
            $this->status_code = config('constant.PRODUCT_DELETED_FAILED');
            if($ex->getCode() == 23000){
                $this->status_message = "The product is already in another use";
            }
        }

        return $data;
    }

    // get product by id
    public function getProductById($id){
        $product = Product::where('id',$id)->first();
        if(!empty($product->image)){
            $product->image = $this->getImageByFilePath($product->image);
        }

        if(!empty($product)){
            $this->response_data = $product;
            $this->status_message = __("Product get successfully.");
        }else{
            $this->status_code = config('constant.PRODUCT_GET_BY_ID_FAILED');
        }
        return $this->response_data;
    }

    // get all active products
    public function getAllActiveProducts($params = []){
        $params['status'] = 1;
        
        $product = Product::query();
        $product = $product->where('status',$params['status']);
        if(!empty($params['name'])){
            $product = $product->where('name','Like','%'.$params['name'].'%');
        }

        if(!empty($params['price_sort'])){
            $product = $product->orderBy('unit_price',$params['price_sort']);
        }

        if(!empty($params['order_status'])){
            $product = $product->where('order_status',$params['order_status']);
        }

        $products = $product->paginate(config('constant.DEFAULT_PAGINATE_LIMIT'));
        if(!empty($products)){
            foreach($products as $p){
                $p->image = $this->getImageByFilePath($p->image);
            }
        }
        $this->response_data = $products;
        $this->status_message = __("Product list get successfully.");
        return $this->response_data;
    }
}