<?php

namespace Vikram\Sticpay\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sticpay extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'client_id',
        'txn_id',
        'amount',
        'payment_currency',
        'ip_address',
        'interface_version',
        'product_info_json',
        'response_json',
        'status'
    ];
    
    public function Client(){
        return $this->belongsTo(User::class, "client_id", "client_id");
    }
    
    protected $quard = [];
}
