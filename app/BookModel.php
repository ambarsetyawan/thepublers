<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\BookRequest;
use Intervention\Image\ImageManagerStatic as Image;

class BookModel extends Model
{
    protected $table = 'book';
    protected $dateFormat = 'U';
    protected $primaryKey = 'book_id';
    public $timestamps = false;
}
