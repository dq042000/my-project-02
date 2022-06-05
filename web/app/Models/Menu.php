<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'href', 'sh'];

    /**
     * 一對多
     */
    public function subs()
    {
        return $this->hasMany(SubMenu::class);
    }
}