<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transaksi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total_harga',
        'total_bayar',
        'tanggal_transaksi',
        'snap_token'
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
            $model->no_transaksi = strtotime(date('Y-m-d')) + $model->count();
        });
    }

    /**
     * Relationship to transaksi_tiket
     *
     * @return \illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function transaksiTiket()
    {
        return $this->belongsToMany(TransaksiTiket::class, 'transaksi_id', 'uuid');
    }

    /**
     * Relationship to status_transaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function statusTransaksi()
    {
        return $this->belongsToMany(StatusTransaksi::class, 'status_transaksi_id', 'uuid');
    }

    /**
     * Relationship to pengunjung
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pengunjung()
    {
        return $this->belongsToMany(Pengunjung::class, 'pengunjung_id', 'uuid');
    }
}
