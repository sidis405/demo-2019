<?php

namespace App;

use App\Events\PostWasUpdated;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = str_slug($post->title);
        });

        static::updating(function ($post) {
            $post->slug = str_slug($post->title);
        });

        // static::updated(function ($post) {
        //     event(new PostWasUpdated($post));
        // });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function isAuthoredBy(User $user)
    {
        return $this->user_id == $user->id;
    }

    public function isNotAuthoredBy(User $user)
    {
        return ! $this->isAuthoredBy($user);
    }

    /**
     * Accessors - Getters
     */

    public function getCoverAttribute($cover)
    {
        return "/storage/" . ($cover ?? 'covers/default.jpg');
    }

    // public function getTitleAttribute($title)
    // {
    //     return join('', array_reverse(str_split(strtoupper($title))));
    // }


    /**
     * Mutators - Setters
     */

    public function setCoverAttribute(UploadedFile $cover)
    {
        $this->attributes['cover'] = $cover->store('covers');
    }

    // public function setTitleAttribute($title)
    // {
    //     $this->attributes['title'] = $title;
    //     $this->attributes['slug'] = str_slug($title);
    // }
}
