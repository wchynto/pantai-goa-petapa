<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Str;

class TransaksiTiket extends Pivot
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'jumlah_penumpang',
    'status',
    'transaksi_uuid',
    'tiket_uuid'
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
      $model->uuid = Str::uuid();
      $model->no_tiket = strtotime(date('Y-m-d')) + $model->count();
      $model->expire_in = date('Y-m-d H:i:s', strtotime('+3 day'));
    });
  }
}
