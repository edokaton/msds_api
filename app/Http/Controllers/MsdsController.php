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
        $msds = Msds::orderBy('nama', 'asc')->get();

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
        return view('create.msds');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'konten1' => 'required',
            'konten2' => 'required',
            'konten3' => 'required',
            'konten4' => 'required',
            'konten5' => 'required',
            'konten6' => 'required',
            'konten7' => 'required',
            'konten8' => 'required',
            'konten9' => 'required',
            'konten10' => 'required',
            'konten11' => 'required',
            'konten12' => 'required',
            'konten13' => 'required',
            'konten14' => 'required',
            'konten15' => 'required',
            'konten16' => 'required',
            // 'konten17' => 'required',
        ]);

        // $var1 = preg_replace( "/\r|\n/", '', $request->konten1 );
        // $var2 = preg_replace( "/\r|\n/", '', $request->konten2 );
        // $var3 = preg_replace( "/\r|\n/", '', $request->konten3 );
        // $var4 = preg_replace( "/\r|\n/", '', $request->konten4 );
        // $var5 = preg_replace( "/\r|\n/", '', $request->konten5 );
        // $var6 = preg_replace( "/\r|\n/", '', $request->konten6 );
        // $var7 = preg_replace( "/\r|\n/", '', $request->konten7 );
        // $var8 = preg_replace( "/\r|\n/", '', $request->konten8 );
        // $var9 = preg_replace( "/\r|\n/", '', $request->konten9 );
        // $var10 = preg_replace( "/\r|\n/", '', $request->konten10 );
        // $var11 = preg_replace( "/\r|\n/", '', $request->konten11 );
        // $var12 = preg_replace( "/\r|\n/", '', $request->konten12 );
        // $var13 = preg_replace( "/\r|\n/", '', $request->konten13 );
        // $var14 = preg_replace( "/\r|\n/", '', $request->konten14 );
        // $var15 = preg_replace( "/\r|\n/", '', $request->konten15 );
        // $var16 = preg_replace( "/\r|\n/", '', $request->konten16 );

        $konten = (object) array(
            'konten_1' => $request->konten1,
            'konten_2' => $request->konten2,
            'konten_3' => $request->konten3,
            'konten_4' => $request->konten4,
            'konten_5' => $request->konten5,
            'konten_6' => $request->konten6,
            'konten_7' => $request->konten7,
            'konten_8' => $request->konten8,
            'konten_9' => $request->konten9,
            'konten_10' => $request->konten10,
            'konten_11' => $request->konten11,
            'konten_12' => $request->konten12,
            'konten_13' => $request->konten13,
            'konten_14' => $request->konten14,
            'konten_15' => $request->konten15,
            'konten_16' => $request->konten16,
            // 'konten_17' => $request->konten16,
        );

        $msds = new Msds;

        $msds->nama = $request->nama;
        $msds->content = json_encode($konten);

        $msds->save();

        return back()->with('success', 'Data MSDS berhasil ditambahkan.');
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
                    ->orderBy('nama', 'asc')
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
        $msds = Msds::find($id);

        $konten = json_decode($msds->content);

        // dd($konten);

        return view('update.msds', ['msds' => $msds, 'konten' => $konten]);
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
        $this->validate($request, [
            'nama' => 'required',
            'konten1' => 'required',
            'konten2' => 'required',
            'konten3' => 'required',
            'konten4' => 'required',
            'konten5' => 'required',
            'konten6' => 'required',
            'konten7' => 'required',
            'konten8' => 'required',
            'konten9' => 'required',
            'konten10' => 'required',
            'konten11' => 'required',
            'konten12' => 'required',
            'konten13' => 'required',
            'konten14' => 'required',
            'konten15' => 'required',
            'konten16' => 'required',
            // 'konten17' => 'required',
        ]);

        // $var1 = preg_replace( "/\r|\n/", '', $request->konten1 );
        // $var2 = preg_replace( "/\r|\n/", '', $request->konten2 );
        // $var3 = preg_replace( "/\r|\n/", '', $request->konten3 );
        // $var4 = preg_replace( "/\r|\n/", '', $request->konten4 );
        // $var5 = preg_replace( "/\r|\n/", '', $request->konten5 );
        // $var6 = preg_replace( "/\r|\n/", '', $request->konten6 );
        // $var7 = preg_replace( "/\r|\n/", '', $request->konten7 );
        // $var8 = preg_replace( "/\r|\n/", '', $request->konten8 );
        // $var9 = preg_replace( "/\r|\n/", '', $request->konten9 );
        // $var10 = preg_replace( "/\r|\n/", '', $request->konten10 );
        // $var11 = preg_replace( "/\r|\n/", '', $request->konten11 );
        // $var12 = preg_replace( "/\r|\n/", '', $request->konten12 );
        // $var13 = preg_replace( "/\r|\n/", '', $request->konten13 );
        // $var14 = preg_replace( "/\r|\n/", '', $request->konten14 );
        // $var15 = preg_replace( "/\r|\n/", '', $request->konten15 );
        // $var16 = preg_replace( "/\r|\n/", '', $request->konten16 );

        $konten = (object) array(
            'konten_1' => $request->konten1,
            'konten_2' => $request->konten2,
            'konten_3' => $request->konten3,
            'konten_4' => $request->konten4,
            'konten_5' => $request->konten5,
            'konten_6' => $request->konten6,
            'konten_7' => $request->konten7,
            'konten_8' => $request->konten8,
            'konten_9' => $request->konten9,
            'konten_10' => $request->konten10,
            'konten_11' => $request->konten11,
            'konten_12' => $request->konten12,
            'konten_13' => $request->konten13,
            'konten_14' => $request->konten14,
            'konten_15' => $request->konten15,
            'konten_16' => $request->konten16,
            // 'konten_17' => $request->konten17,
        );

        $msds = Msds::find($id);

        $msds->nama = $request->nama;
        $msds->content = json_encode($konten);

        $msds->save();

        return back()->with('success', 'Data MSDS berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Msds::destroy($id);

        // $msds->delete();

        return back()->with('deleted', 'Data berhasil dihapus');
    }

    public function compare($first="", $second=""){
        $firstq = Msds::where('nama', 'LIKE', '%'.$first.'%')
                    ->first();

        $secondq = Msds::where('nama', 'LIKE', '%'.$second.'%')
                    ->first();

        if($first == "" || count($firstq) == 0){
            $firstq = (object) array(
                'id' => 1,
                'symbol_url' => 'null.jpg',
                'nama' => 'Pilih zat kimia',
                'content' => (object) array(
                    'konten_1' => ''
                )
            );
        }

        if($second == "" || count($secondq) == 0){
            $secondq = (object) array(
                'id' => 2,
                'symbol_url' => 'null.jpg',
                'nama' => 'Pilih zat kimia',
                'content' => (object) array(
                    'konten_1' => ''
                )
            );
        }

        return response()->json([
            'msds_name' => $firstq->nama,
            'msds_content' => $firstq->content,
            'msdstwo_name' => $secondq->nama,
            'msdstwo_content' => $secondq->content
        ]);
    }

    public function DetailZat($zat)
    {
        $msds = Msds::select('content')
                    ->where('nama', $zat)
                    ->first();

        return response()->json([
            'msds' => $msds->content
        ]);
    }
}
