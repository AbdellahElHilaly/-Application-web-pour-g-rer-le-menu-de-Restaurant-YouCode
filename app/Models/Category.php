<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = []; // items can't into in the data base  != filabel
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

}
