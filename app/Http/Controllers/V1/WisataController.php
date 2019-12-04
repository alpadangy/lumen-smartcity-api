<?php
/*
 * @Author: Ujang Wahyu 
 * @Date: 2018-09-05 10:49:40 
 * @Last Modified by: Ujang Wahyu
 * @Last Modified time: 2018-09-07 15:13:24
 */

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\V1\Controller;
use App\Models\Wisata;

class WisataController extends Controller {

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request){
        $listData = Wisata::with('lokasi','foto')->get();

        $jsonData = [
            'data' => $listData,
            'message' => 'Data berhasil diambil.'
        ];

        return $this->response($jsonData, 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request){ 
        $listData = Wisata::with('lokasi','foto')->findOrFail($id);

        $jsonData = [
            'data' => $listData,
            'message' => 'Data berhasil diambil.'
        ];

        return $this->response($jsonData, 'ok');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){ 
        $this->validate($request, [  
            'nama_tempat'           => 'required',
            'image_url'             => 'required',
            'deskripsi'               => 'required',
            'waktu_buka'           => 'required',
            'waktu_tutup'             => 'required',
            'no_telepon'               => 'required',
            'website'           => 'required',
            'ratting'             => 'required',
            'kategori_id'               => 'required',
            'lokasi_id'               => 'required'
        ]);

        $listData = new Wisata;
        $listData->nama_tempat  = $request->nama_tempat;
        $listData->image_url    = $request->image_url;
        $listData->deskripsi      = $request->deskripsi; 
        $listData->waktu_buka  = $request->waktu_buka;
        $listData->waktu_tutup    = $request->waktu_tutup;
        $listData->no_telepon      = $request->no_telepon; 
        $listData->website  = $request->website;
        $listData->ratting    = $request->ratting;
        $listData->kategori_id      = $request->kategori_id; 
        $listData->lokasi_id  = $request->lokasi_id; 
        $listData->save();

        $jsonData = [
            'data'=> $listData, 
            'message'=> 'Data berhasil dibuat.'
        ];
        return $this->response($jsonData, 'created');
    }

    /**
     * Update the specified resource.
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request){ 
        $this->validate($request, [
            'nama_tempat'           => 'required',
            'image_url'             => 'required',
            'deskripsi'               => 'required',
            'waktu_buka'           => 'required',
            'waktu_tutup'             => 'required',
            'no_telepon'               => 'required',
            'website'           => 'required',
            'ratting'             => 'required',
            'kategori_id'               => 'required',
            'lokasi_id'               => 'required'
        ]); 
 
        $listData = Wisata::findOrFail($id);
        $listData->nama_tempat  = $request->nama_tempat;
        $listData->image_url    = $request->image_url;
        $listData->deskripsi      = $request->deskripsi; 
        $listData->waktu_buka  = $request->waktu_buka;
        $listData->waktu_tutup    = $request->waktu_tutup;
        $listData->no_telepon      = $request->no_telepon; 
        $listData->website  = $request->website;
        $listData->ratting    = $request->ratting;
        $listData->kategori_id      = $request->kategori_id; 
        $listData->lokasi_id  = $request->lokasi_id; 
        $listData->save();

        $jsonData = [
            'data' => $listData,
            'message' => 'Data berhasil diupdate.'
        ];

        return $this->response($jsonData, 'ok');
    }

    /**
     * Delete the specified resource.
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request){
        $data = Wisata::findOrFail($id);
        $data->delete();

        $jsonData = [
            'data' => $data,
            'message' => 'Data berhasil dihapus.'
        ];

        return $this->response($jsonData, 'ok');
    }

}