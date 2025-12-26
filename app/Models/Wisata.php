<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'Wisata';
    protected $primaryKey = 'Id_wisata';
    public $timestamps = false;


     // Kolom yang boleh diisi (untuk CRUD admin & seeder)
      protected $fillable = [
        'NamaWisata',
        'Area',
        'Deskripsi',
        'Gambar',
        'Harga'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'Id_wisata');
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'Memilih', 'Id_wisata', 'Id_cust');
    }
}
