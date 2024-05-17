<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Profil extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'deskripsi',
        'alamat',
        'logo',
        'email',
        'alamat',
        'no_telpon'
    ];

    /**
     * The booting method of the model
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    /**
     * Relationship to profil
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function profil()
    {
        return $this->belongsToMany(Profil::class, 'profil_media_sosial', 'profil_id', 'media_sosial_id');
    }
}
