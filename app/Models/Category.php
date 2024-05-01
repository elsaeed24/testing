<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory,Translatable;

        
    public $translatedAttributes = ['name','description'];
    protected $translationForeignKey = 'category_id';
    protected $table = 'categories';

    protected $guarded = [];
}
