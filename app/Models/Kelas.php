<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'id',
        'nama_kelas',
    ];

    // Karena kita pakai UUID, bukan auto increment bigint
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * Boot function untuk generate UUID otomatis saat record dibuat.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * Relasi ke tabel user (satu kelas punya banyak user)
     */
    public function users()
    {
        return $this->hasMany(User::class, 'kelas_id');
    }

    /**
     * Method helper untuk ambil semua kelas
     */
    public function getKelas()
    {
        return $this->all();
    }
}
