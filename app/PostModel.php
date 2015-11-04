<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table = 'post';
    protected $dateFormat = 'U';
    protected $primaryKey = 'post_id';

    public function get_post($id){
        return $get_post = Model::where('post_id', $id);
    }
}
