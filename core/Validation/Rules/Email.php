<?php

namespace Core\Validation\Rules;

class Email implements ValidationRule
{
    private $name , $value;

    public function __construct(string $name, $value)
    {
        $this->name  = $name;
        $this->value = $value;
    }

    public function validate()
    {
        if (! filter_var($this->value,FILTER_VALIDATE_EMAIL)){
            return "$this->name must be valid emil";
        }

        return "";
    }


}