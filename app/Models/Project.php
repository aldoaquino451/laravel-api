<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Type;


class Project extends Model
{
    use HasFactory;

    public static function generateSlug($name){
        $slug = Str::slug($name, '-');
        $original_slug = $slug;
        $exist = Project::where('slug', $slug)->first();
        $c = 1;
        while($exist){
            $slug = $original_slug. '-'. $c;
            $exist = Project::where('slug', $slug)->first();
            $c++;
        }
        return $slug;
    }

    public static function formatDate($date) {
        $date = date_create($date);
        $date_str = date_format($date, 'd/m/Y');
        return $date_str;
    }

    public function type() {
        return $this->belongsTo(Type::class);

    }

    public function tecnologies() {
        return $this->belongsToMany(Tecnology::class);
    }
}
