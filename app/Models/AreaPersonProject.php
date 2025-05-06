<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Thiagoprz\CompositeKey\HasCompositeKey;

class AreaPersonProject extends Model
{
    use HasFactory, HasCompositeKey;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'area_person_project';
    protected $primaryKey = ['person_id', 'area_id', 'project_id'];
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
        'project_id',
    ];

    //Relación muchos a uno con la AreaPerson
    public function areaPerson(): BelongsTo
    {
        return $this->belongsTo(AreaPerson::class, ['person_id', 'area_id'], ['person_id', 'area_id']);
    }
    //Relación muchos a uno con la Project
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
