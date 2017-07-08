<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengguna;
use Validator;
use Illuminate\Validation\Rule;
// use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = Pengguna::all();

        return view('read.pengguna', ['pengguna' => $pengguna]);
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
        $messages = [
            'username.required' => 'Username tidak boleh kosong!',
            'username.unique' => 'Username '. $request->username .' sudah dipakai user lain!',
            'password.required' => 'Password pengguna tidak boleh kosong!',
            'tipe.required' => 'Password pengguna tidak boleh kosong!',
        ];

        Validator::make($request->all(), [
            'username' => [
                'required', 'unique:pengguna,username', 'alpha_dash',
            ],
            'password' => 'required',
            'tipe' => 'required',
        ], $messages)->validate();

        $update = new Pengguna;

        $update->username = $request->username;
        $update->password = bcrypt($request->password);
        $update->api_token = str_random(100);
        $update->tipe = $request->tipe;

        $update->save();

        return back()->with('created', 'Data Pengguna '. $request->username .' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $messages = [
            'username.required' => 'Username tidak boleh kosong!',
            'username.unique' => 'Username '. $request->username .' sudah dipakai user lain!',
            'tipe.required' => 'tipe pengguna tidak boleh kosong!',
        ];

        Validator::make($request->all(), [
            'username' => [
                'required',
                Rule::unique('pengguna')->ignore($id),
                'alpha_dash',
            ],
            'tipe' => 'required',
        ], $messages)->validate();        

        if(empty($request->password)){
            $update = Pengguna::find($id);

            $update->username = $request->username;
            $update->tipe = $request->tipe;

            $update->save();
        }else{
            $update = Pengguna::find($id);

            $update->username = $request->username;
            $update->password = bcrypt($request->password);
            $update->tipe = $request->tipe;

            $update->save();
        }

        return back()->with('updated', 'Data Pengguna '. $request->username .' berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengguna::destroy($id);

        return back()->with('deleted', 'Data Pengguna berhasil dihapus');
    }
}
