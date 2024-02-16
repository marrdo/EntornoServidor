<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Phone;
use App\Models\User;

class Monumento extends Model
{
    use HasFactory;

    protected $fillable = [
      'nombre',
      'aforo',
      'provincia',
      'user_id'
    ];

    protected $hidden = [
      'id',
      'created_at',
      'updated_at'
  ];
  

    public function provincia(){
      return $this->belongsTo(Provincia::class, 'provincia');
    }

    public function phone(){
      return $this->hasOneThrough(Phone::class,User::class,'phone_id','id');
      
    }
    public function user(){
      return $this->belongsTo(User::class);
    }
}
