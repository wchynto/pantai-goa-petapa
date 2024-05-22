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
        'kendaraan_uuid',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_uuid', 'uuid');
    }

    /**
     * Relationship to transaksi
     *
     * @return \illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function transaksi()
    {
        return $this->belongsToMany(Transaksi::class, 'transaksi_tikets', 'tiket_uuid')->withPivot('jumlah_penumpang', 'transaksi_uuid', 'tiket_uuid')->using(TransaksiTiket::class);
    }
}
