<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EntidadAliadaPersona extends Model
{
    use HasFactory;
    
    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'entidad_aliada_persona';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'entidad_aliada_id',
        'persona_id',
        'fecha_inicio',
        'fecha_fin',
        'rol',
        'estado'
    ];

    /**
     * Los atributos que deberían ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    //Relación muchos a uno con Persona
    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');// 'persona_id' es la clave foránea en la tabla entidad_aliada_persona
    }

    //Relación muchos a uno con EntidadAliada
    public function entidadAliada(): BelongsTo
    {
        return $this->belongsTo(EntidadAliada::class, 'entidad_aliada_id');// 'entidad_aliada_id' es la clave foránea en la tabla entidad_aliada_persona
    }
    
    //Relación muchos a muchos con Proyecto
    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class, 'entidad_aliada_persona_proyecto', 'entidad_aliada_persona_id', 'proyecto_id')->withPivot('rol')->withTimestamps();
    }
}
