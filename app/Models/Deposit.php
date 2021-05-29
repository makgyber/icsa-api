<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $table = 'isv_bank_deposits';
    protected $primaryKey = 'deposit_id';
    public $timestamps = false;

    protected $fillable = [
        "amount" ,
        "photo"      ,    
        "account_id"  ,
        "user_id"        ,
        "type"          , 
        "status"         ,
    ];

    protected $casts = [
        'submitted_date' => 'datetime',
    ];
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'ID');
    }
}
