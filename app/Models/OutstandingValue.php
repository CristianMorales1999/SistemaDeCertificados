<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutstandingValue extends Model
{
    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'outstanding_values';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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
    /**
     * Relación muchos a muchos con el modelo AreaPerson.
     */
    public function areaPerson()
    {
        //Relaciona de muchos a muchos el modelo AreaPerson con el modelo OutstandingValue, pero ten en cuenta que el modelo AreaPerson tiene una llave primaria compuesta (person_id, area_id), producto de la relacion de muchos a muchos de los modelos Area y People, por lo que la llave foranea en la tabla pivot area_person_outstanding_value es area_person_area_id y area_person_person_id por parte de la tabla area_person y por parte de la tabla outstanding_value es outstanding_value_id y los campos extra de la tabla pivot son date y los timestamps
        return $this->belongsToMany(
            AreaPerson::class,
            'area_person_outstanding_value',
            'outstanding_value_id',
            'area_person_person_id'
        )->withPivot(['area_person_area_id', 'date'])
        ->withTimestamps();
    }
}
