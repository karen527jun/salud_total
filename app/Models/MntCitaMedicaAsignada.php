<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MntCitaMedicaAsignada extends Model
{
    use HasFactory;
    protected $table = 'mnt_cita_medica_asignada';

    protected $fillable = [
        'id_paciente',
        'id_doctor',
        'fecha',
        'hora'
    ];

     public function doctor(){
        return $this->belongsTo(MntDoctor::class,'id_doctor');
    }
    public function paciente(){
        return $this->belongsTo(MntPaciente::class,'id_paciente');
    }
    public function usuario(){
        return $this->hasOneThrough( MntPaciente::class, User::class,'id', 'id_usuario');
    }
}
