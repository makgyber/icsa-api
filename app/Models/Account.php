<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'isv_bank_accounts';
    protected $primaryKey = 'account_id';
    public $timestamps = false;

    protected $fillable =[
        "created_date" ,
        "balance"     ,
        "description" ,
        "user_id"     ,
        "account_type" ,
        "status"      
    ];

    protected $casts = [
        'created_date' => 'datetime',
    ];
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'ID');
    }
}
