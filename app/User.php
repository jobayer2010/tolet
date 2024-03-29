<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
    
    /**
    * @param string|array $roles
    */
    public function authorizeRoles($roles)
    {
        // if (is_array($roles)) {
        //     return $this->hasAnyRole($roles) ||
        //         abort(401, 'This action is unauthorized.');
        // }
        // return $this->hasRole($roles) ||
        //     abort(401, 'This action is unauthorized.');
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                redirect('/home');
        }
        return $this->hasRole($roles) ||
                "Unauthorize Action";
    }

    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role'::class)->withTimeStamps();
    }

    public function postedTolets()
    {
        return $this->hasMany('App\Tolet');
    }
    
    public function bookmarkedTolets()
    {
        return $this->belongsToMany('App\Tolet'::class);
    }
}
