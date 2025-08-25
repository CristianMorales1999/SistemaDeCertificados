<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Imagen extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'imagenes';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'ruta',
        'tipo',
        'estado',
        'extension'
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

    //Relacion uno a mmuchos con GrupoDeCertificacion(imagen_plantilla_id)
    public function gruposDeCertificacionPlantilla(): HasMany
    {
        return $this->hasMany(GrupoDeCertificacion::class, 'imagen_plantilla_id');
    } 

    //Relacion uno a muchos con GrupoDeCertificacion(imagen_logo_sediprano_id)
    public function gruposDeCertificacionLogo(): HasMany
    {
        return $this->hasMany(GrupoDeCertificacion::class, 'imagen_logo_sediprano_id');
    }

    //Relacion uno a uno con Usuario(imagen_perfil_id)
    public function usuario(): HasOne
    {
        return $this->hasOne(User::class, 'imagen_perfil_id');
    }

    //Relacion uno a uno con Proyecto(imagen_logo_id)
    public function proyecto(): HasOne
    {
        return $this->hasOne(Proyecto::class, 'imagen_logo_id');
    }

    //Relacion uno a uno con Persona(imagen_firma_id)
    public function persona(): HasOne
    {
        return $this->hasOne(Persona::class, 'imagen_firma_id');
    }
}
