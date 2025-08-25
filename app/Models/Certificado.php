<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificado extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'certificados';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'persona_id',
        'grupo_de_certificacion_id',
        'codigo',
        'ruta_qr',
        'estado',
    ];

    //timestamps casteados
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    //Relación muchos a uno con GrupoDeCertificacion
    public function grupoDeCertificacion(): BelongsTo
    {
        return $this->belongsTo(GrupoDeCertificacion::class, 'grupo_de_certificacion_id');// 'grupo_de_certificacion_id' es la clave foránea en la tabla certificados
    }

    //Relación muchos a uno con Persona
    public function person(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');// 'persona_id' es la clave foránea en la tabla certificados
    }
}
