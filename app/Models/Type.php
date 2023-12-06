<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Project;

class Type extends Model
{
    use HasFactory;

    public static function generateSlug($name){
        $slug = Str::slug($name, '-');
        $original_slug = $slug;
        $exist = Type::where('slug', $slug)->first();
        $c = 1;
        while($exist){
            $slug = $original_slug. '-'. $c;
            $exist = Type::where('slug', $slug)->first();
            $c++;
        }
        return $slug;
    }

    public function projects() {
        return $this->hasMany(Project::class);

    }
}
