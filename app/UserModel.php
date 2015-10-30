<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $dateFormat = 'U';
    protected $primaryKey = 'user_id';
}
