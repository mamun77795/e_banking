<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public $fillable = ['user_id', 'transaction_type', 'amount', 'fee'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
