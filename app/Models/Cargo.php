<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cargo extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'cargos';


    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'nombre_femenino',
        'cargo_interno'
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

    //Relación uno a muchos con AreaPersonaCargo
    public function areaPersonaCargos(): HasMany
    {
        return $this->hasMany(AreaPersonaCargo::class, 'cargo_id');
    }
    //Relación uno a muchos con EntidadAliada
    public function entidadesAliadas(): HasMany
    {
        return $this->hasMany(EntidadAliada::class, 'cargo_representante_id');
    }
}
