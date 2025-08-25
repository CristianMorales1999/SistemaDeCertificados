<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AreaPersonaCargo extends Model
{
    use HasFactory;
    
    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'area_persona_cargo';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'area_persona_id',
        'cargo_id',
        'proyecto_coordinado_id',
        'fecha_inicio',
        'fecha_fin',
        'estado_inicial',
        'estado_final'
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

    //Relación muchos a uno con AreaPersona
    public function areaPersona(): BelongsTo
    {
        return $this->belongsTo(AreaPersona::class, 'area_persona_id');// 'area_persona_id' es la clave foránea en la tabla area_persona_cargo
    }

    //Relación muchos a uno con Cargo
    public function cargo(): BelongsTo
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');// 'cargo_id' es la clave foránea en la tabla area_persona_cargo
    }
    //Relación uno a uno con Proyecto (En caso sea director de proyecto)
    public function proyectoDirigido(): HasOne
    {
        return $this->hasOne(Proyecto::class, 'area_persona_cargo_id_dp');
    }
    //Relación uno a uno con Proyecto (En caso sea codirector de proyecto)
    public function proyectoCoDirigido(): HasOne
    {
        return $this->hasOne(Proyecto::class, 'area_persona_cargo_id_codp');
    }
    //Relación muchos a uno con Proyecto (En caso sea coordinador de proyecto)
    public function proyectoCoordinado(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_coordinado_id');// 'proyecto_coordinado_id' es la clave foránea en la tabla area_persona_cargo
    }
    
}
