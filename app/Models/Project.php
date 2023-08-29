<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Support\Str;


class Project extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'description', 'thumb', 'github', 'demo','slug', 'type_id'];

    public function Type(){
        return $this->belongsTo(Type::class);
    }

    public function Technologies(){
        return $this->belongsToMany(Technology::class);
    }

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }
}
