<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'user_id',
        'account_name',
        'account_number',
        'bank_name',
        'bank_country',
        'bank_address',
        'amount',
        'description',
        'swift_code',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
