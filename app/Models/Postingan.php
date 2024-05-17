<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Postingan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul',
        'thumbnail',
        'body',
        'kategori_id'
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
     * Relationship to komentar
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function komentar()
    {
        return $this->belongsToMany(Komentar::class, 'postingan_id', 'uuid');
    }

    /**
     * Relationship to kategori
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'uuid');
    }
}
