<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'Admin';
    protected $primaryKey = 'Id_admin';
    public $timestamps = false;

    protected $fillable = [
        'Departemen',
        'Email',
        'Password'
    ];

    protected $hidden = [
        'Password',
    ];

    public function getAuthPassword()
{
    return $this->Password;
}

}
