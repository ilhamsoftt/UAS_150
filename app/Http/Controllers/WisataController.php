<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Wisata;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Wisata::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response=null;
        if(!$request->input('nama') || !$request->input('alamat') || !$request->input('gambar') || !$request->input('keterangan')){
            $response = ['response'=>"inputan nama, alamat, gambar dan keterangan harus diisi"];
            return response()->json($response);
        }
        $data = new Wisata;
        $data->nama=$request->nama;
        $data->slug=Str::slug($request->nama);
        $data->alamat=$request->alamat;
        $data->gambar=$request->gambar;
        $data->keterangan=$request->keterangan;
        $data->save();
        $response = ['response'=>"Data berhasil disimpan"];
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data=Wisata::find($id);
        if($data==null){
            $response = ['response'=>"Data tidak ditemukan"];
            return response()->json($response);  
        }
        return response()->json($data);     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$request->input('nama') || !$request->input('alamat') || !$request->input('gambar') || !$request->input('keterangan')){
            $response = ['response'=>"inputan nama, alamat, gambar dan keterangan harus diisi"];
            return response()->json($response);
        }
        $data=Wisata::find($id);
        if($data==null){
            $response = ['response'=>"Data tidak ditemukan"];
            return response()->json($response);  
        }
        $data->nama=$request->nama;
        $data->slug=Str::slug($request->nama);
        $data->alamat=$request->alamat;
        $data->gambar=$request->gambar;
        $data->keterangan=$request->keterangan;
        $data->save();
        $response = ['response'=>"Data berhasil dirubah"];
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Wisata::where('id',$id)->delete();
        if($data){
            $response = ['response'=>"Data berhasil dihapus"];
            return response()->json($response,404);
        }else {
            $response = ['response'=>"Gagal, data tidak ditemukan"];
            return response()->json($response,404);
        }
    }
}
