<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\models\Profil;
class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        if (Auth::User()->aturan== 'ijo'){
           $title = 'Data Profil';
           $data = Profil::OrderBy ('updated_at', 'desc')->get();
           return view('belakang.profil.home',['title'=>$title,'data' => $data]);
       }
        else{
            return view('layouts.temp.hak');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $profils = Profil::findOrFail($id);
                $params = [
                    'title' => 'Ubah Data Profil',
                    'profils' => $profils,
                ];

                return view('belakang.profil.edit')->with($params);
            }
            catch (ModelNotFoundException $ex) 
            {
                if ($ex instanceof ModelNotFoundException)
                {
                    return response()->view('errors.'.'404');
                }
            }
        }
        else{
            return view('layouts.temp.hak');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $this->validate($request, [
                    'nama' => 'required|unique:profils,nama,'.$id,
                    'deskripsi' => 'required',
                    'email'    => 'required|email',
                    'tlpn' => 'required',
                    'alamat' => 'required',
                    'lt' => 'required',
                    'lg' => 'required',
                ]);
                $profils = Profil::findOrFail($id);
                $profils->nama = $request->input('nama');
                $profils->lt = $request->input('lt');
                $profils->lg = $request->input('lg');
                $profils->tlpn = $request->input('tlpn');
                $profils->email = $request->input('email');
                $profils->alamat = $request->input('alamat');
                $profils->deskripsi = $request->input('deskripsi');
                $profils->keterangan = $request->input('keterangan');
                $profils->id_admin = $request->User()->id;
                $profils->save();
                return redirect()->route('profil.index')->with('success', "Profil <strong> $profils->nama</strong> berhasil diubah.");
            }
            catch (ModelNotFoundException $ex) 
            {
                if ($ex instanceof ModelNotFoundException)
                {
                    return response()->view('errors.'.'404');
                }
            }
        }
        else{
            return view('layouts.temp.hak');
        }
    }
}