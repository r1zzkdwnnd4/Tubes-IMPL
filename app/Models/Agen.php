<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Agen extends Authenticatable
{
    use Notifiable;

    protected $table = 'Agen';
    protected $primaryKey = 'Id_agen';
    public $timestamps = false;

    protected $fillable = [
        'Area',
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
