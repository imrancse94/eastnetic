<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ImageValidationRule implements Rule
{
    private $width,$height,$custom_message;
    private $image_type_array = [
        "image/jpeg",
        "image/png"
    ];
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($width,$height)
    {
        $this->width = $width;
        $this->height = $height;
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
        list($type, $value) = explode(';', $value);
        list(, $value)      = explode(',', $value);

        $image = base64_decode($value);
        $f = finfo_open();
        $result = finfo_buffer($f, $image, FILEINFO_MIME_TYPE);
        
        if(!in_array($result ,$this->image_type_array)){
            $this->custom_message = __("Invalid Image");
            return false;
        }
        
        $image_file_size = getBase64ImageSize($image);
        $result = true;
        if($image_file_size >= 1){
            $result = false;
            $this->custom_message = "The image size must be less or equal 1MB.";
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
