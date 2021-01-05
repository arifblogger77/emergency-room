<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beda extends Model
{
    use HasFactory;

    protected $table = 'beda';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = ['pid', 'bedno', 'from', 'to'];

    protected $primaryKey = 'pid';

    protected $casts = [
        'bedno' => 'string',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'pid', 'pid');
    }

    public function bed()
    {
        return $this->belongsTo(Bed::class, 'bedno', 'number');
    }
}
