<?php

namespace App\Http\Controllers;

use App\pengurus;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class PengurusController extends Controller
{
    protected $message = [
        'product.required' => 'Nama Product Tidak Boleh Kosong',
        'category.required' => 'Kategory Harus Pilih',
        'price.required' => 'Isi Harga Product'
    ];

    protected $rule = [
        'product' => 'required',
        'category_id' => 'required',
        'price' => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $base_url = url('/pengurus');
        return view('pengurus.index', compact('base_url'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['gambar_pengurus'] = null;
        $fillnames= md5($request->email);

        if ($request->hasFile('gambar_pengurus')) {
            $input['gambar_pengurus'] = '/upload/photo/' . str_slug($fillnames, '-') . '.' . $request->gambar_pengurus->getClientOriginalExtension();
            $request->gambar_pengurus->move(public_path('/upload/photo/'), $input['gambar_pengurus']);
        }

        pengurus::create($input);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengurus $pengurus
     * @return \Illuminate\Http\Response
     */
    public function show(pengurus $pengurus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengurus $pengurus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $category = pengurus::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Pengurus $pengurus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $contact = pengurus::findOrFail($id);


        $input['gambar_pengurus'] = $contact->gambar_pengurus;

        if ($request->hasFile('gambar_pengurus')){
            if (!$contact->gambar_pengurus == NULL){
                unlink(public_path($contact->gambar_pengurus));
            }
            $input['gambar_pengurus'] = '/upload/photo/'.str_slug($input['nama_pengurus'], '-').'.'.$request->gambar_pengurus->getClientOriginalExtension();
            $request->gambar_pengurus->move(public_path('/upload/photo/'), $input['gambar_pengurus']);
        }

        $contact->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Contact Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengurus $pengurus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengurus = pengurus::findOrFail($id);

        if ($pengurus->gambar_pengurus != NULL) {
            unlink(public_path($pengurus->gambar_pengurus));
        }
        pengurus::destroy($id);

        return response()->json([
            'success' => true
        ]);
    }

    public function apiData()
    {
        $pengurus = pengurus::all();

        return DataTables::of($pengurus)
            ->addColumn('show_photo', function ($pengurus) {
                if ($pengurus->gambar_pengurus == NULL) {
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="' . url($pengurus->gambar_pengurus) . '" alt="">';
            })
            ->addColumn('action', function ($pengurus) {

                return view('layouts.partials.__action', [
                    'id' => $pengurus->id,
                    'show' => 1,
                    'edit' => 1,
                    'delete' => 1,
                ]);
            })
            ->rawColumns(['show_photo', 'action'])->make(true);
    }
}
