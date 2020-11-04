<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
class personal_access_tokens extends Model

{use HasApiTokens, Notifiable;
    protected $fillable = ['abilities'];
    protected $table='personal_access_tokens';
    public function Personas()
    {
        return $this->hasMany('app\Personas');  
    }
    public $timestamps= false;
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
}

