<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';
    protected $fillable = ['province', 'city', 'street', 'streetno'];

    public $timestamps = false;

    public function hasa()
    {
        return $this->hasMany(Hasa::class, 'address_id', 'id');
    }
}
