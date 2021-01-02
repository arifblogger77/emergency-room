<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hase extends Model
{
    use HasFactory;

    protected $table = 'hase';

    public $timestamps = false;

    public function person()
    {
        return $this->belongsTo(Person::class, 'id', 'id');
    }

    public function email()
    {
        return $this->belongsTo(Email::class, 'eaddress', 'eaddress');
    }
}
