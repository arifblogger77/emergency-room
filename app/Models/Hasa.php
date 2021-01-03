<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasa extends Model
{
    use HasFactory;

    protected $table = 'hasa';

    protected $fillable = ['id', 'address_id'];

    public $timestamps = false;

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'id', 'id');
    }
}
