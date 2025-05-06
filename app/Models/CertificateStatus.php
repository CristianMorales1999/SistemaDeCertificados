<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CertificateStatus extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'certificate_statuses';
    public $timestamps = false;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];


    /**
     * Relación uno a muchos con el modelo Certificate.
     *
     * @return HasMany
     */
    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class, 'certificate_status_id', 'id');
    }

    //Relación uno a muchos con el modelo Certificate donde solo se traen los certificados que pertenecen a un determinado estado de certificado
    public function certificatesByStatus($statusId): HasMany
    {
        return $this->hasMany(Certificate::class, 'certificate_status_id','id')->where('certificate_status_id', $statusId);
    }
}
