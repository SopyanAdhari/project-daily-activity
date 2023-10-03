<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index(){
        $users = User::limit('5')->orderByDesc('created_at')->get();

        $total_mentee = User::WhereHas('role', function($query){
            $query->where('name', 'Mentee')->orWhere('name', 'mentee');
        })->count();
        $total_mentor = User::WhereHas('role', function($query){
            $query->where('name', 'Mentor')->orWhere('name', 'mentor');
        })->count();

        // untuk Chart
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $mentorData = [];
        $menteeData = [];

        foreach($months as $index => $month){
            $mentor = User::WhereHas('role', function($query){
                $query->where('name', 'Mentor')->orWhere('name', 'mentor');
            })->whereMonth('created_at', $index+1)->count();
            $mentee = User::WhereHas('role', function($query){
                $query->where('name', 'Mentee')->orWhere('name', 'mentee');
            })->whereMonth('created_at', $index+1)->count();

            array_push($mentorData, $mentor);
            array_push($menteeData, $mentee);
        }

        return view('pages.admin.dashboard.index', compact('users', 'total_mentee', 'total_mentor', 'months', 'mentorData', 'menteeData'));
    }
}
