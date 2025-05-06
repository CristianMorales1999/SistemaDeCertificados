<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Thiagoprz\CompositeKey\HasCompositeKey;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CertGroupPersonPosition extends Model
{
    use HasFactory, HasCompositeKey;

    // Define el nombre de la tabla
    protected $table = 'cert_group_person_position';
    protected $primaryKey=['person_id','position_id','certification_group_id'];
    public $incrementing = false; // Indica que la clave primaria no es autoincremental
    public $timestamps = false;

    //Columnas que se pueden asignar masivamente
    protected $fillable = [
        'person_id',
        'position_id',
        'cert_group_id',
    ];

    //Relación muchos a uno con la tabla cert_groups
    public function certificationGroup(): BelongsTo
    {
        return $this->belongsTo(CertificationGroup::class, 'certification_group_id', 'id');
    }

    //Relación muchos a uno con la tabla person_positions
    public function personPosition(): BelongsTo
    {
        return $this->belongsTo(PersonPosition::class, ['person_id', 'position_id'], ['person_id', 'position_id']);
    }
}
