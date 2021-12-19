<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderHistory;
use App\Services\ProductService;
use App\Models\Delivery;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class OrderService extends Service{
    
    use DatabaseTransactions;

    public static function order_status_array(){ 
        return [
            config('constant.ORDER_PENDING') => "PENDING",
            config('constant.ORDER_APPROVED') => "APPROVED",
            config('constant.ORDER_REJECTED') => "REJECTED",
            config('constant.ORDER_PROCESSING') => "PROCESSING",
            config('constant.ORDER_SHIPPED') => "SHIPPED",
            config('constant.ORDER_DELIVERED') => "DELIVERED",
            config('constant.ORDER_CANCELED') => "CANCEL",
        ];
}
    // new order add
    public function orderAdd($inputData){
        $result['status'] = false;

        $productservice = new ProductService;
        $product = $productservice->getProductById($inputData['product_id']);
        
        // order validation validation
        $result['data'] = $this->productValidation($product,$inputData['product_id'],$inputData['qty']);
        
        if(!empty($result['data'])){
            return $result;
        }
        
        $inputData['unit_price'] = $product->unit_price;
        $inputData['order_status'] = config('constant.ORDER_PENDING');
        
        if($result['data'] = Order::create($inputData)){
            $updateData['unique_order_id'] = str_pad($result['data']['id'], 8, "0", STR_PAD_LEFT);
            
            Order::where('id',$result['data']['id'])->update($updateData);
            $result['data']['name'] = $product->name;
            $result['status'] = true;
            // $product->qty = $product->qty - $inputData['qty'];
            // $product->save();
        }
        
        return $result;
    }

    // order edit by id
    public function orderEdit($order_id,$user_id,$user_type,$inputData){
        $result['status'] = false;
        
        try{
            $productservice = new ProductService;

            // get order by id
            $order = Order::where('id',$order_id)
                            ->where('user_id',$user_id);
            
            if($user_type != config('constant.ADMIN_USER_TYPE')){
                $order = $order->whereNotIn('order_status',[
                    config('constant.ORDER_APPROVED'),
                    config('constant.ORDER_REJECTED')
                ]);
            }                
                           
            $order = $order->first();

            if(empty($order)){
                $result['data'] = "No order found";
                return $result;
            }   
            // get product by product_id
            $product = $productservice->getProductById($order->product_id);
            
            // order validation validation
            $requested_qty = $inputData['qty'] - $order->qty;
            $result['data'] = $this->productValidation($product,$order->product_id,$requested_qty);

            if(empty($result['data'])){
                
                $updateData['qty'] = $inputData['qty'];
                $updateData['order_status'] = $inputData['order_status'];
                
                if($order->update($updateData)){
                    if($updateData['order_status'] ==  config('constant.ORDER_DELIVERED')){
                        $product->qty = $product->qty - ($requested_qty);
                        $product->save();
                    }

                    $changes = $order->getChanges();
                    if(!empty($changes)){
                        // add order history
                        OrderHistory::create([
                            'order_id'=>$order->id,
                            'data' => json_encode($inputData)
                        ]);
                    }
                    $result['status'] = true;
                    $result['data'] = $inputData;
                }
            }

        }catch(\Exception $ex){
           // dd($ex->getMessage());
        }   
        return $result;
    }

    // order delete by id
    public function orderDeleteById($order_id,$user_id){
        return Order::where(['id'=>$order_id,'user_id'=>$user_id])->delete();
    }

    // get order by id
    public function getOrderByIdWithUserId($order_id,$user_id,$user_type){
        $clause['id'] = $order_id;
        if($user_type == config('constant.BUYER_USER_TYPE')){
            $clause['user_id'] = $user_id;
        }

        $data['order'] = Order::where($clause)->first();
        //$data['order']->order_status = self::order_status_array()[$data['order']->order_status];
        $data['order_history'] = OrderHistory::where(['order_id'=>$data['order']->id])->get();
        
        if(!empty($data['order_history'])){
            foreach($data['order_history'] as $oh){
                $oh->data = json_decode($oh->data,true);
            }
        }
        return $data;
    }

    // get all active orders
    public function getAllorders(){
        return Order::all();
    }

    // get all active orders
    public function getAllordersByUserId($user_id,$user_type,$params = []){
        $order = Order::query();
        if($user_type == config('constant.BUYER_USER_TYPE')){
            $order = $order->where('user_id',$user_id);
        }
        if(!empty($params['order_status'])){
            $order = $order->where('order_status',$params['order_status']);
        }
        $order = $order->simplePaginate(config('constant.DEFAULT_PAGINATE_LIMIT'));
        if(!empty($order)){
            foreach($order as $o){
                $o->order_status = self::order_status_array()[$o->order_status];
            }
            
        }
        return $order;
    }

    // get order history by order id
    public function getOrderHistoryByorderIdWithUserId($order_id,$user_id,$user_type){
        $clause['order_id'] = $order_id;
        $clause['user_id'] = $user_id;
        $clause['user_type'] = $user_type;
        return OrderHistory::where($clause)->get();
    }

    // order move to delivered
    public function orderMoveToDelivered(){
        $result = false;
        $orders = Order::where([
            'order_status'=>config('constant.ORDER_DELIVERED')
        ])->select([
            'id',
            'order_status',
            'product_id',
            'unique_order_id',
            'unit_price',
            'user_id',
            'qty'
        ]);
        $orderData = $orders->get();
        $deliveries = [];
        if(!empty($orderData)){
            foreach($orderData as $order){
                $order->order_id = $order->id;
                unset($order->id);
                $deliveries[] = $order->toArray();
            }

            if(!empty($deliveries)){
                if(Delivery::insert($deliveries)){
                    $orders->delete();
                    $result = true;
                }
            }
        }

        return $result;
    }

    // add order history
    public function addOrderHistory($inputData){
        if(!empty($inputData['data'])){
            $inputData['data'] = json_encode($inputData['data']);
        }

        return OrderHistory::create($inputData);
    }

    // order logical validation
    private function productValidation($product,$product_id,$qty){
        
        // product exist check
        if(is_null($product)){
            return "There is no product by product_id {$product_id}";
        }

        // product availability check
        if($product->qty == 0){
            return "The product is not available in stock.";

        }
        // product qty check
        if($product->qty < $qty){
            return "We have {$product->qty} quantity in stock.";
        }

        return "";
    }
}