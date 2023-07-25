<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Intervention\Image\Facades\Image;


class ImageDimensionsRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $image = Image::make($value);
        
        return $image->width() == 765 && $image->height() == 850;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Image Must Be 765 X 850';
    }
}
