<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'customer_id',
        'destinasi',
        'tanggal_travel',
        'jumlah_orang',
        'metode_pembayaran',
        'status_pembayaran',
        'total_harga'
    ];

    // relasi ke customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // relasi ke ticket
    public function ticket()
    {
        return $this->hasOne(Ticket::class);
    }
}
