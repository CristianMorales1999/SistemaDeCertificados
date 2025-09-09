<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'persona_id',
        'name',
        'email',
        'profile_picture',
        'estado',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn (string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }

    //Relación muchos a muchos con Rol
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Rol::class, 'user_rol', 'user_id', 'role_id')
            ->withPivot('is_active')
            ->withTimestamps();
    }
    //Relación uno a muchos con GrupoDeCertificacion (grupos de certificación creados por el usuario)
    public function gruposDeCertificacionCreados(): HasMany
    {
        return $this->hasMany(GrupoDeCertificacion::class, 'usuario_creador_id');
    }

    //Relación uno a muchos con GrupoDeCertificacion (grupos de certificación generados por el usuario)
    public function gruposDeCertificacionGenerados(): HasMany
    {
        return $this->hasMany(GrupoDeCertificacion::class, 'usuario_generador_id');
    }

    //Relacion uno a uno con Persona
    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');//'persona_id' es la clave foránea en la tabla users
    }
}
