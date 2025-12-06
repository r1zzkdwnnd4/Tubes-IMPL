<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'Customer';
    protected $primaryKey = 'Id_cust';
    public $timestamps = false;

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'Id_cust');
    }

    public function wisata()
    {
        return $this->belongsToMany(Wisata::class, 'Memilih', 'Id_cust', 'Id_wisata');
    }

    public function agen()
    {
        return $this->belongsToMany(Agen::class, 'Menawarkan', 'Id_cust', 'Id_agen');
    }
}
