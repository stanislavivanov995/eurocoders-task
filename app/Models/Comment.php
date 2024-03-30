<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{Image, User};
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'image_id',
        'text'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
