<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'quote',
        'thumbnail',
        'thumbnail_caption',
        'content',
        'published_at',
        'user_id',
        'publisher_name',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime', 
        ];
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public function sdgs(): BelongsToMany
    {
        return $this->belongsToMany(Sdgs::class, 'news_sdgs', 'news_id', 'sdgs_id');
    }
}
