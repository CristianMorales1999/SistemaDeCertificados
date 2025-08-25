<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Proyecto extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'proyectos';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'area_persona_cargo_id_dp',
        'area_persona_cargo_id_codp',
        'imagen_logo_id',
        'area_id',
        'entidad_aliada_id',
        'nombre',
        'fecha_inicio',
        'fecha_fin'
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

    //Relación uno a muchos con Evento
    public function eventos(): HasMany
    {
        return $this->hasMany(Evento::class, 'proyecto_id', 'id');
    }

    //Relacion muchos a uno con Area
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id');//'area_id' es la clave foránea en la tabla proyectos
    }

    //Relación uno a muchos con GrupoDeCertificacion
    public function gruposDeCertificacion(): HasMany
    {
        return $this->hasMany(GrupoDeCertificacion::class, 'proyecto_id');
    }

    //Relación uno a uno con AreaPersonaCargo
    public function areaPersonCargoDP(): BelongsTo
    {
        return $this->belongsTo(AreaPersonaCargo::class,'area_persona_cargo_id_dp');//'area_persona_cargo_id_dp' es la clave foránea en la tabla proyectos
    }

    //Relación uno a uno con AreaPersonaCargo
    public function areaPersonCargoCODP(): BelongsTo
    {
        return $this->belongsTo(AreaPersonaCargo::class,'area_persona_cargo_id_codp');//'area_persona_cargo_id_codp' es la clave foránea en la tabla proyectos
    }

    //Relación uno a muchos con AreaPersonaCargo(proyecto_coordinado_id)
    public function areaPersonaCargoCoordinadores(): HasMany
    {
        return $this->hasMany(AreaPersonaCargo::class, 'proyecto_coordinado_id');// 'proyecto_coordinado_id' es la clave foránea en la tabla area_persona_cargo
    }

    //Relación muchos a muchos con AreaPersona
    public function areaPersonas(): BelongsToMany
    {
        return $this->belongsToMany(AreaPersona::class, 'area_persona_proyecto', 'proyecto_id', 'area_persona_id')
            ->withPivot('rol')
            ->withTimestamps();
    }

    //Relación muchos a muchos con EntidadAliadaPersona
    public function entidadAliadaPersonas(): BelongsToMany
    {
        return $this->belongsToMany(EntidadAliadaPersona::class, 'entidad_aliada_persona_proyecto', 'proyecto_id', 'entidad_aliada_persona_id')
            ->withPivot('rol')
            ->withTimestamps();
    }

    //Relación muchos a uno con EntidadAliada
    public function entidadAliada(): BelongsTo
    {
        return $this->belongsTo(EntidadAliada::class, 'entidad_aliada_id');//'entidad_aliada_id' es la clave foránea en la tabla proyectos
    }

    //Relacion uno a uno con Imagen(imagen_logo_id)
    public function imagenLogo(): BelongsTo
    {
        return $this->belongsTo(Imagen::class, 'imagen_logo_id');//'imagen_logo_id' es la clave foránea en la tabla proyectos
    }
}
