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

class Lokasi extends Model{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lokasi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'nama_lokasi','kecamatan','kabupaten','provinsi','negara','latitude','longitude'
    ];

    public function wisata()
    {
        return $this->hasMany('App\Models\Wisata');
    }

    public function penginapan()
    {
        return $this->hasMany('App\Models\Penginapan');
    }

}