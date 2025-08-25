<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EntidadAliada extends Model
{
    use HasFactory;
    
    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'entidades_aliadas';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'cargo_de_representante'
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

    //Relación uno a muchos con EntidadAliadaPersona
    public function entidadAliadaPersonas() : HasMany
    {
        return $this->hasMany(EntidadAliadaPersona::class, 'entidad_aliada_id');
    }

    //Relación uno a muchos con Proyecto
    public function proyectos() : HasMany
    {
        return $this->hasMany(Proyecto::class, 'entidad_aliada_id');
    }
}
