<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
  
{
     
      use HasFactory;
     protected $table = 'employee';
     protected $guarded = [];

     public function user()
     {
         return $this->belongsTo(User::class , 'employee_id');

         //return $this->belongsTo(User::class, 'foreign_key', 'local_key');
     }

     public function mobiles()
     {
         return $this->hasMany(Mobile::class , 'employee_id');
         //return $this->hasMany(Employe::class, 'foreign_key', 'local_key');
     }
}
