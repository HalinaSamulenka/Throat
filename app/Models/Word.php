<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'word',
        'review',
        //'word_type_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    //    public function wordType()
    //    {
    //        return $this->belongsTo(WordType::class);
    //    }

    public function definitions()
    {
        return $this->hasMany(Definition::class);
    }

    public function definitionCount()
    {
        return $this->defintions()->count();
    }
}
