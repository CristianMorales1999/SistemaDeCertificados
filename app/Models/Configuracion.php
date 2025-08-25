<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Configuracion extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'configuraciones';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable=[
        'seccion_de_informacion_id',
        'grupo_de_certificacion_id',
        'fuente_id',
        'tamanio_fuente',
        'estilo_fuente',
        'capitalizacion',
        'color_inicial',
        'color_medio',
        'color_final'
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

    //Relacion muchos a uno con Fuente
    public function fuente(): BelongsTo
    {
        return $this->belongsTo(Fuente::class,'fuente_id');
    }

    //Relacion muchos a uno con GrupoDeCertificacion
    public function grupoDeCertificacion(): BelongsTo
    {
        return $this->belongsTo(GrupoDeCertificacion::class,'grupo_de_certificacion_id');
    }

    //Relacion muchos a uno con SeccionDeInformacion
    public function seccionDeInformacion(): BelongsTo
    {
        return $this->belongsTo(SeccionDeInformacion::class,'seccion_de_informacion_id');
    }
}
