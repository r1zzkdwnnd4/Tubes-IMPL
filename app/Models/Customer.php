<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $table = 'Customer';
    protected $primaryKey = 'Id_cust';
    public $timestamps = false;

    protected $fillable = [
        'NamaCustomer',
        'Email',
        'Password',
        'Alamat',
        'NoHP'
    ];

    // because DB column is "Password", not "password"
    public function getAuthPassword()
    {
        return $this->Password;
    }
}
