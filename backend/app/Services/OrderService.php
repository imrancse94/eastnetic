<?php

namespace App\Services;

use App\Models\Order;

class OrderService extends Service{
    
    // new order add
    public function orderAdd($inputData){
        return Order::create($inputData);
    }

    // order edit by id
    public function orderEdit($id,$inputData){
        return Order::where('id',$id)->update($inputData);
    }

    // order delete by id
    public function orderDelete($id){
        return Order::where('id',$id)->delete();
    }

    // get order by id
    public function getorderById($id){
        return Order::where('id',$id)->first();
    }

    // get all active orders
    public function getAllActiveorders(){
        return Order::where('order_status',1)->get();
    }
}