<?php

namespace Core\Validation\Rules;

class Required implements ValidationRule
{
    private $name , $value;

    public function __construct(string $name, $value)
    {
        $this->name  = $name;
        $this->value = $value;
    }

    public function validate()
    {
        if (strlen($this->value) === 0){
            return "$this->name is required";
        }

        return "";
    }


}