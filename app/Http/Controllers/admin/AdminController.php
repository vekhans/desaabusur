<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use Image;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        if (Auth::User()->aturan== 'ijo'){

            $title = 'Data Admin'; 
            $data = User::all();
            return view('belakang.admin.home',['title' => $title, 'data' => $data]);
        }
        else{
            return view('layouts.temp.hak');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $admin = User::all();
            $params = [
                'title' => 'User App',
                'posisi'  => (['Tamu','Wartawan','Redaksi','Admin']),
            ];
            return view('belakang.admin.create')->with($params);
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        if (Auth::User()->aturan== 'ijo'){
            $this->validate($req, [
                'name' => 'required|max:100|unique:users',
                'email'    => 'required|email|unique:users,email|max:100',
                'password' => 'required|min:5|confirmed',
                'file'   => 'file'.('|image'), 
                'lengkap' => 'required|max:100|unique:users',
                'alamat'   => 'required', 'aturan'   => 'required', 
                'tlpn'   => 'required', 'posisi'   => 'required',  
                'deskripsi'   => 'required',
            ]);
            if ($req->hasFile('file')) {
                $dir = 'media/admin/';
                if(!file_exists($dir)){
                    mkdir($dir, 0777, true);
                }
                $file      = $req->file;
                $filename  = 'a'.uniqid();
                $extension = $file->getClientOriginalExtension();
                Image::make($file)->resize(200, 140)->save( public_path ($dir. $filename.'.'.$extension));
                $admin = new User;
                $admin->name = $req->name;
                $admin->email     = $req->email;
                $admin->password  = bcrypt($req->password); 
                $admin->file      = $dir.$filename.'.'.$extension;
                $admin->alamat = $req->alamat;
                $admin->tlpn = $req->tlpn;
                $admin->deskripsi = $req->deskripsi;
                $admin->posisi= $req->posisi;
                $admin->aturan= $req->aturan;
                $admin->lengkap= $req->lengkap;
                $admin->save();
                return redirect()->route('admin.index')->with('success', "User <strong>$admin->name</strong> sudah ditambahkan.");
            }else
            {
                $admin = new User;
                $admin->name = $req->name;
                $admin->email     = $req->email;
                $admin->password  = bcrypt($req->password);
                $admin->alamat = $req->alamat;
                $admin->tlpn = $req->tlpn;
                $admin->deskripsi = $req->deskripsi;
                $admin->posisi= $req->posisi;
                $admin->aturan= $req->aturan;
                $admin->lengkap= $req->lengkap;
                $admin->save(); 
            }
            return redirect()->route('admin.index')->with('success', "User <strong>$admin->name</strong> sudah ditambahkan.");
        }
        else{
            return view('layouts.temp.hak');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $admin = User::findOrFail($id);

                $params = [
                    'title' => 'Hapus User',
                    'admin' => $admin,
                ];

                return view('belakang.admin.delete')->with($params);
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
    public function profil($id)
    {
        try
        {
            $admin = User::findOrFail($id);

            $params = [
                'title' => 'Profil User',
                'admin' => $admin,
            ];

            return view('belakang.admin.show')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $admin = User::findOrFail($id);
                $params = [
                    'title' => 'Ubah User',
                    'admin' => $admin,
                    'posisi'  => (['Tamu','Wartawan','Redaksi','Admin']),
                ];
                return view('belakang.admin.edit')->with($params);
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
    public function eprof($id)
    {
        try
        {
            $admin = User::findOrFail($id);

            $params = [
                'title' => 'Ubah User',
                'admin' => $admin,
            ];

            return view('belakang.admin.eprof', ['id' => $admin->id])->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        } 
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
        try
        {
            $this->validate($request, [
                'name' => 'required|max:100|unique:users,name,'.$id,
                'lengkap' => 'required|max:100|unique:users,lengkap,'.$id,
                'email'    => 'required|email|unique:users,email,'.$id.'|max:100',
                'password' => 'required|min:5|confirmed',
                'file'   => 'file'.('|image'), 
                'aturan' => 'required',
                'posisi'   => 'required', 
            ]);
            $admin = User::findOrFail($id);
            if ($request->hasFile('file')) {
                $dir = 'media/admin/';
                if(!file_exists($dir)){
                    mkdir($dir, 0777, true);
                }
                // Upload
                $file      = $request->file;
                $filename  = 'a'.uniqid();
                $extension = $file->getClientOriginalExtension();
                Image::make($file)->resize(200, 140)->save( public_path ($dir. $filename.'.'.$extension));
                $admin->name = $request->name;
                $admin->email     = $request->email;
                $admin->password  = bcrypt($request->password); 
                $admin->file      = $dir.$filename.'.'.$extension;
                $admin->alamat = $request->alamat;
                $admin->tlpn = $request->tlpn;
                $admin->deskripsi = $request->deskripsi;
                $admin->lengkap= $request->lengkap;
                $admin->posisi= $request->posisi;
                $admin->aturan= $request->aturan;
                $admin->save();
                return redirect()->route('admin.index')->with('success', "User <strong>$admin->name</strong> sudah diubah.");
            }else
            {
                $admin->name = $request->name;
                $admin->email     = $request->email;
                $admin->password  = bcrypt($request->password);
                $admin->alamat = $request->alamat;
                $admin->tlpn = $request->tlpn;
                $admin->deskripsi = $request->deskripsi;
                $admin->lengkap= $request->lengkap;
                $admin->posisi= $request->posisi;
                $admin->aturan= $request->aturan;
                $admin->save(); 
            }
            return redirect()->route('admin.index')->with('success', "User <strong>$admin->name</strong> sudah diubah.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
    public function uprof(Request $request, $id)
    {
        try
        {
            $this->validate($request, [
                'name' => 'required|max:100|unique:users,name,'.$id, 
                'email'    => 'required|email|unique:users,email,'.$id.'|max:100',
                'password' => 'required|min:5|confirmed',
                'file'   => 'file'.('|image'), 
            ]);
            $admin = User::findOrFail($id);
            if ($request->hasFile('file')) {
                $dir = 'media/admin/';
                if(!file_exists($dir)){
                    mkdir($dir, 0777, true);
                }
                // Upload
                $file      = $request->file;
                $filename  = 'a'.uniqid();
                $extension = $file->getClientOriginalExtension();
                Image::make($file)->resize(200, 140)->save( public_path ($dir. $filename.'.'.$extension));
                $admin->name = $request->name;
                $admin->email     = $request->email;
                $admin->password  = bcrypt($request->password); 
                $admin->file      = $dir.$filename.'.'.$extension;
                $admin->alamat = $request->alamat;
                $admin->tlpn = $request->tlpn;
                $admin->deskripsi = $request->deskripsi;                
                $admin->save();
                return redirect()->route('aprof', ['id' => $admin->id])->with('success', "User <strong>$admin->name</strong> sudah diubah.");
            }else
            {
                $admin->name = $request->name;
                $admin->email     = $request->email;
                $admin->password  = bcrypt($request->password); 
                $admin->alamat = $request->alamat;
                $admin->tlpn = $request->tlpn;
                $admin->deskripsi = $request->deskripsi;
                $admin->save(); 
            }
            return redirect()->route('aprof', ['id' => $admin->id])->with('success', "User <strong>$admin->name</strong> sudah diubah.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $relationships = array();
                $admin = User::findOrFail($id);
                $should_delete = true;
                foreach($relationships as $r) {
                    if ($admin->$r->isNotEmpty()) {
                        $should_delete = false; 
                        return redirect()->route('admin.index')->with('error', "User <strong>$admin->name</strong> tidak bisa dihapus karna sudah dipakai pada data lainnya.");
                    }
                }
                if ($should_delete == true) {
                    $admin->delete();
                    return redirect()->route('admin.index')->with('success', "User <strong>$admin->name</strong> Berhasil dihapus (Arsip).");
                }
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
