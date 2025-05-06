<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Thiagoprz\CompositeKey\HasCompositeKey;

class PersonPosition extends Model
{
    use HasFactory, HasCompositeKey;

    // Define el nombre de la tabla
    protected $table = 'person_position';
    protected $primaryKey=['person_id','position_id'];
    public $incrementing = false; // Indica que la clave primaria no es autoincremental
    public $timestamps = false;

    //Columnas que se pueden asignar masivamente
    protected $fillable = [
        'person_id',
        'position_id',
        'start_date',
        'end_date',
    ];

    //Relación muchos a uno con la tabla persons
    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

    //Relación muchos a uno con la tabla positions
    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }
    //Relación uno a muchos con CertGroupPersonPosition
    public function certGroupPersonPositions(): HasMany
    {
        return $this->hasMany(CertGroupPersonPosition::class, ['person_id', 'position_id'], ['person_id', 'position_id']);
    }
}
