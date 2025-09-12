<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AreaPersona extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'area_persona';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'area_id',
        'persona_id',
        'fecha_inicio',
        'fecha_fin',
        'estado',
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


    //Relación muchos a uno con Area
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    //Relación muchos a uno con Persona
    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    //Relación uno a muchos con AreaPersonaCargo
    public function areaPersonaCargos(): HasMany
    {
        return $this->hasMany(AreaPersonaCargo::class, 'area_persona_id');// 'area_persona_id' es la clave foránea en la tabla area_persona_cargo
    }

    //Relación uno a muchos con AreaPersonaValorDestacado
    public function areaPersonaValorDestacados(): HasMany
    {
        return $this->hasMany(AreaPersonaValorDestacado::class, 'area_persona_id');
    }

    //Relación muchos a muchos con Proyecto a través de la tabla pivote area_persona_proyecto
    public function proyectos(): BelongsToMany
    {
        return $this->belongsToMany(Proyecto::class,'area_persona_proyecto','area_persona_id','proyecto_id')->withPivot('rol')->withTimestamps();
    }
}

