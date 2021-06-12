<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Exports\BukuExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $buku = buku::leftJoin('rak_buku', 'buku.id', '=', 'rak_buku.id_buku')->get(['buku.*']);
        return view('buku0212', ['buku'=> $buku]);
    }

    public function export()
    {
        //export excel
        return Excel::download(new BukuExport, 'Data_1461900212.xlsx') ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('buku0212_tambah');
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
        buku::create([
            'id' => $request->id,
            'judul' => $request->judul,
            'tahun_terbit' => $request->tahun_terbit,
        ]);
        return redirect('buku0212');
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
        $buku = buku::find($id);
        return view('buku0212_edit', ['buku0212' => $buku]);
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
        $buku = buku::find($id);
        $buku->id = $request->id;
        $buku->judul = $request->judul;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->save();

        return redirect('buku0212');
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
        $buku = buku::find($id);
        $buku->delete();

        return redirect ('buku0212');
    }
}