<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\propertydetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\properties;
use App\Models\owner;
use App\Models\randomgenerator;

class PropertydetailController extends Controller
{
    //
    public function index(){
       dd("testing data");
       // return view("propertydetails.index");
    }

     /**
     * Update the user's profile information.
     */
    public function add(Request $request): RedirectResponse
    {

        // dd($request);
        $request->validate([
            'Property_Name' => ['required', 'string', 'max:255'],
            'Property_Size' => ['required', 'integer'],
            'Property_Price' => ['required', 'integer'],
            'Property_Bedrooms' => ['required', 'integer'],
            'Property_Bath' => ['required', 'integer'],
            'Property_Category' => ['required', 'string'],
            'City'=> ['required', 'string'],
            'Location'=> ['required', 'string'],
            'Property_Images' => ['required'],
        ]);

        $allimages = null;

        if($request->hasFile('Property_Images'))
            {
            $allowedfileExtension=['jpeg','jpg','png'];
            
            $files = $request->file('Property_Images');
            
                foreach($files as $file)
                {
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $check=in_array($extension,$allowedfileExtension);
                    echo $check;
                    //dd($check);
                    if($check)
                    {
                        $fileName = time() . '.' .$request->Property_Name. $extension;
                        storeAs('public/build/assets/images', $fileName);
                       
                    }
                }
            }
            $allimages = rtrim($allimages, ", ");
           // $userinfo = auth()->user()->find($request->id); 

        $propertydetails = propertydetails::create([
            'Property_Name' => $request->Property_Name,
            'Property_Description' => $request->Property_Description,
            'Property_Size' => $request->Property_Size,
            'Property_Price' => $request->Property_Price,
            'Property_Bedrooms' => $request->Property_Bedrooms,
            'Property_Bath' => $request->Property_Bath,
            'Property_Category' => $request->Property_Category,
            'Property_Current_Status' => 'Active',
            'Property_Location' => $request->Location,
            'Property_Map_Link' => $request->Property_Map_Link,
            'Created_By' => auth()->user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'Property_Images' => $allimages
        ]);
        
        if(!$propertydetails->save()){
         
          // Session::flash("message", "Fail to add new property details try again!");
           return redirect()->back()->with("success", "Fail to add new property details try again");
        }
       
        $randomgeneratorsave = new randomgenerator;
        $randomgeneratorsave->active = "y"; $randomgeneratorsave->save();
       // Session::flash("message", "Success add property details do to list");
        return redirect()->back()->with("success", "Success add property details do to list");
        //return Redirect::route('property');
    }

    public function list()
    {
        $propertydetailslist = propertydetails::where('Property_Current_Status', 'Active')->get();
        //dd($propertydetailslist);
        return view('propertydetails.list',compact('propertydetailslist'));
    }

    public function delete($id){
        
       // $propertydetails = propertydetails::where('Id', $id)->get();

        $affected = propertydetails::where('Id', $id)
                    ->update(['Property_Current_Status' => "InActive", 'Updated_By' => auth()->user()->id, 'updated_at' => date('Y-m-d H:i:s')]);

        // $propertydetails->Property_Current_Status = "InActive";
        // $propertydetails->Updated_By = auth()->user()->id;
        // $propertydetails->updated_at = date('Y-m-d H:i:s');

         // dd($propertydetails);

        if(!$affected){
         
            // Session::flash("message", "Fail to add new property details try again!");
             return redirect()->back()->with("success", "Fail to delete property details try again");
          }
         
         // Session::flash("message", "Success add property details do to list");
          return redirect()->back()->with("success", "Successfully delete property details");

        //dd($propertydetailslist);
        return view('propertydetails.list',compact('propertydetailslist'));
    }

    public function view($id)
    {
        $propertydetails = propertydetails::where('id', $id)->get();
        return view('propertydetails.view',compact('propertydetails'));
    }
    
}
