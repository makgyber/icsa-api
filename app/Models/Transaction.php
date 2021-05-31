<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'isv_bank_transactions';
    protected $primaryKey = 'transaction_id';
    public $timestamps = false;

    protected $hidden = [
        'account_id', 'user_id', 'loan_id', 'widthdraw_id'
    ];
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'ID');
    }
}
