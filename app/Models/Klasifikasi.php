<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    // public function surat_keluar()
    // {
    //     return $this->belongsTo('App\Models\SuratKeluar');
    // }

    public function surat_keluar()
    {
        return $this->hasMany('App\Models\SuratKeluar');
    }

    public function surat_masuk()
    {
        return $this->hasMany('App\Models\SuratMasuk');
    }
}
