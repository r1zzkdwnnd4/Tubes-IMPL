<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'Admin';
    protected $primaryKey = 'Id_admin';
    public $timestamps = false;

    public function transaksi()
    {
        return $this->belongsToMany(Transaksi::class, 'Mengelola', 'Id_admin', 'Id_Transaksi');
    }
}
