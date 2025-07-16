<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Sdgs extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
    ];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'news_sdgs', 'sdgs_id', 'news_id');
    }
}
