<?php

namespace App\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Books extends Model
{
    public function getBooks()
    {
        return DB::table('books')->get();
    }
}
