<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FontConfiguration extends Model
{
    use HasFactory;

    // Define el nombre de la tabla
    protected $table = 'font_configurations';
    //Columnas que se pueden asignar masivamente
    protected $fillable = [
        'font_id',//Primera clave foranea de la clave compuesta de la tabla font_font_style
        'font_style_id',//Segunda clave foranea de la clave compuesta de la tabla font_font_style
        'font_size',
        'initial_color_code',
        'intermediate_color_code',
        'final_color_code',
    ];

    //Relación muchos a uno con la tabla font_font_style
    public function fontFontStyle(): BelongsTo
    {
        return $this->belongsTo(FontFontStyle::class, ['font_id', 'font_style_id'], ['font_id', 'font_style_id']);
    }
    //Relación uno a muchos con la tabla certificate_text_type_certification_group
    public function certificateTextTypeCertificationGroup(): HasMany
    {
        return $this->hasMany(CertificateTextTypeCertificationGroup::class,'font_configuration_id','id');
    }

}
