<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;

class BookModel extends Model
{
    protected $table = 'book';
    protected $dateFormat = 'U';
    protected $primaryKey = 'book_id';
    public $timestamps = false;

    protected $fillable = ['book_author', 'book_title', 'book_year', 'book_category', 'book_text'];
}
