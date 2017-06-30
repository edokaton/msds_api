<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Msds;

class MsdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $msds = Msds::all();

        return response()->json([
            'msds' => $msds
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($search)
    {
        $msds = Msds::where('nama', 'LIKE', '%'.$search.'%')
                    ->orWhere('content', 'LIKE', '%'.$search.'%')
                    ->get();

        if(count($msds) == 0){
            $msds = array(
                (object) array(
                    'id' => 1,
                    'symbol_url' => 'null.jpg',
                    'nama' => 'Data yang Anda cari tidak ada',
                    'content' =>  ''
                )
            );
        }



        return response()->json([
            'msds' => $msds
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function compare($first="", $second=""){
        $firstq = Msds::where('nama', 'LIKE', '%'.$first.'%')
                    ->first();

        $secondq = Msds::where('nama', 'LIKE', '%'.$second.'%')
                    ->first();

        if($first == ""){
            $firstq = (object) array(
                'id' => 1,
                'symbol_url' => 'null.jpg',
                'nama' => 'Pilih zat kimia',
                'content' => ''
            );
        }

        if($second == ""){
            $secondq = (object) array(
                'id' => 2,
                'symbol_url' => 'null.jpg',
                'nama' => 'Pilih zat kimia',
                'content' => ''
            );
        }

        return response()->json([
            'msds' => $firstq,
            'msdstwo' => $secondq
        ]);
    }
}
