<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Mentee;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class MentorController extends Controller
{
    public function index()
    {   
        $mentors = User::WhereHas('role', function($query){
            $query->where('name', 'Mentor')->orWhere('name', 'mentor');
        })->get();


        return view('pages.admin.mentor.index', compact('mentors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = Division::get();
        return view('pages.admin.mentor.create')->with([
            'divisions' => $divisions
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

        $mentor = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'division_id' => $request->division,
            'is_active' => true
        ]);


        $role = Role::where('name', 'mentor')->OrWhere('name', 'Mentor')->first();
        if($role){
            $mentor->update([
                'role_id' => $role->id
            ]);
        }else{ 
            Alert::warning('Warning', 'Role Mentor tidak ditemukan');
            return redirect()->route('mentee.index');
        }

        
        Alert::success('Success', 'Data Berhasil ditambahkan');
        return redirect()->route('mentor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mentor = User::findOrFail($id);


        $mentees = User::WhereHas('role', function($query){
            $query->where('name', 'Mentee')->orWhere('name', 'mentee');
        })->get();

        $mentors = Mentee::where('mentor_id', $mentor->id)->get();


        return view('pages.admin.mentor.show', compact('mentor', 'mentees', 'mentors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mentor = User::findOrFail($id);
        $divisions = Division::get();
        return view('pages.admin.mentor.edit', compact('mentor'))->with([
            'divisions' => $divisions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mentors = User::findOrFail($id);


        if($request->is_active === "0"){
            $mentors->update([
                'is_active' => true,
            ]);
        }else{
            $request->validate([
                'name' => 'required',
                'email' =>"required|email|unique:users,email",
                // "password" => 'required',
                'confirmPassword' => "required_with:password|same:password"
            ]);

            $mentors->update([
                'name' => $request->name,
                'email' => $request->email,
                // 'password' => $request->password,
                'division_id' => $request->division,
            ]);
        }

        Alert::success('Success', 'Data Berhasil diubah');
        return redirect()->route('mentor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mentors = User::findOrFail($id);
        
        $mentors->delete();

        Alert::success('Success', 'Data Berhasil dihapus');
        return redirect()->route('mentee.index');
    }

    public function storeMentee($id, Request $request)
    {
        $mentor = User::findOrFail($id);
        
        $request->validate([
            'user_id' => 'required'
        ]);

        $mentee = Mentee::where('mentor_id', $mentor->id)->where('user_id', $request->user_id)->first();

        if($mentee){
            Alert::warning('Warning', 'Mentee sudah ada');
            return redirect()->route('mentor.show', $id);
        }
        
        $mentee = Mentee::create([
            'mentor_id' => $mentor->id,
            'user_id' => $request->user_id
        ]);

        Alert::success('Success', 'Data Berhasil ditambahkan');
        return redirect()->route('mentor.show', $id);
    }

    public function destroyMentee($id, $mentee_id)
    {
        $mentor = User::findOrFail($id);
        $mentee = Mentee::findOrFail($mentee_id);
        
        $mentee->delete();

        Alert::success('Success', 'Data Berhasil dihapus');
        return redirect()->route('mentor.show', $id);
    }
}
