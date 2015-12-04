<?php
namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Zizaco\Entrust\Traits\EntrustUserTrait;


class User extends \Eloquent implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, /*Authorizable,*/ CanResetPassword;
    use EntrustUserTrait;

    protected $hidden = ['user_password', 'remember_token'];
    public $timestamps = false;
    protected $table = 'user';
    protected $dateFormat = 'U';
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_firstname', 'user_lastname', 'user_email'];


    public function getAuthPassword()
    {
        return $this->user_password;
    }
}