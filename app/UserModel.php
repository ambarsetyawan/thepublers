<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user';
    const CREATED_AT = 'user_date_created';

    public function index()
    {

    }
}
