<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Position extends Model
{
    use HasFactory;

    // Define el nombre de la tabla
    protected $table = 'positions';
    public $timestamps = false;

    //Columnas que se pueden asignar masivamente
    protected $fillable = [
        'name',
    ];

    //Relación uno a muchos con PersonPosition
    public function personPositions(): HasMany
    {
        return $this->hasMany(PersonPosition::class, 'position_id', 'id');
    }
    //Relación indirecta con Person a través de PersonPosition
    public function people(): HasManyThrough
    {
        return $this->hasManyThrough(
            Person::class,
            PersonPosition::class,
            'position_id', // Clave foránea en la tabla intermedia (person_position)
            'id', // Clave primaria en la tabla de destino (persons)
            'id', // Clave primaria en la tabla de origen (positions)
            'person_id' // Clave foránea en la tabla intermedia (person_position)
        );
    }
}
