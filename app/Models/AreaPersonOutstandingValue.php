<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Thiagoprz\CompositeKey\HasCompositeKey;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AreaPersonOutstandingValue extends Model
{
    use HasFactory, HasCompositeKey;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'area_person_outstanding_value';
    protected $primaryKey = ['person_id', 'area_id', 'outstanding_value_id'];
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
        'outstanding_value_id',
    ];

    //Relación muchos a uno con la AreaPerson
    public function areaPerson(): BelongsTo
    {
        return $this->belongsTo(AreaPerson::class, ['person_id', 'area_id'], ['person_id', 'area_id']);
    }

    //Relación muchos a uno con la OutstandingValue
    public function outstandingValue(): BelongsTo
    {
        return $this->belongsTo(OutstandingValue::class, 'outstanding_value_id', 'id');
    }
}
