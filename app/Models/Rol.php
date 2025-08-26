<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Rol extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'roles';

    //Indica que el modelo no debe manejar las columnas created_at y updated_at
    public $timestamps = false;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion'
    ];


    //Relación muchos a muchos con User
    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_rol', 'rol_id', 'user_id');
    }
}
