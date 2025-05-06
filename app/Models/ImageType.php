<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ImageType extends Model
{
    use HasFactory;

    // Define el nombre de la tabla
    protected $table = 'image_types';
    public $timestamps = false;

    //Columnas que se pueden asignar masivamente
    protected $fillable = [
        'name',
    ];

    //Relación uno a muchos con la tabla images
    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'image_type_id');
    }

    //Relación uno a muchos con la tabla images donde solo se traen las imagenes de un determinado estado
    public function imagesByStatus($statusId): HasMany
    {
        return $this->hasMany(Image::class, 'image_type_id')->where('image_status_id', $statusId);
    }
}
