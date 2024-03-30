<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{Comment, User};
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Image extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
