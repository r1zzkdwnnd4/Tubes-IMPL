<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'Customer';
    protected $primaryKey = 'Id_cust';
    public $timestamps = false;

    protected $fillable = [
        'NamaCus',
        'Email',
        'Password',
        'Alamat',
        'NoHP'
    ];
}


