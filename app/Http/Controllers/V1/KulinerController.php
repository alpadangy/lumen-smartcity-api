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
use App\Models\Kuliner;

class KulinerController extends Controller {

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request){
        $listData = Kuliner::with('jeniskuliner','tempatkuliner')->get();

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
        $listData = Kuliner::with('jeniskuliner','tempatkuliner')->findOrFail($id);

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
            'nama_kuliner'       => 'required',
            'image_url'                => 'required',
            'stok'           => 'required',
            'deskripsi'       => 'required',
            'status'                => 'required',
            'jeniskuliner_id'           => 'required',   
            'tempatkuliner_id'           => 'required'  
        ]);

        $listData = new Kuliner;
        $listData->nama_kuliner  = $request->nama_kuliner;
        $listData->image_url           = $request->image_url;
        $listData->stok      = $request->stok;
        $listData->deskripsi  = $request->deskripsi;
        $listData->status           = $request->status;
        $listData->jeniskuliner_id      = $request->jeniskuliner_id;
        $listData->tempatkuliner_id      = $request->tempatkuliner_id;

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
            'nama_kuliner'       => 'required',
            'image_url'                => 'required',
            'stok'           => 'required',
            'deskripsi'       => 'required',
            'status'                => 'required',
            'jeniskuliner_id'           => 'required',   
            'tempatkuliner_id'           => 'required'  
        ]); 
 
        $listData = Kuliner::findOrFail($id);
        $listData->nama_kuliner  = $request->nama_kuliner;
        $listData->image_url           = $request->image_url;
        $listData->stok      = $request->stok;
        $listData->deskripsi  = $request->deskripsi;
        $listData->status           = $request->status;
        $listData->jeniskuliner_id      = $request->jeniskuliner_id;
        $listData->tempatkuliner_id      = $request->tempatkuliner_id;
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
        $data = Kuliner::findOrFail($id);
        $data->delete();

        $jsonData = [
            'data' => $data,
            'message' => 'Data berhasil dihapus.'
        ];

        return $this->response($jsonData, 'ok');
    }

}