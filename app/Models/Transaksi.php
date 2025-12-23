<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'Transaksi';
    protected $primaryKey = 'Id_transaksi';
    public $timestamps = false;

    protected $fillable = [
        'Id_cust',
        'Id_wisata',
        'Jumlah_Orang',
        'Tanggal_Travel',
        'Metode_Pembayaran',
        'Total',
        'Status',
        'Kode_Booking'
    ];

    // =========================
    // RELATIONSHIPS
    // =========================

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'Id_wisata', 'Id_wisata');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'Id_cust', 'Id_cust');
    }

    public function admin()
    {
        return $this->belongsToMany(
            Admin::class,
            'Mengelola',
            'Id_transaksi',
            'Id_admin'
        );
    }
}
