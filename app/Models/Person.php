<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Person extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'people';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'gender',
        'signature_image_url',  // URL de la imagen de firma
    ];

    /**
     * Los atributos que deberían ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'gender' => 'string', // Para el ENUM 'masculino', 'femenino'
    ];

    // Relación uno a muchos con la tabla certificates
    public function certificates():HasMany
    {
        return $this->hasMany(Certificate::class, 'person_id');
    }
    // Relación uno a muchos con la tabla events
    public function events():HasMany
    {
        return $this->hasMany(Event::class, 'person_id');
    }
    //Relación uno a muchos con la tabla area_person
    public function areaPersons():HasMany
    {
        return $this->hasMany(AreaPerson::class, 'person_id');
    }
    //Relación indirecta con Area a través de AreaPerson
    public function areas():HasManyThrough
    {
        return $this->hasManyThrough(
            Area::class,
            AreaPerson::class,
            'person_id', // Clave foránea en la tabla intermedia (area_person)
            'id', // Clave primaria en la tabla de destino (areas)
            'id', // Clave primaria en la tabla de origen (people)
            'area_id' // Clave foránea en la tabla intermedia (area_person)
        );
    }
    //Relación uno a muchos con la tabla person_position
    public function personPosition():HasMany
    {
        return $this->hasMany(PersonPosition::class, 'person_id');
    }
    //Relación indirecta con Position a través de PersonPosition
    public function positions():HasManyThrough
    {
        return $this->hasManyThrough(
            Position::class,
            PersonPosition::class,
            'person_id', // Clave foránea en la tabla intermedia (person_position)
            'id', // Clave primaria en la tabla de destino (positions)
            'id', // Clave primaria en la tabla de origen (people)
            'position_id' // Clave foránea en la tabla intermedia (person_position)
        );
    }
}
