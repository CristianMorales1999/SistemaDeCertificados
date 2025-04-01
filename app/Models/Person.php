<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'people';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'gender',
        'signature_image_url',  // URL de la imagen de firma
    ];

    /**
     * Los atributos que deberían ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'gender' => 'string', // Para el ENUM 'masculino', 'femenino'
    ];

        /**
     * Relación muchos a muchos con el modelo Area.
     *
     * Incluye atributos adicionales desde la tabla pivot.
     */
    public function areas():BelongsToMany
    {
        return $this->belongsToMany(Area::class, 'area_person', 'person_id', 'area_id')
                    ->withPivot(['start_date', 'end_date', 'is_active'])
                    ->withTimestamps();
    }
}
