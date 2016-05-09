<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'title','startTime','capacity','location','description','archived'
    ];

    protected $casts = [
        'archived' => 'boolean'
    ];

    /**
     * get the users for a given session
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function addUser($user) {
        return $this->users()->attach($user->id);
    }

}
