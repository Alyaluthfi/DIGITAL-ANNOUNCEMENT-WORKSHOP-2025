<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'content',
        'date',
        'attachment',
    ];
    public function category()
    {
        return $this->belongsTo(categories::class, 'category_id');
    }
    // Otomatis membuat Slug sebelum menyimpan data
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($announcement) {
            $announcement->slug = Str::slug($announcement->title);
        });

        static::updating(function ($announcement) {
            $announcement->slug = Str::slug($announcement->title);
        });
    }
}
