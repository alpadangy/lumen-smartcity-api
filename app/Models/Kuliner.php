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

class Kuliner extends Model{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kuliner';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'nama_kuliner','image_url','stok','deskripsi','status','jeniskuliner_id','tempatkuliner_id'
    ];

    public function jeniskuliner()
    {
        return $this->belongsTo('App\Models\Jeniskuliner');
    }

    public function tempatkuliner()
    {
        return $this->belongsTo('App\Models\Tempatkuliner');
    }

}