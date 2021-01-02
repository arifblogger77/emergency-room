<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasp extends Model
{
    use HasFactory;

    protected $table = 'hasp';

    public $timestamps = false;

    public function phoneno()
    {
        return $this->belongsTo(Phoneno::class, 'phoneno_id', 'id');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'id', 'id');
    }
}
