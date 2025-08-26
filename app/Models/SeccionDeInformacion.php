<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SeccionDeInformacion extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'secciones_de_informacion';

    public $timestamps = false;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    // Relación uno a muchos con Configuracion
    public function configuraciones(): HasMany
    {
        return $this->hasMany(Configuracion::class, 'seccion_de_informacion_id');
    }
}
