<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Intervention\Image\Facades\Image;


class GalleryDimensionsRule implements Rule
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
    public function passes($attribute, $values)
    {
        foreach($values as $value) {
            $image = Image::make($value);
            
            if ($image->width() != 765 || $image->height() != 850) {
                return false;
            }
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'All Images Must Be 765 X 850' ;
    }
}
