<?php

namespace App\app\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    public static function getBooks()
    {
//        return DB::table('books')->get();
        return Books::all()->toArray();
    }

    public static function findBooks($searchParameter)
    {
        return Books::query()->where('author', $searchParameter)->orWhere('title', $searchParameter)
            ->get()->toArray();
    }

    public static function makeBooksList($column, $sign, $value, $orderByColumn, $direction)
    {
        return Books::query()->where($column, $sign, $value)->orderBy($orderByColumn, $direction)->get()->toArray();
    }
}
