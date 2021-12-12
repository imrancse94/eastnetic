<?php

namespace App\Http\Controllers;

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
        $code = config('constant.PRODUCT_ADDED_FAILED');
        try{
            $inputData['user_id'] = auth()->user()->id;
            $result = $this->orderService->orderAdd($inputData);
            $status = $result['status'];
            $data = $result['data'];
            if(!$status){
                return $this->sendError("validation error",$data,config('constant.VALIDATION_ERROR'));
            }
            $message = __("Order added success.");
            $code = config('constant.PRODUCT_ADDED_SUCCESS');

            $email_subject = __("Order is processing"); // Email Subject
            
            $to_email = auth()->user()->email;
            $from = "test@example.com"; // From Email
            $attachment = "";
            $template = "Email.receipt"; // Email template

            $emailData['unique_order_id'] = $data['unique_order_id'];
            $emailData['product_name'] = $data['name'];
            $emailData['qty'] = $data['qty'];
            $emailData['unit_price'] = $data['unit_price'];
            $emailData['total_price'] = $emailData['qty'] * $data['unit_price'];

            // send email
            $this->sendEmail($emailData,$email_subject,$from,$attachment,$template,$to_email);

        }catch(\Exception $ex){
            dd($ex->getMessage());
        }

        return $this->sendResponse($data,$message,$code);
    }

    // edit order by id
    public function editOrder(){
        
    }

    // get all order list by user_id
    public function getOrderList(){
        
    }

    // get order by order id
    public function getOrderById(){
        
    }
    

    // delete order by order id
    public function deleteOrderById(){
        
    }
}
