<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Thiagoprz\CompositeKey\HasCompositeKey;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CertificateTextTypeCertificationGroup extends Model
{
    use HasFactory, HasCompositeKey;

    // Define el nombre de la tabla
    protected $table = 'cert_text_type_cert_group';
    protected $primaryKey=['certificate_text_type_id','certification_group_id'];
    public $incrementing = false; // Indica que la clave primaria no es autoincremental
    public $timestamps = false;

    //Columnas que se pueden asignar masivamente
    protected $fillable = [
        'certificate_text_type_id',
        'certification_group_id',
        'font_configuration_id',
    ];

    //Relación muchos a uno con la tabla certificate_text_types
    public function certificateTextType(): BelongsTo
    {
        return $this->belongsTo(CertificateTextType::class, 'certificate_text_type_id', 'id');
    }

    //Relación muchos a uno con la tabla certification_groups
    public function certificationGroup(): BelongsTo
    {
        return $this->belongsTo(CertificationGroup::class, 'certification_group_id', 'id');
    }

    //Relación muchos a uno con la tabla font_configurations
    public function fontConfiguration(): BelongsTo
    {
        return $this->belongsTo(FontConfiguration::class, 'font_configuration_id', 'id');
    }
}
