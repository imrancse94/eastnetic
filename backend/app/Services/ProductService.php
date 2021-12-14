<?php

namespace App\Services;

use App\Models\Product;
use App\Traits\FileUploadTrait;
class ProductService extends Service{
    
    use FileUploadTrait;

    // new product add
    public function productAdd($inputData){
        $product = null;
        try{
            if(!empty($inputData['image'])){
                $inputData['image'] = $this->uploadFile("product",$inputData['image']);
            }

            $product = Product::create($inputData);
        }catch(\Exception $ex){
            dd($ex->getMessage());
        }
        return $product;
    }

    // product edit by id
    public function productEdit($id,$inputData){
        $data = null;

        try{
            $product = Product::where('id',$id)->first();
            if(!empty($inputData['image'])){
                $inputData['image'] = $this->uploadFile("product",$inputData['image'],$product->image);
            }
            if($product->update($inputData)){
                $inputData['image'] = $this->getImageByFilePath($inputData['image']);
                $data = $inputData;
            }
            
        }catch(\Exception $ex){
            dd($ex->getMessage());
        }

        return $data;
    }

    // product delete by id
    public function productDeleteById($id){
        $data = false;
        try{
            $data = Product::where('id',$id)->delete();
        }catch(\Exception $ex){
            dd($ex->getMessage());
        }

        return $data;
    }

    // get product by id
    public function getProductById($id){
        $product = Product::where('id',$id)->first();
        if(!empty($product->image)){
            $product->image = $this->getImageByFilePath($product->image);
        }
        return $product;
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

        $products = $product->simplePaginate(config('constant.DEFAULT_PAGINATE_LIMIT'));
        if(!empty($products)){
            foreach($products as $p){
                $p->image = $this->getImageByFilePath($p->image);
            }
        }
        return $products;
    }
}