<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Session
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 */
	class Session {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Session[] $sessions
 */
	class User {}
}

