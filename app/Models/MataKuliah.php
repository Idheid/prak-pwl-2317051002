<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MataKuliah extends Model
{
    // Tentukan nama tabel yang sesuai di database
    protected $table = 'mata_kuliah';

    // Pastikan primary key adalah UUID string (non-incrementing)
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nama_mk',
        'sks',
    ];

    // Generate UUID saat creating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
