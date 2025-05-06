<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificate extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'certificates';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'certification_group_id',
        'certificate_status_id',
        'person_id',
        'code',
    ];

    //timestamps casteados
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relación uno a muchos con la tabla certification_groups.
     *
     * @return BelongsTo
     */
    public function certificationGroup(): BelongsTo
    {
        return $this->belongsTo(CertificationGroup::class, 'certification_group_id');
    }

    /**
     * Relación uno a muchos con la tabla certificate_statuses.
     *
     * @return BelongsTo
     */
    public function certificateStatus(): BelongsTo
    {
        return $this->belongsTo(CertificateStatus::class, 'certificate_status_id');
    }

    /**
     * Relación uno a muchos con la tabla people.
     *
     * @return BelongsTo
     */
    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
}
