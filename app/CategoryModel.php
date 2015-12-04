<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class CategoryModel extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => ['category_name'],
        'save_to' => 'slug',
        'unique' => true,
        'on_update' => true,
    ];


    protected $table = 'category';
    protected $dateFormat = 'U';
    protected $primaryKey = 'category_id';
    public $timestamps = false;

    protected $fillable = ['category_name'];
}
