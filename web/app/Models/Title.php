<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Title extends Model
{
    use HasFactory;
    use SoftDeletes; // 引用軟刪除

    protected $fillable = ['text', 'img', 'sh'];
}