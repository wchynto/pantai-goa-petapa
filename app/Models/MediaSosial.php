<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MediaSosial extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'keterangan'
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
     * Relationship to profil_media_sosial
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function profil_media_sosial()
    {
        return $this->belongsToMany(Profil::class, 'profil_media_sosial', 'media_sosial_id', 'profil_id');
    }
}
