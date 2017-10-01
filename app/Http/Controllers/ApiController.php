<?php

namespace App\Http\Controllers;

use App\ConvertedInteger;
use App\IntegerConversion;
use Carbon\Carbon;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Mockery\Exception;


class ApiController extends Controller
{
    /**
     * @param $number
     * @return mixed
     */
    public function convert($number)
    {
        $number = (int)$number;

        // Make sure the number is less than 3999
        if ($number > 3999) {
            throw new Exception('The number must be between 1 - 3999.');
        }

        //Convert number
        $converted = (new IntegerConversion)->toRomanNumerals($number);

        //Store in DB
        $number = ConvertedInteger::create([
            'number' => $number,
            'roman' => $converted,
            'created_at' => Carbon::now()
        ]);

        //return json response
        $resource = new Item($number, function(ConvertedInteger $number) {
            return [
                'number' => $number->number
            ];
        });

        return $resource->getData();
    }

    /**
     * @return mixed
     */
    public function all()
    {
        $numbers = ConvertedInteger::orderBy('created_at', 'desc')->get();

        $resource = new Collection($numbers, function(ConvertedInteger $number) {
            return [
                'number' => $number->number,
                'roman' => $number->roman
            ];
        });

        return $resource->getData();
    }

    /**
     * @return mixed
     */
    public function popular()
    {
        $numbers = ConvertedInteger::groupBy('number')->get();

        $resource = new Collection($numbers, function(ConvertedInteger $number) {
            return [
                'number' => $number->number,
                'roman' => $number->roman
            ];
        });

        return $resource->getData();
    }
}
