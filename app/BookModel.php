<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Nicolaslopezj\Searchable\SearchableTrait;

class BookModel extends Model implements SluggableInterface
{
    use SluggableTrait;
    use SearchableTrait;

    protected $sluggable = [
        'build_from' => ['book_title'],
        'save_to' => 'slug',
        'unique' => true,
        'on_update' => true,
    ];


    protected $searchable = [
        'columns' => [
            'book_title' => 10,
            'book_author' => 10,
        ],
    ];


    protected $table = 'book';
    protected $dateFormat = 'U';
    protected $primaryKey = 'book_id';
    public $timestamps = false;

    protected $fillable = ['book_author', 'book_title', 'book_year', 'book_category', 'book_text'];
}

