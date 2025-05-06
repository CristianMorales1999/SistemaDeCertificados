<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Thiagoprz\CompositeKey\HasCompositeKey;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FontFontStyle extends Model
{
    use HasFactory, HasCompositeKey;

    protected $table = 'font_font_style';
    // Definimos la clave primaria compuesta
    protected $primaryKey = ['font_id', 'font_style_id'];
    public $timestamps = false;
    public $incrementing = false; // No se auto incrementa

    //Columnas que se pueden asignar masivamente
    protected $fillable = [
        'font_id', //Primera clave foranea de la clave compuesta de la tabla font_font_style
        'font_style_id', //Segunda clave foranea de la clave compuesta de la tabla font_font_style
    ];
    //Relación muchos a uno con la tabla fonts
    public function font(): BelongsTo
    {
        return $this->belongsTo(Font::class, 'font_id', 'id');
    }
    //Relación muchos a uno con la tabla font_styles
    public function fontStyle(): BelongsTo
    {
        return $this->belongsTo(FontStyle::class, 'font_style_id', 'id');
    }
    //Relación uno a muchos con la tabla font_configurations
    public function fontConfigurations(): HasMany
    {
        return $this->hasMany(FontConfiguration::class, ['font_id', 'font_style_id'], ['font_id', 'font_style_id']);
    }
}
