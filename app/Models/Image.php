<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Image extends Model
{
    use HasFactory;
    // Definición de la tabla asociada al modelo
    protected $table = 'images';

    // Columnas que se pueden asignar masivamente
    protected $fillable = [
        'image_status_id',
        'image_type_id',
        'name',
        'url',
    ];
    // Relación con la tabla image_statuses de uno a muchos
    public function imageStatus(): BelongsTo
    {
        return $this->belongsTo(ImageStatus::class, 'image_status_id');
    }
    // Relación con la tabla image_types de uno a muchos
    public function imageType(): BelongsTo
    {
        return $this->belongsTo(ImageType::class, 'image_type_id');
    }
    //Relacion con la tabla certification_groups de muchos a muchos
    public function certificationGroups(): BelongsToMany
    {
        return $this->belongsToMany(CertificationGroup::class, 'certification_group_image', 'image_id', 'certification_group_id')
            ->withTimestamps();
    }
    // Relacion con la tabla certificatiion_groups de muchos a muchos donde solo quiero obtener los grupos de certificación válidados(campo llamado is_validated)
    public function validatedCertificationGroups(): BelongsToMany
    {
        return $this->certificationGroups()
            ->where('is_validated', true);
    }
}
