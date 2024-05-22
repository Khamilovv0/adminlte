<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;

    public function news()
    {
        return $this->hasMany(News::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'news_id');
    }

    public function scopeMostViewedLastMonth($query)
    {
        return $query->where('created_at', '>=', now()->subMonth())
            ->orderBy('views', 'desc')
            ->limit(4)
            ->get();
    }
}
