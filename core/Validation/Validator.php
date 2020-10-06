<?php

namespace Core\Validation;

class Validator
{
    public static function make(array $request)
    {
        $errors = [];

        foreach ($request as $input) {
            $name = $input['name'];
            $value = $input['value'];
            $rules = explode("|", $input['rules']);

            foreach ($rules as $rule) {

                $validation_rule_class_name = 'Core\Validation\Rules\\' . ucfirst($rule);
                $error = (new ValidationStrategy(new $validation_rule_class_name($name, $value)))->validate();

                if (!empty($error)) {
                    $errors[] = $error;
                }
            }
        }

        return $errors;
    }
}