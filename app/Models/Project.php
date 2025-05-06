<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Thiagoprz\CompositeKey\HasCompositeKey;

class Project extends Model
{
    use HasFactory, HasCompositeKey;

    // Define el nombre de la tabla
    protected $table = 'projects';
    public $timestamps = false;

    //Columnas que se pueden asignar masivamente
    protected $fillable = [
        'area_id_dp',
        'person_id_dp',
        'area_id_codp',
        'person_id_codp',
        'name',
        'start_date',
        'end_date',
    ];

    //Relación uno a muchos con la tabla events
    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'project_id', 'id');
    }

    //Relación uno a uno con CertificationGroup
    public function certificationGroup(): HasOne
    {
        return $this->hasOne(CertificationGroup::class, 'project_id', 'id');
    }

    //Relación muchos a uno con AreaPerson(DP)
    public function areaPersonDP(): BelongsTo
    {
        return $this->belongsTo(AreaPerson::class,['person_id_dp', 'area_id_dp'], ['person_id', 'area_id']);
    }
    //Relación muchos a uno con AreaPerson(CODP)
    public function areaPersonCODP(): BelongsTo
    {
        return $this->belongsTo(AreaPerson::class, ['person_id_codp', 'area_id_codp'], ['person_id', 'area_id']);
    }
    //Relación uno a muchos con AreaPersonProject
    public function areaPersonProjects(): HasMany
    {
        return $this->hasMany(AreaPersonProject::class, 'project_id', 'id');
    }
}
