<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Thiagoprz\CompositeKey\HasCompositeKey;

class AreaPerson extends Model
{
    use HasFactory, HasCompositeKey;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'area_person';
    protected $primaryKey = ['person_id', 'area_id'];
    public $timestamps = false;
    public $incrementing = false; // Indica que la clave primaria no es autoincremental

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

    //Relación muchos a uno con la Person
    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }
    //Relación muchos a uno con la Area
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }
    //Relación uno a muchos con AreaPersonOutstandingValue
    public function areaPersonOutstandingValues(): HasMany
    {
        return $this->hasMany(AreaPersonOutstandingValue::class, ['person_id', 'area_id'], ['person_id', 'area_id']);
    }
    //Relación uno a muchos con AreaPersonProject
    public function areaPersonProjects(): HasMany
    {
        return $this->hasMany(AreaPersonProject::class, ['person_id', 'area_id'], ['person_id', 'area_id']);
    }
    //Relación uno a muchos con la Project(Projects as DP)
    public function projectsAsDP():HasMany
    {
        return $this->hasMany(Project::class, ['person_id_dp', 'area_id_dp'], ['person_id', 'area_id']);
    }
    //Relación uno a muchos con la Project(Projects as CODP)
    public function projectsAsCODP():HasMany
    {
        return $this->hasMany(Project::class, ['person_id_codp', 'area_id_codp'], ['person_id', 'area_id']);
    }
}

