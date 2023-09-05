<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\properties;
use App\Models\propertydetails;
use App\Models\propertyimages;
use App\Models\User;
use App\Models\pages;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        $empList = DB::table('users')->select('users.id','users.name','users.email','users.image', 'users.description'
           ,'users.user_job_title' , 'users.role','users.contact_number','users.country_code', 'users.joindate', 'countries.countryname') 
        ->join('countries','users.country_code','=','countries.id')
        ->where('users.user_job_title','!=','Developer')
        ->get();
        return view('employees',compact('empList'));
    }

    public function aboutus()
    {
        $aboutus = pages::where('PageId', "1")->get();
        return view('about',compact('aboutus'));
    }

    public function companyprofile()
    {
        $companyprofile = pages::where('PageId', "2")->first();
        return view('companyprofile',compact('companyprofile'));
    }
}
