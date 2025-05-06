<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    use HasFactory;

    // Define el nombre de la tabla
    protected $table = 'events';
    public $timestamps = false;

    //Columnas que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'event_type',
    ];

    //casting de event_type tipo enum
    protected $casts = [
        'event_type' => 'string',
    ];

    //Relación uno a uno con CertificationGroup
    public function certificationGroup():HasOne
    {
        return $this->hasOne(CertificationGroup::class, 'event_id');
    }
    //Relación muchos a uno con Person
    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'person_id_rapporteur', 'id');
    }
    //Relación muchos a uno con Project
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
