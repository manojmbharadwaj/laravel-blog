<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'usertype_id',
        'google_id',
        'user_avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function login($user)
    {
        if (!empty($user)) {
            $userDetails = self::getUserBasicDetails($user->email);

            // insert
            if (empty($userDetails)) {
                $userDetails = self::addUser($user);
            }
            unset($userDetails->updated_at);
            unset($userDetails->created_at);
            unset($userDetails->remember_token);
            unset($userDetails->archive);

            return $userDetails;
        }

        return FALSE;
    }

    public static function addUser($user)
    {
        $newUser = [
            'usertype_id' => UT_ENDUSER,
            'name' => ucwords($user->user['name']),
            'email' => $user->user['email'],
            'google_id' => $user->user['id'],
            'user_avatar' => $user->avatar,
        ];

        return User::create($newUser);
    }

    public static function checkUserExists($email)
    {
        return User::where('email', $email)->exists();
    }

    public static function getUserBasicDetails($email)
    {
        return User::where('email', $email)->first();
    }

    /**
     * Fake Google Login with any email.
     * SHOULD ONLY BE USED IN DEV ENVIRONMENTS.
     *
     * @return User
     */
    public static function fakeLogin(): User
    {
        if (env('APP_DEBUG')) {

            $email = 'admin@gmail.com';

            $userDetails = self::getUserBasicDetails($email);

            unset($userDetails->updated_at);
            unset($userDetails->created_at);
            unset($userDetails->remember_token);
            unset($userDetails->archive);

            return $userDetails;
        }
    }
}
