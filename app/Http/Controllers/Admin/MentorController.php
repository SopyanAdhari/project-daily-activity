<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class MentorController extends Controller
{
    public function index()
    {   
        $mentors = User::where('role_id', 1)->get();

        $mentees = User::where('role_id', 2)->get();
        $divisionId = 0;

        foreach ($mentees as $mentee) {
            // Mengambil division_id untuk setiap objek User
            $divisionId = $mentee->division_id;
        }

        $menteeCount = $mentees->where('division_id', $divisionId)->count();

        return view('pages.admin.mentor.index', compact('mentors'))->with([
            'menteeCount' => $menteeCount
        ]);
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

        $mentors = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'division_id' => $request->division,
            'role_id' => $request->role,
            'isActive' => true
        ]);
        Alert::success('Success', 'Data Berhasil ditambahkan');
        return redirect()->route('mentor.index');
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


        if($request->isActive === "0"){
            $mentors->update([
                'isActive' => true,
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
                'role_id' => $request->role,
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
}
