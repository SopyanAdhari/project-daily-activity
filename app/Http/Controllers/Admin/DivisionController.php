<?php

namespace App\Http\Controllers\Admin;

use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DivisionController extends Controller
{
    public function index(){
        $divisions = Division::get();
        return view('pages.admin.division.index', compact('divisions'))->with([
            'title' => "division"
        ]);
    }

    public function create()
    {
        return view('pages.admin.division.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $division = Division::create([
            'name' => $request->name,
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect()->route('division.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $division = Division::findOrFail($id);

        return view('pages.admin.division.edit', compact('division'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $division = Division::findOrFail($id);

        $request->validate([
            'name' => 'required',
        ]);

        $division->update([
            'name' => $request->name,
        ]);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect()->route('division.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $division = Division::findOrFail($id);
        
        $division->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect()->route('division.index');
    }
}
                                