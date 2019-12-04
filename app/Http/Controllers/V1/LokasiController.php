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
use App\Models\Lokasi;

class LokasiController extends Controller {

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request){
        $listData = Lokasi::with('wisata','penginapan')->get();

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
        $listData = Lokasi::with('wisata','penginapan')->findOrFail($id);

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
            'nama_lokasi'      => 'required',
            'kecamatan'        => 'required',
            'kabupaten'        => 'required',
            'provinsi'         => 'required',
            'negara'           => 'required',
            'latitude'         => 'required',
            'longitude'        => 'required'
        ]);

        $listData = new Lokasi;
        $listData->nama_lokasi = $request->nama_lokasi;
        $listData->kecamatan   = $request->kecamatan;
        $listData->kabupaten     = $request->kabupaten; 
        $listData->provinsi = $request->provinsi;
        $listData->negara   = $request->negara;
        $listData->latitude     = $request->latitude; 
        $listData->longitude     = $request->longitude; 
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
            'nama_lokasi'      => 'required',
            'kecamatan'        => 'required',
            'kabupaten'        => 'required',
            'provinsi'         => 'required',
            'negara'           => 'required',
            'latitude'         => 'required',
            'longitude'        => 'required'
        ]); 
 
        $listData = Lokasi::findOrFail($id);

        $listData->nama_lokasi = $request->nama_lokasi;
        $listData->kecamatan   = $request->kecamatan;
        $listData->kabupaten     = $request->kabupaten; 
        $listData->provinsi = $request->provinsi;
        $listData->negara   = $request->negara;
        $listData->latitude     = $request->latitude; 
        $listData->longitude     = $request->longitude; 
        
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
        $data = Lokasi::findOrFail($id);
        $data->delete();

        $jsonData = [
            'data' => $data,
            'message' => 'Data berhasil dihapus.'
        ];

        return $this->response($jsonData, 'ok');
    }

}