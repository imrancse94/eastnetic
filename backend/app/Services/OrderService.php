<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderHistory;
use App\Services\ProductService;

class OrderService extends Service{
    
    // new order add
    public function orderAdd($inputData){
        $result['status'] = false;
        $result['data'] = "";

        $productservice = new ProductService;
        $product = $productservice->getProductById($inputData['product_id']);
        
        // product exist check
        if(is_null($product)){
            $result['data'] = "There is no product by product_id {$inputData['product_id']}";
            return $result;
        }

        if($product->qty == 0){
            $result['data'] = "The product is not available in stock.";
            return $result;
        }
        // product qty check
        if($product->qty < $inputData['qty']){
            $result['data'] = "We have {$product->qty} quantity in stock.";
            return $result;
        }
        
        $latest_order_id = Order::query()->orderByDesc('id')->value('id');
        if(empty($latest_order_id)){
            $latest_order_id = 0;
        }
        
        $inputData['unique_order_id'] = str_pad($latest_order_id + 1, 8, "0", STR_PAD_LEFT);
        $inputData['unit_price'] = $product->unit_price;
        $inputData['order_status'] = 3;

        if($result['data'] = Order::create($inputData)){
            $result['data']['name'] = $product->name;
            $result['status'] = true;
            $product->qty = $product->qty - $inputData['qty'];
            $product->save();
        }

        return $result;
    }

    // order edit by id
    public function orderEdit($id,$inputData){
        return Order::where('id',$id)->update($inputData);
    }

    // order delete by id
    public function orderDeleteById($id){
        return Order::where('id',$id)->delete();
    }

    // get order by id
    public function getorderById($id){
        return Order::where('id',$id)->first();
    }

    // get all active orders
    public function getAllorders(){
        return Order::all();
    }

    // get all active orders
    public function getAllordersByUserId($user_id){
        return Order::where('user_id',$user_id)->get();
    }

    // get order history by order id
    public function getOrderHistoryByorderIdWithUserId($order_id,$user_id,$user_type){
        $clause['order_id'] = $order_id;
        $clause['user_id'] = $user_id;
        $clause['user_type'] = $user_type;
        return OrderHistory::where($clause)->get();
    }


    // add order history
    public function addOrderHistory($inputData){
        if(!empty($inputData['data'])){
            $inputData['data'] = json_encode($inputData['data']);
        }

        return OrderHistory::create($inputData);
    }
}