<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuoteModel extends Model
{
    protected $table = 'quote';
    protected $dateFormat = 'U';
    protected $primaryKey = 'quote_id';
    public $timestamps = false;

    protected $fillable = ['quote_author', 'quote_text'];
}
