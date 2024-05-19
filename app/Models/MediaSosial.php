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

    public function profil()
    {
        return $this->belongsToMany(Profil::class, 'profil_media_sosials', 'media_sosial_uuid', 'profil_uuid')->withPivot(['keterangan', 'media_sosial_uuid', 'profil_uuid'])->using(ProfilMediaSosial::class);
    }
}
