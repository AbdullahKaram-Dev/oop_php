<?php

namespace Core\Validation;

use Core\Validation\Rules\ValidationRule;

class ValidationStrategy
{

    private $validation_rule;

    public function __construct(ValidationRule $validation_rule)
    {
         $this->validation_rule = $validation_rule;
    }

    public function validate()
    {
       return $this->validation_rule->validate();
    }

}