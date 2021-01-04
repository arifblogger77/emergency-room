<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;

class Med extends Model
{
    use HasFactory;

    protected $primaryKey = 'px';
    protected $table = 'med';
    protected $fillable = ['pid', 'did', 'medication_id', 'dosage', 'medfrom', 'medto', 'howoften'];
    public $timestamps = false;

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'did', 'did');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'pid', 'pid');
    }

    public function medication()
    {
        return $this->belongsTo(Medication::class, 'medication_id', 'id');
    }
}
