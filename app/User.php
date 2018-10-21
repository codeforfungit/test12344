<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;


class User extends Authenticatable
{
    use Notifiable;
    use HasRoleAndPermission;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $userRole = 'userRole';

    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }


    public function userHasOneRole()
    {
        return $this->authUser()->role->first();
    }

    public function isUserHasMultipleRole(){

        return $this->authUserRoleCount()>1?true:false;
    }

    public  function isUserHasOneRole()
    {
        return $this->authUserRoleCount()==1?true:false;
    }
    public function authUser()
    {
        return Auth::user();
    }

    public function authUserRoleCount()
    {

        return $this->authUser()->role->count();
    }

    public function isRoleInSession()
    {

        return session()->has($this->userRole) ? true : false;
    }

    public function setRoleInSession($roleId)
    {

        return session()->put($this->userRole, $roleId);
    }

    public function resetRoleInSession(){
        session()->forget($this->userRole);
        session()->flush();
        return true;
    }
}
