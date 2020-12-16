<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'danhmucsp';
    public function categories(){
        return $this->hasMany(Category::class, 'danhmuccha');
    }
    public function childrenCategories(){
        return $this->hasMany(Category::class, 'danhmuccha')->with('categories');
    }
}
