<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class StatusTiket extends Model
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
        });
    }

    /**
     * Relationship to transaksi_tiket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function transaksiTiket()
    {
        return $this->belongsToMany(TransaksiTiket::class, 'status_tiket_id', 'uuid');
    }
}
