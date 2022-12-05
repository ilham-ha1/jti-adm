<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table='kategori';
    protected $id='id';

    protected $fillable = [
        'nama_kategori'
    ];

    public function dokument(){
        return $this->hasMany(Dokumen::class);
    }
}
