<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fuente extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'fuentes';

    //Indica que el modelo no debe manejar las columnas created_at y updated_at
    public $timestamps = false;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
    ];

    //Relación uno a muchos con Configuracion
    public function configuraciones(): HasMany
    {
        return $this->hasMany(Configuracion::class, 'fuente_id');
    }
}
