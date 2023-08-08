<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\countries;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class AgentController extends Controller
{
    //
    public function list()
    {
         $agentlist = DB::table('users')->select('users.id','users.name','users.email','users.image','users.role','users.contact_number','users.country_code', 'users.joindate', 'countries.countryname') 
                                       ->join('countries','users.country_code','=','countries.id')
                                       ->get();
                                   //    dd($agentlist); exit();
        return view('agent.list',compact('agentlist'));
    }

    
    public function Index()
    {
        $countrylist = DB::table('countries')->get();
        return view('agent.index',compact('countrylist'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required'],
            'country_code' => ['required'],
            'birthday' => ['required'],
            'contact_number' => ['required'],
            'user_job_title' => ['required'],
            'joindate' => ['required'],
            'image' => ['required','image', 'mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'description' => ['required']
        ]);

        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('files'), $fileName);

        $user = User::create([
            'name' => $request->name
            ,'email' => $request->email
            ,'password' => Hash::make('fortune4@2023')
            ,'role' => $request->role
            ,'country_code' => $request->country_code
            ,'birthday' => $request->birthday
            ,'user_job_title' => $request->user_job_title
            ,'contact_number' => $request->contact_number
            ,'image' => $fileName
            ,'description' => $request->description
        ]);
        
        if(!event(new Registered($user))){
            return redirect()->back()->with("success", "Fail to add agent details try again");
         }
         return redirect()->back()->with("success", "Success add agent details");
    }

    public function delete($id){
        $deletedrecord =   DB::table('users')->where('id', $id)->delete();
        if(!$deletedrecord){
            return redirect()->back()->with("success", "Fail to delete agent details try again");
         }
         return redirect()->back()->with("success", "Success delete agent details");
    }

}
