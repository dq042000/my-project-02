<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'href', 'menu_id'];

    /**
     * 一對多
     */
    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
}