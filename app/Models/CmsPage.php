<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class CmsPage extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'category_id',
        'tags',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
        'meta_title' => 'array',
        'meta_description' => 'array',
        'meta_keywords' => 'array',
        'tags' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected $translatable = [
        'title',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];


    public function category()
    {
        return $this->belongsTo(CmsCategory::class);
    }
}
