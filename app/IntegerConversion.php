<?php

namespace App;

use Bluora\PhpNumberConverter\NumberConverter;

class IntegerConversion implements IntegerConversionInterface
{
    public function toRomanNumerals($integer)
    {

        $converted = (new NumberConverter())->roman($integer);

        return $converted;
    }

}