<?php

namespace Core\Validation\Rules;

class Numeric implements ValidationRule
{
    private $name , $value;

    public function __construct(string $name, $value)
    {
        $this->name  = $name;
        $this->value = $value;
    }

    public function validate()
    {
        if (! is_numeric($this->value)){
            return "$this->name must be numeric";
        }

        return "";
    }


}