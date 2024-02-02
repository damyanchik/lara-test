<?php

namespace App\Rules;

use App\Enum\CompanyTagEnum;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class LoginTag implements Rule
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
    public function passes($attribute, $value): bool
    {
        return Str::startsWith($value, CompanyTagEnum::getAll());
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid login tag.';
    }
}
