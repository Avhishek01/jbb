<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    use HasFactory;
    protected $fillable = [
        'number'
    ];
    public function employee()
    {
        return $this->belongsTo(Employe::class , 'employee_id');

        //return $this->belongsTo(User::class, 'foreign_key', 'local_key');
    }
    
}
