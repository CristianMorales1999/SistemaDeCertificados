<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class CertificateTextType extends Model
{
    use HasFactory;

    // Define el nombre de la tabla
    protected $table = 'certificate_text_types';
    public $timestamps = false;
    
    //Columnas que se pueden asignar masivamente
    protected $fillable = [
        'name',
    ];

    //Relación uno a muchos con la tabla certificate_text_type_certification_group
    public function certificateTextTypeCertificationGroups(): HasMany
    {
        return $this->hasMany(CertificateTextTypeCertificationGroup::class, 'certificate_text_type_id', 'id');
    }
    //Relación indirecta con CertificationGroup a través de CertificateTextTypeCertificationGroup
    public function certificationGroups():HasManyThrough
    {
        return $this->hasManyThrough(
            CertificationGroup::class,
            CertificateTextTypeCertificationGroup::class,
            'certificate_text_type_id', // Clave foránea en la tabla intermedia (certificate_text_type_certification_group)
            'id', // Clave primaria en la tabla de destino (certification_groups)
            'id', // Clave primaria en la tabla de origen (certificate_text_types)
            'certification_group_id' // Clave foránea en la tabla intermedia (certificate_text_type_certification_group)
        );
    }
}
