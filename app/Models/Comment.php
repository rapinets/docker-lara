<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'user_id',
        'content',
    ];

    public function childs (): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function parent (): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function user () : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
