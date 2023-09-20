<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class MenteeController extends Controller
{
    //
    public function index()
    {
        $mentees = User::where('role_id', 2)->get();
        
        return view('pages.admin.mentee.index', compact('mentees'));
    }

    /**  
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = Division::get();
        return view('pages.admin.mentee.create')->with([
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
            'is_active' => false
        ]);

        $role = Role::where('name', 'mentee')->OrWhere('name', 'Mentee')->first();
        if($role){
            $mentees->update([
                'role_id' => $role->id
            ]);
        }else{ 
            Alert::warning('Warning', 'Role Mentee tidak ditemukan');
            return redirect()->route('mentee.index');
        }

        Alert::success('Success', 'Data Berhasil ditambahkan');
        return redirect()->route('mentee.index');
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
        return view('pages.admin.mentee.edit', compact('mentee'))->with([
            'divisions' => $divisions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mentees = User::findOrFail($id);


        if($request->is_active === "0"){
            $mentees->update([
                'is_active' => true,
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
        

        Alert::success('Success', 'Data Berhasil diubah');
        return redirect()->route('mentee.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mentees = User::findOrFail($id);
        
        $mentees->delete();

        Alert::success('Success', 'Data Berhasil dihapus');
        return redirect()->route('mentee.index');
    }
}