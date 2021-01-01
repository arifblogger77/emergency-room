<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phoneno extends Model
{
    use HasFactory;

    protected $table = 'phoneno';

    protected $primaryKey = 'areacode';
    protected $fillable = ['areacode', 'number'];

    public $timestamps = false;
}
