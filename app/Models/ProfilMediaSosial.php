<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProfilMediaSosial extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alamat',
        'profil_id',
        'media_sosial_id',
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
