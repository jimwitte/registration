<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'password', 'position', 'unitType', 'unitNumber', 'council', 'address',
        'city', 'state', 'zip', 'phone', 'paymentMethod', 'isInstructor', 'isAdmin', 'archived'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $casts = [
        'isAdmin' => 'boolean', 'isInstructor' => 'boolean', 'archived' => 'boolean'
    ];

    /**
     * get sessions for user
     */
    public function sessions()
    {
        return $this->belongsToMany('App\Session')->orderBy('startTime', 'asc');
    }

    public function admin()
    {
        return $this->isAdmin;
    }

    public function profileComplete()
    {
        if (
            empty($this->firstName) OR
            empty($this->lastName) OR
            empty($this->email) OR
            empty($this->position) OR
            empty($this->unitType) OR
            empty($this->council) OR
            empty($this->address) OR
            empty($this->city) OR
            empty($this->state) OR
            empty($this->zip) OR
            empty($this->phone) OR
            empty($this->paymentMethod)
        ) {
            return false;
        } else {
            return true;
        }
    }

    /** add a session to user */
    public function addSession($session)
    {
        return $this->sessions()->attach($session->id);
    }

    public function fullName() {
        return $this->firstName." ".$this->lastName;
    }
}
