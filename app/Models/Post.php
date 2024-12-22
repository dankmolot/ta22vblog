<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function snippet(): Attribute {
        return Attribute::get(function () {
            if (strlen($this->body) <= 100) {
                return $this->body;
            }

            return substr_replace($this->body, "...", 100);
        });
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($tag) {
        return $this->tags->contains($tag);
    }
}
