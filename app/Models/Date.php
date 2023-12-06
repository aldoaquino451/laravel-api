<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;
    public static function formatDate($date) {
        $date = date_create($date);
        $date_str = date_format($date, 'd/m/Y');
        return $date_str;
    }
}
