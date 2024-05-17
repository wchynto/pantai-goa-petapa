<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Guest extends Model
{
    use HasFactory;

    /**
 * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no_telpon',
        'pengunjung_id',
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
     * Relationship to pengunjung
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pengunjung()
    {
        return $this->belongsTo(Pengunjung::class, 'pengunjung_id', 'uuid');
    }
}
