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

    public static function sortingBooks($column, $direction)
    {
        return Books::query()->orderBy($column, $direction)->get()->toArray();
    }

    public static function filteringBooks($column, $sign, $value)
    {
        return Books::query()->where($column, $sign, $value)->get()->toArray();
    }
}
