<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;


class Post extends Model
{
    use HasFactory;
    protected $fillable = ["title","content","slug","categoryId",'tags','userId'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'categoryId');
    }
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'post_tags');
    }
    public function user(){
        return $this->belongsTo(User::class,'userId');
    }
}
