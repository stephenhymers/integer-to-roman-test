<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConvertedInteger extends Model
{
    /**
     * @var string
     */
    protected $table = 'converted_numbers';

    /**
     * @var array
     */
    protected $fillable = ['number', 'roman'];
}
