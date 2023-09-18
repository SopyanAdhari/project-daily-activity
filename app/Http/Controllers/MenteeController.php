<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Division;
use Illuminate\Http\Request;

class MenteeController extends Controller
{
    //
    public function index()
    {
        $mentees = User::where('role_id', 2)->get();
        
        return view('pages.mentee.index', compact('mentees'));
    }

    /**  
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = Division::get();
        return view('pages.mentee.create')->with([
            "divisions" => $divisions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' =>"required|email|unique:users,email",
            "password" => 'required',
            'confirmPassword' => "required_with:password|same:password"
        ]);

        $mentees = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'division_id' => $request->division,
            'role_id' => $request->role,
            'isActive' => false
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
        $mentee = User::findOrFail($id);
        $divisions = Division::get();
        return view('pages.mentee.edit', compact('mentee'))->with([
            'divisions' => $divisions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mentees = User::findOrFail($id);


        if($request->isActive === "0"){
            $mentees->update([
                'isActive' => true,
            ]);
        }else{
            $request->validate([
                'name' => 'required',
                'email' =>"required|email|unique:users,email",
                // "password" => 'required',
                'confirmPassword' => "required_with:password|same:password"
            ]);

            $mentees->update([
                'name' => $request->name,
                'email' => $request->email,
                // 'password' => $request->password,
                'division_id' => $request->division,
                'role_id' => $request->role,
            ]);
        }
        

        return redirect()->back()->with('message', 'IT WORKS! UPDATE');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mentees = User::findOrFail($id);
        
        $mentees->delete();

        return redirect()->back()->with('message', 'ITU TERHAPUS');
    }
}