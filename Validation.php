<?php

class Validation
{

    public function string(string $value, int $min = 0, int $max = INF)
    {
        $value = trim($value);
        return strlen($value) <= $min || strlen($value) >= $max;
    }
    public function int(int $value, int $min = 0, int $max = INF)
    {
        $value = trim($value);
        return $value <= $min || $value >= $max;

    }
    public function array(array $value, int $min = 0, int $max = INF)
    {
        return empty($value) || sizeof($value) < $min || sizeof($value) > $max;
    }
    public function float(float $value, $min = 0, $max = INF)
    {
        if ($value < $min || $value > $max) {
            return false;
        } {
            return true;
        }
    }



    public function validate($value, $min = 0, $max = INF)
    {
        switch (gettype($value)) {
            case "string":
                return $this->string($value, $min, $max);
            case "integer":
                return $this->int($value, $min, $max);
            case "array":
                return $this->array($value, $min, $max);
            default:
                return false;

        }
    }
}




?>