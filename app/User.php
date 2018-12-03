<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\MailResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'designation', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function setPasswordAttribute($password){

    $this->attributes['password'] = bcrypt($password);
  
    }

    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    public function statuses()
    {
        return $this->hasMany('App\Status');
    }

     public function newprojects()
    {
        return $this->hasMany('App\Newproject');
    }

}

