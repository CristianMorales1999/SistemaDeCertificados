<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class AreaPersonaValorDestacado extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'area_persona_valor_destacado';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'area_persona_id',
        'valor_destacado_id',
        'anio',
        'periodo',
        'estado_certificacion'
    ];

    /**
     * Los atributos que deberían ser convertidos a tipos nativos.
     * 
     * @var array
     */
    protected $casts = [
        'estado_certificacion' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    //Relación muchos a uno con AreaPersona
    public function areaPersona(): BelongsTo
    {
        return $this->belongsTo(AreaPersona::class, 'area_persona_id');// 'area_persona_id' es la clave foránea en la tabla area_persona_valor_destacado
    }
    //Relación muchos a uno con ValorDestacado
    public function valorDestacado(): BelongsTo
    {
        return $this->belongsTo(ValorDestacado::class, 'valor_destacado_id');// 'valor_destacado_id' es la clave foránea en la tabla area_persona_valor_destacado
    }
}
