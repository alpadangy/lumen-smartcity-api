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

class Foto extends Model{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'foto';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'nama_foto', 'image_url','wisata_id','penginapan_id'
    ];

    public function penginapan()
    {
        return $this->belongsTo('App\Models\Penginapan');
    }

    public function wisata()
    {
        return $this->belongsTo('App\Models\Wisata');
    }
    
}