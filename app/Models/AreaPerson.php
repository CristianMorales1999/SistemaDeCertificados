<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AreaPerson extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'area_person';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'person_id',
        'area_id',
        'start_date',
        'end_date',
        'is_active',
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

    //Relaciona de muchos a muchos el modelo AreaPerson con el modelo OutstandingValue, pero ten en cuenta que el modelo AreaPerson tiene una llave primaria compuesta (person_id, area_id), producto de la relacion de muchos a muchos de los modelos Area y People, por lo que la llave foranea en la tabla pivot area_person_outstanding_value es area_person_area_id y area_person_person_id por parte de la tabla area_person y por parte de la tabla outstanding_value es outstanding_value_id y los campos extra de la tabla pivot son date y los timestamps
    public function outstandingValues(): BelongsToMany
    {
        return $this->belongsToMany(
            OutstandingValue::class,
            'area_person_outstanding_value',
            'area_person_person_id',
            'outstanding_value_id'
        )
        ->withPivot(['area_person_area_id', 'date'])
        ->withTimestamps();
    }
}

