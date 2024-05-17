<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pengunjung extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama'
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
     * Relationship to user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'uuid');
    }

    /**
     * Relationship to guest
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function guest()
    {
        return $this->hasOne(Guest::class, 'guest_id', 'uuid');
    }

    /**
     * Relationship to transaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function transaksi()
    {
        return $this->belongsToMany(Transaksi::class, 'transaksi_id', 'uuid');
    }
}
