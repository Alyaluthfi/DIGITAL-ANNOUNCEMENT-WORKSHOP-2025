<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Boleh dihapus juga, tapi kalau mau eksplisit:
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
    ];
}
