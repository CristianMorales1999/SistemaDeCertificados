<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Area extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'areas';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'abbreviation',
    ];

    //Relación uno a muchos con AreaPerson
    public function areaPerson(): HasMany
    {
        return $this->hasMany(AreaPerson::class, 'area_id', 'id');
    }
    //Relación indirecta con Person a través de AreaPerson
    public function people():HasManyThrough
    {
        return $this->hasManyThrough(
            Person::class,
            AreaPerson::class,
            'area_id', // Clave foránea en la tabla intermedia (area_person)
            'id', // Clave primaria en la tabla de destino (people)
            'id', // Clave primaria en la tabla de origen (areas)
            'person_id' // Clave foránea en la tabla intermedia (area_person)
        );
    }
}

