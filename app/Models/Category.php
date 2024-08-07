<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'title'
    ];

    protected $withCount = ['posts'];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }

    public function canDelete(): bool
    {
        return !$this->posts()->withTrashed()->exists();
    }
}
