<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CertificationType extends Model
{
    use HasFactory;

    // Define el nombre de la tabla
    protected $table = 'certification_types';
    public $timestamps = false;

    //Columnas que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'abbreviation',
    ];

    //Relación uno a muchos con la tabla certification_groups
    public function certificationGroups(): HasMany
    {
        return $this->hasMany(CertificationGroup::class, 'certification_type_id', 'id');
    }

    //Relación uno a muchos con el modelo CertificationGroup donde solo se traen los grupos de certificados que pertenecen a un determinado tipo
    public function certificationGroupsByType($typeId): HasMany
    {
        return $this->hasMany(CertificationGroup::class, 'certification_type_id','id')->where('certification_type_id', $typeId);
    }
}
