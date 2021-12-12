<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class OrderQtyValidationRule implements Rule
{
    private $product_id,$db_value,$custom_message;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $result = true;
        if($this->product_id > 0 && is_int($value)){
          $db_value = \App\Models\Product::where('id',$this->product_id)->value('qty');
          if(empty($db_value)){
            $result = false;
            $this->custom_message = "There is no product by product_id {$this->product_id}";
          } else if($value > $db_value){
            $this->db_value = $db_value; 
            $result = false;
            $this->custom_message = "We have {$this->db_value} quantity in stock.";
          }
        }
       
        return $result;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->custom_message;
    }
}
