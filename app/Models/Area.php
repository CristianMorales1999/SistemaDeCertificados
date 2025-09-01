<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'areas';

    /**
     * La clave primaria asociada a la tabla.
     */
    protected $primaryKey = 'id'; // Util cuando el nombre de la clave primaria no es 'id', ya que laravel asume que la clave primaria es 'id' por defecto

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'abreviatura',
        'estado',
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

    //Relación uno a muchos con AreaPersona
    public function areaPersonas(): HasMany
    {
        return $this->hasMany(AreaPersona::class, 'area_id');
    }
    //Relación uno a muchos con Proyecto
    public function proyectos(): HasMany
    {
        return $this->hasMany(Proyecto::class, 'area_id');
    }
}

