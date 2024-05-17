<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tiket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'keterangan',
        'harga',
        'kendaraan_id',
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
     * Relationship to kendaraan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id', 'uuid');
    }

    /**
     * Relationship to transaksi_tiket
     *
     * @return \illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function transaksiTiket()
    {
        return $this->belongsToMany(TransaksiTiket::class, 'tiket_id', 'uuid');
    }
}
