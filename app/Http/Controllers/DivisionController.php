<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index(){
        $divisions = Division::get();
        return view('pages.division.index', compact('divisions'))->with([
            'title' => "division"
        ]);
    }
    public function create()
    {
        return view('pages.division.create');
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

        
        return redirect()->back()->with('message', 'IT WORKS!');
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

        return view('pages.division.edit', compact('division'));
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

        return redirect()->back()->with('message', 'IT WORKS! UPDATE');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $division = Division::findOrFail($id);
        
        $division->delete();

        return redirect()->back()->with('message', 'ITU TERHAPUS');
    }
}
