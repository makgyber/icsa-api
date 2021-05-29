<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    use HasFactory;

    protected $table = 'isv_usermeta';
    protected $primaryKey = 'umeta_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'meta_key',
        'meta_value',
    ];

    protected $hidden = [
        'umeta_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'ID');
    }
}
