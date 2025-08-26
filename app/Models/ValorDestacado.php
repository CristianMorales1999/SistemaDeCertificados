<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ValorDestacado extends Model
{
    use HasFactory;
    
    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'valores_destacados';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
    ];

    /**
     * Los atributos que deberían ser convertidos a tipos nativos.
     * 
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    //Relación uno a mucho con AreaPersonOutstandingValue
    public function areaPersonaValorDestacados(): HasMany
    {
        return $this->hasMany(AreaPersonaValorDestacado::class, 'valor_destacado_id');
    }
}
