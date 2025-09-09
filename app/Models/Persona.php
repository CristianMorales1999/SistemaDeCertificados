<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Persona extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'personas';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'nombres',
        'apellidos',
        'correo_personal',
        'correo_institucional',
        'sexo',
        'codigo',
        'imagen_firma'
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

    //Relación uno a muchos con AreaPersona
    public function areaPersonas():HasMany
    {
        return $this->hasMany(AreaPersona::class, 'persona_id');
    }

    // Relación uno a muchos con Certificado
    public function certificados():HasMany
    {
        return $this->hasMany(Certificado::class, 'persona_id');
    }

    // Relación uno a muchos con EntidadAliadaPersona
    public function entidadAliadaPersonas():HasMany
    {
        return $this->hasMany(EntidadAliadaPersona::class, 'persona_id');
    }

    // Relación uno a uno con Usuario
    public function usuario():HasOne
    {
        return $this->hasOne(User::class, 'persona_id');//'persona_id' es la clave foránea en la tabla usuarios
    }

    // Relación muchos a muchos con Evento
    public function eventos():BelongsToMany
    {
        return $this->belongsToMany(Evento::class, 'evento_persona', 'persona_id', 'evento_id')->withPivot('rol')->withTimestamps();
    }
}
