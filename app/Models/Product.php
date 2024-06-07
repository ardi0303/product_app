<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    use HasFactory;
    protected $primaryKey = 'id_product';
    protected $guarded = [];
    public static function countData()
    {
        return self::count();
    }

    public static function countDataActive()
    {
        return self::where('stock', '>', 0)->count();
    }
}