<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'stars',
        'icon',
        'colour',
        'definition_id'
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    public function icon()
    {
        return "fa-solid fa-$this->icon";
    }

    public function definition()
    {
        return $this->belongsToMany(Definition::class,'definition_ratings');
    }


}
