<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Stringable;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = [
        'title', 'content', 'preview_image', 'main_image', 'category_id', 'tag_ids'
    ];

    protected $withCount = ['likedUsers', 'comments'];

    /**
     * @return string
     */
    public function  getDateAttribute(): string
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    /**
     * @return Stringable|mixed
     */
    public function getShortTitleAttribute(): mixed
    {
        return str($this->title)->limit(50);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function likedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }
}
