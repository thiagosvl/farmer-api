<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Utils\BusinessIdValidator;

class BusinessIdValidationRule implements ValidationRule
{

    private $CPFLength = 11;
    private $CNPJLength = 14;
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = preg_replace('/[^0-9]/', '', $value);
        $valueLenght = strlen($value);

        if ($valueLenght != $this->CPFLength && $valueLenght != $this->CNPJLength) {
            $fail('The number of characters in the business id field is invalid');
        }

        if (strlen($value) == 11 && !BusinessIdValidator::validateCPF($value)) {
            $fail('The CPF is invalid');
        } elseif (strlen($value) == 14 && !BusinessIdValidator::validateCNPJ($value)) {
            $fail('The CNPJ is invalid');
        }
    }
}
