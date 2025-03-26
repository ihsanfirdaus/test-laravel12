<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * 
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string|null $image
 * @property string $status
 * @property string $published_at
 */
class Post extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image',
        'status',
        'published_at'
    ];
}
