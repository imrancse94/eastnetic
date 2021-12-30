<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderEditRequest;
use App\Http\Requests\OrderRequest;
use App\Services\OrderService;


class OrderController extends Controller
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    // add new order
    public function addOrder(OrderRequest $request){
        
        $inputData = $request->all();
        $message = __("Order added failed.");
        $code = config('constant.ORDER_ADDED_FAILED');
        try{
            $inputData['user_id'] = auth()->user()->id;
            $result = $this->orderService->orderAdd($inputData);
            $status = $result['status'];
            $data = $result['data'];
            if(!$status){
                return $this->sendError("validation error",$data,config('constant.VALIDATION_ERROR'));
            }
            $message = __("Your order is now pending. Please check your email.");
            $code = config('constant.ORDER_ADDED_SUCCESS');

            $from = "test@example.com"; // From Email
            $attachment = "";
            $template = "Email.receipt"; // Email template

            $emailData['unique_order_id'] = $data['unique_order_id'];
            
            $emailData['product_name'] = $data['name'];
            $emailData['qty'] = $data['qty'];
            $emailData['unit_price'] = $data['unit_price'];
            $emailData['total_price'] = $emailData['qty'] * $data['unit_price'];

            // send email to admin
            $to_email = config('constant.ADMIN_EMAIL');
            $email_subject = __("You have a new order request."); // Email Subject
            $emailData['text'] = "";
            $emailData['title'] = $email_subject;
            $this->sendEmail($emailData,$email_subject,$from,$attachment,$template,$to_email);

            // send email to buyer
            $to_email = auth()->user()->email;
            $email_subject = __("Order is pending"); // Email Subject
            $emailData['text'] = "This email is a receipt for your order number ".$data['unique_order_id'];
            $emailData['title'] = "Thanks for your order.";
            $this->sendEmail($emailData,$email_subject,$from,$attachment,$template,$to_email);
            
            
        }catch(\Exception $ex){
           // dd($ex->getMessage());
        }

        return $this->sendResponse($data,$message,$code);
    }

    // edit order by id
    public function editOrder($order_id,OrderEditRequest $request){
        $inputData = $request->all();
        $user = auth()->user();
        $user_id = $user->id;
        $user_type = $user->user_type;
        $result = $this->orderService->orderEdit($order_id,$user_id,$user_type,$inputData);
        
        if($result['status']){
            $message = __("Order edit success.");
            $code = config('constant.ORDER_EDITED_SUCCESS');
            return $this->sendResponse($result['data'],$message,$code);
        }
        $message = $result['data'];
        $code = config('constant.ORDER_ADDED_FAILED');
        return $this->sendError($message,[],$code);
    }

    // get all order list by user_id
    public function getOrderListByUserId(){
        $params = request()->all();
        $user = auth()->user();
        $user_id = $user->id;
        $user_type = $user->user_type;

        $data = $this->orderService->getAllordersByUserId($user_id,$user_type,$params);

        $message = __("Order list get failed.");
        $code = config('constant.ORDER_LIST_FAILED');

        if(!empty($data)){
            $message = __("Order list get success.");
            $code = config('constant.ORDER_LIST_SUCCESS');
        }
        
        return $this->sendResponse($data,$message,$code);
    }

    // get order by order id
    public function getOrderById($order_id){
        $user = auth()->user();
        $user_id = $user->id;
        $user_type = $user->user_type;
        $data = $this->orderService->getOrderByIdWithUserId($order_id,$user_id,$user_type);
        $message = __("Order get failed.");
        $code = config('constant.ORDER_GET_FAILED');
        if(!empty($data)){
            $message = __("Order get success.");
            $code = config('constant.ORDER_GET_SUCCESS');
        }
        
        return $this->sendResponse($data,$message,$code);
    }
    

    // delete order by order id
    public function deleteOrderById($order_id){
        $user_id = auth()->user()->id;
        $message = __("Order deleted failed.");
        $code = config('constant.ORDER_DELETE_FAILED');
        if($this->orderService->orderDeleteById($order_id,$user_id)){
            $message = __("Order deleted success.");
            $code = config('constant.ORDER_DELETE_SUCCESS');
        }

        return $this->sendResponse([],$message,$code);
    }
}
