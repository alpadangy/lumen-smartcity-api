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
use App\Models\Tempatkuliner;

class TempatkulinerController extends Controller {

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request){
        $listData = Tempatkuliner::with('kuliner')->get();

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
        $listData = Tempatkuliner::with('kuliner')->findOrFail($id);

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
            'nama_tempat'       => 'required',
            'nama_pemilik'                => 'required',
            'lokasi'           => 'required',
            'latitude'       => 'required',
            'longitude'                => 'required',
            'image_url'           => 'required',   
            'waktu_buka'           => 'required',
            'waktu_tutup'           => 'required'    
        ]);

        $listData = new Tempatkuliner;
        $listData->nama_tempat  = $request->nama_tempat;
        $listData->nama_pemilik           = $request->nama_pemilik;
        $listData->lokasi      = $request->lokasi;
        $listData->latitude  = $request->latitude;
        $listData->longitude           = $request->longitude;
        $listData->image_url      = $request->image_url;
        $listData->waktu_buka      = $request->waktu_buka;
        $listData->waktu_tutup      = $request->waktu_tutup;

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
            'nama_tempat'       => 'required',
            'nama_pemilik'                => 'required',
            'lokasi'           => 'required',
            'latitude'       => 'required',
            'longitude'                => 'required',
            'image_url'           => 'required',   
            'waktu_buka'           => 'required',
            'waktu_tutup'           => 'required'  
        ]); 
 
        $listData = Tempatkuliner::findOrFail($id);
        $listData->nama_tempat  = $request->nama_tempat;
        $listData->nama_pemilik           = $request->nama_pemilik;
        $listData->lokasi      = $request->lokasi;
        $listData->latitude  = $request->latitude;
        $listData->longitude           = $request->longitude;
        $listData->image_url      = $request->image_url;
        $listData->waktu_buka      = $request->waktu_buka;
        $listData->waktu_tutup      = $request->waktu_tutup;
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
        $data = Tempatkuliner::findOrFail($id);
        $data->delete();

        $jsonData = [
            'data' => $data,
            'message' => 'Data berhasil dihapus.'
        ];

        return $this->response($jsonData, 'ok');
    }

}