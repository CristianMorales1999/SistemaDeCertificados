<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class FontStyle extends Model
{
    use HasFactory;

    // Define el nombre de la tabla
    protected $table = 'font_styles';
    public $timestamps = false;
    
    //Columnas que se pueden asignar masivamente
    protected $fillable = [
        'name',
    ];

    //Relación uno a muchos con la tabla font_font_style
    public function fontFontStyles(): HasMany
    {
        return $this->hasMany(FontFontStyle::class, 'font_style_id', 'id');
    }
    //Relación indirecta con Font a través de FontFontStyle
    public function fonts(): HasManyThrough
    {
        return $this->hasManyThrough(
            Font::class,
            FontFontStyle::class,
            'font_style_id', // Clave foránea en la tabla intermedia (font_font_style)
            'id', // Clave primaria en la tabla de destino (fonts)
            'id', // Clave primaria en la tabla de origen (font_styles)
            'font_id' // Clave foránea en la tabla intermedia (font_font_style)
        );
    }
}
