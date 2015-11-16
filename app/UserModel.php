<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    public $timestamps = false;
    protected $table = 'user';
    protected $dateFormat = 'U';
    protected $primaryKey = 'user_id';

    protected $fillable = ['user_firstname', 'user_lastname', 'user_email'];
 }
