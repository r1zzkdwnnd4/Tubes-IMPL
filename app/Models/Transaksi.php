<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'Transaksi';
    protected $primaryKey = 'Id_Transaksi';
    public $timestamps = false;

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'Id_wisata');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'Id_cust');
    }

    public function admin()
    {
        return $this->belongsToMany(Admin::class, 'Mengelola', 'Id_Transaksi', 'Id_admin');
    }
}
