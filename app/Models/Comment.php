<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function html(): Attribute
    {
        return new Attribute(
            get: fn() => Str::markdown($this->body)
        );
    }
}
