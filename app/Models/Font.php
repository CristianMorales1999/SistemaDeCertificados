<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Font extends Model
{
    use HasFactory;

    // Define el nombre de la tabla
    protected $table = 'fonts';
    public $timestamps = false;

    //Columnas que se pueden asignar masivamente
    protected $fillable = [
        'name',
    ];

    //Relación uno a muchos con la tabla font_font_style
    public function fontFontStyles(): HasMany
    {
        return $this->hasMany(FontFontStyle::class, 'font_id', 'id');
    }

    //Relación indirecta con FontStyle a través de FontFontStyle
    public function fontStyles():HasManyThrough
    {
        return $this->hasManyThrough(
            FontStyle::class,
            FontFontStyle::class,
            'font_id', // Clave foránea en la tabla intermedia (font_font_style)
            'id', // Clave primaria en la tabla de destino (font_styles)
            'id', // Clave primaria en la tabla de origen (fonts)
            'font_style_id' // Clave foránea en la tabla intermedia (font_font_style)
        );
    }
}
