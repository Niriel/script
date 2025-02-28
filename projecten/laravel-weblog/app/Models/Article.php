<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;



class Article extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'content', 'image_path', 'is_premium'];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function matchPremiumWithAuth()
    {
        if (Auth::check()) {
            // A premium user may see all articles.
            if (Auth::user()->has_premium) {
                return true;
            }
            // An author, premium or not, may always see their own articles.
            if (Auth::id() === $this->id) {
                return true;
            }
        }
        // A non-premium article may be seen by any user, logged in or not.
        if (!$this->is_premium) {
            return true;
        }
        // Here, the article is premium. The user is not logged in, or doesn't have premium, and isn't the author.
        return false;
    }
}
