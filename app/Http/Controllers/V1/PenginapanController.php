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
use App\Models\Penginapan;

class PenginapanController extends Controller {

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request){
        $listData = Penginapan::with('lokasi','foto')->get();

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
        $listData = Penginapan::with('lokasi','foto')->findOrFail($id);

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
            'nama_penginapan'           => 'required',
            'image_url'             => 'required',
            'deskripsi'               => 'required',
            'harga'               => 'required',
            'waktu_buka'           => 'required',
            'waktu_tutup'             => 'required',
            'no_telepon'               => 'required',
            'website'           => 'required',
            'ratting'             => 'required',
            'lokasi_id'               => 'required'
        ]);

        $listData = new Penginapan;
        $listData->nama_penginapan  = $request->nama_penginapan;
        $listData->image_url    = $request->image_url;
        $listData->deskripsi      = $request->deskripsi; 
        $listData->harga      = $request->harga; 
        $listData->waktu_buka  = $request->waktu_buka;
        $listData->waktu_tutup    = $request->waktu_tutup;
        $listData->no_telepon      = $request->no_telepon; 
        $listData->website  = $request->website;
        $listData->ratting    = $request->ratting; 
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
            'nama_penginapan'           => 'required',
            'image_url'             => 'required',
            'deskripsi'               => 'required',
            'harga'               => 'required',
            'waktu_buka'           => 'required',
            'waktu_tutup'             => 'required',
            'no_telepon'               => 'required',
            'website'           => 'required',
            'ratting'             => 'required',
            'lokasi_id'               => 'required'
        ]); 
 
        $listData = Penginapan::findOrFail($id);
        $listData->nama_penginapan  = $request->nama_penginapan;
        $listData->image_url    = $request->image_url;
        $listData->deskripsi      = $request->deskripsi; 
        $listData->harga      = $request->harga; 
        $listData->waktu_buka  = $request->waktu_buka;
        $listData->waktu_tutup    = $request->waktu_tutup;
        $listData->no_telepon      = $request->no_telepon; 
        $listData->website  = $request->website;
        $listData->ratting    = $request->ratting; 
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
        $data = Penginapan::findOrFail($id);
        $data->delete();

        $jsonData = [
            'data' => $data,
            'message' => 'Data berhasil dihapus.'
        ];

        return $this->response($jsonData, 'ok');
    }

}