<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoDeCertificacion extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'tipos_de_certificacion';

    //Indica que el modelo no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'codigo',
    ];

    //Relación uno a muchos con GrupoDeCertificacion
    public function gruposDeCertificacion(): HasMany
    {
        return $this->hasMany(GrupoDeCertificacion::class, 'tipo_de_certificacion_id');
    }

    //Relación uno a muchos con GrupoDeCertificacion filtrada por tipo_de_certificacion_id
    public function gruposDeCertificacionPorTipo($idTipo): HasMany
    {
        return $this->hasMany(GrupoDeCertificacion::class, 'tipo_de_certificacion_id')->where('tipo_de_certificacion_id', $idTipo);
    }
}
