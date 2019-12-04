<?php
/*
 * @Author: Ujang Wahyu 
 * @Date: 2018-09-04 11:55:05 
 * @Last Modified by: Ujang Wahyu
 * @Last Modified time: 2018-09-04 12:30:15
 */

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Wisata extends Model{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wisata';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'nama_tempat','image_url','deskripsi','waktu_buka','waktu_tutup','no_telepon','website','ratting','kategori_id','lokasi_id'
    ];

    public function lokasi()
    {
        return $this->belongsTo('App\Models\Lokasi');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori');
    }

    public function foto()
    {
        return $this->hasMany('App\Models\Foto');
    }

}