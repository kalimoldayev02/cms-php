<?php

namespace App\Kernel\Validator;

class Validator
{
    private array $data;
    private array $errors;

    public function validate(array $data, array $rules): bool
    {
        $this->data = $data;
        $this->errors = [];

        foreach ($rules as $fieldKey => $rule) {
            foreach ($rule as $ruleItem) {
                $ruleItem = explode(':', $ruleItem);
                $ruleName = $ruleItem[0];
                $ruleValue = $ruleItem[1] ?? null;

                $errors = $this->validateRule($fieldKey, $ruleName, $ruleValue);

                if ($errors) {
                    $this->errors[$fieldKey][] = $errors;
                }
            }
        }

        return empty($this->errors);
    }

    private function validateRule(string $fieldKey, string $ruleName, string $ruleValue = null): ?string
    {
        $fieldValue = $this->data[$fieldKey] ?? null;

        return match ($ruleName) {
            'required' => empty($fieldValue) ? "Field $fieldKey is required" : null,
            'min' => is_null($fieldValue) || strlen($fieldValue) < $ruleValue ? "Field $fieldKey must be at least $ruleValue characters long" : null,
            'max' => is_null($fieldValue) || strlen($fieldValue) > $ruleValue ? "Field $fieldKey must be at most $ruleValue characters long" : null,
            'email' => !filter_var($fieldValue, FILTER_VALIDATE_EMAIL) ? "Field $fieldKey must be a valid email" : null,
            default => null,
        };
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}