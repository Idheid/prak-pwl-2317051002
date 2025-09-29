<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];

    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
    ];

    public function user()
    {
        // return $this->hasMany(UserModel::class, 'kelas_id');
        return $this->hasMany(User::class);
    }

    public function getkelas(){
        return $this->all();
    }
}