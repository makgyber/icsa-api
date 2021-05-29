<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'isv_users';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_login',
        'user_pass',
        'user_email',
        "user_nicename",
        "user_url",
        "user_activation_key",
        "user_status",
        "user_registered",
        "display_name"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_pass',
        "user_url",
        "user_activation_key",
        "user_status",
        "user_registered"
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_registered' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->user_pass;
    }

    public function getAuthIdentifierName()
    {
        return $this->user_email;
    }

    public function usermetas() {
        return $this->hasMany(UserMeta::class,'user_id','ID');
    }

    public function profile() {
        $usermetas = $this->usermetas()->whereRaw('substring(meta_key,1,1) != "_"' )->get();
        $extras = [];
        foreach($usermetas as $usermeta) {
            $extras[$usermeta['meta_key']] = $usermeta['meta_value'];
        }
        return $extras;
    }

    public function accounts() {
        return $this->hasMany(Account::class,'user_id','ID');
    }

    
}
