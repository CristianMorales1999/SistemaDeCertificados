<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OutstandingValue extends Model
{
    use HasFactory;
    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'outstanding_values';
    public $timestamps = false;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    //Relación uno a mucho con AreaPersonOutstandingValue
    public function areaPersonOutstandingValues(): HasMany
    {
        return $this->hasMany(AreaPersonOutstandingValue::class, 'outstanding_value_id', 'id');
    }
}
