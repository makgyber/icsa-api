<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $table = 'isv_bank_widthrawals';
    protected $primaryKey = 'widthraw_id';
    public $timestamps = false;

    protected $fillable =[
        "amount"              ,
        "bank"                ,
        "bank_account_number" ,
        "account_id"          ,
        "user_id"             ,
        "status"              ,
        'submitted_date'
    ];

    protected $casts = [
        'submitted_date' => 'datetime',
    ];
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'ID');
    }
}
