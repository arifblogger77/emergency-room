<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $table = 'email';

    protected $fillable = ['eaddress'];

    public $timestamps = false;

    public function hase()
    {
        return $this->hasMany(Hase::class, 'email_id', 'id');
    }
}
