<?php

namespace App\app\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    public function getBooks()
    {
//        return DB::table('books')->get();
        return Books::all()->toArray();
    }
}
