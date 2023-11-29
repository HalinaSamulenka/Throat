<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Laravel\Sanctum\HasApiTokens;

class Definition extends Model
{
    use HasFactory, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'word_id',
        'word_type_id',
        'definition',
        'user_id',
        'appropriate',
        'rating_id',
        'review'

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
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function word()
    {
        return $this->belongsTo(Word::class);
    }


    public function wordType()
    {
        return $this->belongsTo(WordType::class)->withDefault(['name'=>'unknown']);
    }

    public function rating()
    {
        return $this->belongsToMany(Rating::class,'definition_ratings');
    }
    public function avgRating()
    {
        return $this->rating->avg('ratings');
    }


}
