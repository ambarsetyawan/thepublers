<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model {
    protected $table = 'post';
    protected $dateFormat = 'U';
    protected $primaryKey = 'post_id';
}
