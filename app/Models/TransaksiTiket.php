<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TransaksiTiket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jumlah_penumpang',
        'status_tiket_id',
        'transaksi_id',
        'tiket_id'
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
            $model->no_tiket = strtotime(date('Y-m-d')) + $model->count();
        });
    }

    /**
     * Relationship to tiket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tiket()
    {
        $this->belongsToMany(Tiket::class, 'tiket_id', 'uuid');
    }

    /**
     * Relationship to transaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function transaksi()
    {
        $this->belongsToMany(Transaksi::class, 'transaksi_id', 'uuid');
    }

    /**
     * Relationship to status_tiket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function statusTiket()
    {
        $this->belongsToMany(StatusTiket::class, 'status_tiket_id', 'uuid');
    }
}
