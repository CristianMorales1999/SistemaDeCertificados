<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CertificationGroup extends Model
{
    use HasFactory;

    protected $table = 'certification_groups';

    //Columnas que se pueden asignar masivamente
    protected $fillable = [
        'certification_type_id',
        'created_by_user_id',
        'certified_by_user_id',
        'project_id',
        'event_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'issue_date',
    ];
    //Relación uno a muchos con la tabla certification_types
    public function certificationType(): BelongsTo
    {
        return $this->belongsTo(CertificationType::class, 'certification_type_id');
    }
    //Primera relación muchos a uno con la tabla users
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }
    //Segunda relación muchos a uno con la tabla users(certified_by_user_id)
    public function certifiedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'certified_by_user_id');
    }
    //Relación uno a uno con la tabla projects
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    //Relación uno a uno con la tabla events
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
    //Relación uno a muchos con la tabla certificates
    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class, 'certification_group_id');
    }
    //Relación muchos a muchos con la tabla images
    public function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class, 'certification_group_image', 'certification_group_id', 'image_id')
            ->withTimestamps();
    }
    //Relación muchos a muchos con la tabla certificate_text_type_certification_group
    public function certificateTextTypeCertificationGroups(): HasMany
    {
        return $this->hasMany(CertificateTextTypeCertificationGroup::class, 'certification_group_id', 'id');
    }
    //Relación indirecta con CertificateTextType a través de CertificateTextTypeCertificationGroup
    public function certificateTextTypes(): HasManyThrough
    {
        return $this->hasManyThrough(
            CertificateTextType::class,
            CertificateTextTypeCertificationGroup::class,
            'certification_group_id', // Clave foránea en la tabla intermedia (certificate_text_type_certification_group)
            'id', // Clave primaria en la tabla de destino (certificate_text_types)
            'id', // Clave primaria en la tabla de origen (certification_groups)
            'certificate_text_type_id' // Clave foránea en la tabla intermedia (certificate_text_type_certification_group)
        );
    }
    //Relación uno a muchos con la tabla cert_group_person_position
    public function certGroupPersonPositions(): HasMany
    {
        return $this->hasMany(CertGroupPersonPosition::class, 'certification_group_id');
    }
}
