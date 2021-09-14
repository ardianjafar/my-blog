<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = ['author','categories'];
    // Coba unpas
    public function scopeFilter($query)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where('title','like', '%' . $search . '%')
                  ->orWhere('body','like', '%' . $search . '%')
            );

        $query->when($filters['categories'] ?? false, fn($query, $category) =>
            $query->whereHas('categories', fn($query)=>
                $query->where('slug', $category)
            )
        );
        
        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query)=>
                $query->where('username', $author)
            )
        );
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function scopeSearch($query, $title)
    {
        return $query->where('title', 'LIKE', "%{$title}%");
    }
    public function scopePublish($query)
    {
        return $query->where('status', "publish");
    }

    public function scopeDraft($query)
    {
        return $query->where('status', "draft");
    }

    // Author
    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
