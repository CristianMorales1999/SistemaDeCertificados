<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evento extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'eventos';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'proyecto_id',
        'nombre',
        'fecha',
        'tipo',
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

    //Relación uno a muchos con GrupoDeCertificacion
    public function gruposDeCertificacion():HasMany
    {
        return $this->hasMany(GrupoDeCertificacion::class, 'evento_id');
    }

    //Relación muchos a muchos con Persona
    public function personas(): BelongsToMany
    {
        return $this->belongsToMany(Persona::class, 'evento_persona', 'evento_id', 'persona_id')->withPivot('rol')->withTimestamps();
    }

    //Relación muchos a uno con Proyecto
    public function proyecto(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');// 'proyecto_id' es la clave foránea en la tabla eventos
    }
}
