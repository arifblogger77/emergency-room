<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;

    protected $table = 'bed';

    protected $fillable = ['number'];
    public $timestamps = false;

    protected $primaryKey = 'number';
}
