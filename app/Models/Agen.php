<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agen extends Model
{
    protected $table = 'Agen';
    protected $primaryKey = 'Id_agen';
    public $timestamps = false;

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'Menawarkan', 'Id_agen', 'Id_cust');
    }
}
