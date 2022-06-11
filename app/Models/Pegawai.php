<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function golongan()
    {
        return $this->hasOne('App\Models\Golongan', 'id', 'golongan_id');
    }

    public function jabatan()
    {
        return $this->hasOne('App\Models\Jabatan', 'id', 'jabatan_id');
    }
}
