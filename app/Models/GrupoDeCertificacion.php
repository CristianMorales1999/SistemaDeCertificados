<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GrupoDeCertificacion extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'grupos_de_certificacion';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_de_certificacion_id',
        'imagen_plantilla_id',
        'imagen_logo_sediprano_id',
        'imagen_sello_id',
        'proyecto_id',
        'evento_id',
        'usuario_creador_id',
        'usuario_generador_id',
        'nombre',
        'descripcion',
        'fecha_emision',
        'fecha_generacion',
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
    
    //Relación muchos a uno con TipoDeCertificacion
    public function tipoDeCertificacion(): BelongsTo
    {
        return $this->belongsTo(TipoDeCertificacion::class, 'tipo_de_certificacion_id');
    }
    
    //Relación muchos a uno con User(usuario_creador_id)
    public function usuarioCreador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_creador_id');
    }
    
    //Relación muchos a uno con User(usuario_generador_id)
    public function usuarioGenerador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_generador_id');
    }
    
    //Relación muchos a uno con Proyecto
    public function proyecto(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }
    
    //Relación muchos a uno con Evento
    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }
    
    //Relación uno a muchos con Certificado
    public function certificados(): HasMany
    {
        return $this->hasMany(Certificado::class, 'grupo_de_certificacion_id');
    }
    
    //Relación muchos a uno con Imagen (imagen_plantilla_id)
    public function imagenPlantilla(): BelongsTo
    {
        return $this->belongsTo(Imagen::class, 'imagen_plantilla_id');
    }

    //Relación muchos a uno con Imagen (imagen_logo_sediprano_id)
    public function imagenLogoSediprano(): BelongsTo
    {
        return $this->belongsTo(Imagen::class, 'imagen_logo_sediprano_id');
    }

    //Relación muchos a uno con Imagen (imagen_sello_id)
    public function imagenSelloSedipro(): BelongsTo
    {
        return $this->belongsTo(Imagen::class, 'imagen_sello_id');
    }

    //Relación uno a muchos con Configuracion
    public function configuraciones(): HasMany
    {
        return $this->hasMany(Configuracion::class, 'grupo_de_certificacion_id');
    }
}
