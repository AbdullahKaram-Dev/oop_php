<?php

namespace Core\Validation\Rules;

interface ValidationRule
{

    public function __construct(string $name,$value);

    public function validate();

}