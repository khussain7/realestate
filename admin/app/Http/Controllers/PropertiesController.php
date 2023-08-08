<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\properties;
use App\Models\owner;
use App\Models\category;
use App\Models\subcategory;
use App\Models\randomgenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PropertiesController extends Controller
{
    public function index(){
           $Owners = owner::where('CurrentStatus', "active")->get();
           $dbcategory = category::where('CurrentStatus', "active")->get();
           $dbsubcategory = subcategory::where('CurrentStatus', "active")->get();
           $maxId =  randomgenerator::whereRaw('randomid = (select max(`randomid`) from randomgenerators)')->get(); //randomgenerator::where()->get();
           $seed = str_split('abcdefghijklmnopqrstuvwxyz'); // and any other characters
            shuffle($seed); // probably optional since array_is randomized; this may be redundant
            $rand = '';
            foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];

           
           
           return view("properties.index",compact('Owners', 'dbcategory', 'dbsubcategory', 'maxId', 'rand'));
       }

       public function add(Request $request){
        $request->validate([
            'PropertyName' => ['required', 'string', 'max:255'],
            'ReferanceNumber' => ['required', 'string', 'max:255'],
            'Category' => ['required', 'string'],
            'PropertyType' => ['required', 'string'],
         //   'PropertyOwnerId' => ['required', 'integer'],
         //   'MainSubCategoryId'  => ['required', 'integer'],
            'Area' => ['required'],
            'Price'=> ['required'],
            'Beds'=> ['required'],
            'Parking' => ['required'],
            'GoogleLink' => ['required'],
           // 'Balcony' => ['required'], 
           // 'Terrace' => ['required'],
           // 'CentralHeating' => ['required'],
           // 'ACType' => ['required'],
           // 'WasteDisposal' => ['required'],
           // 'Electricity' => ['required'],
            'Attachments' => ['required'],
            'AirportDistance' => ['required'],
            'ParkDistance' => ['required'],
            'HospitalDistance' => ['required'],
            'MedicalStore' => ['required'],
            'GroceryStoreCount' => ['required'],
            'ResturantsCount' => ['required'],
            'AddedAsBanner' => ['required']
        ]);

        $allimages = null;

        if($request->hasFile('Attachments'))
            {
            $allowedfileExtension=['jpeg','jpg','png'];
            
            $files = $request->file('Attachments');
            $i=1;
                foreach($files as $file)
                {
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $check=in_array($extension,$allowedfileExtension);
                   // echo $extension; public\storage\assets\images \storage\app\public\assets\images
                    //dd($check);
                    if($check)
                    {
                       
                        $fileName = time().$i.'.'. $extension;
                        $file->move(public_path('files'), $fileName);
                        $i +=1;
                      //  $file->store('/storage/app/assets/images', $fileName);
                       // dd($file->move('/public/storage/assets/images', $fileName));
                        $allimages .= $fileName.',';
                       
                    }
                }
            }
            $allimages = rtrim($allimages, ", ");
            // dd( $allimages);
           // $userinfo = auth()->user()->find($request->id); 
           $propertiescreate = new properties;
           $propertiescreate->PropertyName = $request->PropertyName;
           $propertiescreate->ReferanceNumber= $request->ReferanceNumber;
           $propertiescreate->Category= $request->Category;
           $propertiescreate->PropertyType= $request->PropertyType;
           $propertiescreate->PropertyOwnerId= "0";//$request->PropertyOwnerId;
           $propertiescreate->Area= $request->Area;
           $propertiescreate->Price= $request->Price;
           $propertiescreate->CurrentStatus= 'Active';
           $propertiescreate->Beds= $request->Beds;
           $propertiescreate->Bath= $request->Bath;
           $propertiescreate->City= $request->City;
           $propertiescreate->CreatedBy= auth()->user()->id;
           $propertiescreate->CreateOn= date('Y-m-d H:i:s');
           $propertiescreate->Attachments= $allimages;
           $propertiescreate->Parking= $request->Parking ?? null;
           $propertiescreate->GoogleLink= $request->GoogleLink ?? null;
           $propertiescreate->Balcony= $request->Balcony ?? null;
           $propertiescreate->CentralHeating= $request->CentralHeating ?? null;
           $propertiescreate->Terrace= $request->Terrace ?? null;
           $propertiescreate->ACType= $request->ACType ?? null;
           $propertiescreate->WasteDisposal= $request->WasteDisposal ?? null;
           $propertiescreate->Electricity= $request->Electricity ?? null;
           $propertiescreate->AirportDistance= $request->AirportDistance;
           $propertiescreate->ParkDistance= $request->ParkDistance;
           $propertiescreate->HospitalDistance= $request->HospitalDistance;
           $propertiescreate->MedicalStore= $request->MedicalStore;
           $propertiescreate->GroceryStoreCount= $request->GroceryStoreCount;
           $propertiescreate->ResturantsCount= $request->ResturantsCount;
           $propertiescreate->AddedAsBanner = 'No';
           $propertiescreate->created_at= date('Y-m-d H:i:s'); 
           $propertiescreate->MainSubCategoryId = $request->PropertyTypeSub;
           $propertiescreate->MainSubCategory = $request->PropertyTypeSubTxt;

          
        // $propertydetails = properties::create([
        //     'PropertyName' => $request->PropertyName,
        //     'ReferanceNumber' => $request->ReferanceNumber,
        //     'Category' => $request->Category,
        //     'PropertyType' => $request->PropertyType,
        //     'PropertyOwnerId' => $request->PropertyOwnerId,
        //     'Area' => $request->Area,
        //     'Price' => $request->Price,
        //     'CurrentStatus' => 'Active',
        //     'Beds' => $request->Beds,
        //     'Bath' => $request->Bath,
        //     'CreatedBy' => auth()->user()->id,
        //     'CreateOn' => date('Y-m-d H:i:s'),
        //     'Attachments' => $allimages,
        //     'Parking' => $request->Parking ?? null,
        //     'GoogleLink' => $request->GoogleLink ?? null,
        //     'Balcony' => $request->Balcony ?? null,
        //     'CentralHeating' => $request->CentralHeating ?? null,
        //     'Terrace' => $request->Terrace ?? null,
        //     'ACType' => $request->ACType ?? null,
        //     'WasteDisposal' => $request->WasteDisposal ?? null,
        //     'Electricity' => $request->Electricity ?? null,
        //     'Attachments' => $request->Attachments,
        //     'AirportDistance' => $request->AirportDistance,
        //     'ParkDistance' => $request->ParkDistance,
        //     'HospitalDistance' => $request->HospitalDistance,
        //     'MedicalStore' => $request->MedicalStore,
        //     'GroceryStoreCount' => $request->GroceryStoreCount,
        //     'ResturantsCount' => $request->ResturantsCount,
        //     'created_at' => date('Y-m-d H:i:s')
        // ]);
       //  dd($propertiescreate);
        if(!$propertiescreate->save()){
          // Session::flash("message", "Fail to add new property details try again!");
           return redirect()->back()->with("success", "Fail to add new property details try again");
        }
       // Session::flash("message", "Success add property details do to list");
       $randomgeneratorsave = new randomgenerator;
       $randomgeneratorsave->active = "y"; $randomgeneratorsave->save();
        return redirect()->back()->with("success", "Success add property details do to list");
       }

       public function list()
       {
           $propertydetailslist = properties::where('CurrentStatus', 'Active')->get();
           return view('properties.list',compact('propertydetailslist'));
       }

       public function view($id)
       {
           $Owners = owner::where('CurrentStatus', "active")->get();
           $propertydetails = properties::where('PropertyId', $id)->first();
           $currentowner = owner::where('OwnerId', $propertydetails->PropertyOwnerId)->first();
           $dbcategory = category::where('CurrentStatus', "active")->get();
           $dbsubcategory = subcategory::where('CurrentStatus', "active")->get();
           return view('properties.view',compact('propertydetails', 'Owners', 'currentowner', 'dbcategory', 'dbsubcategory'));
       }

       public function delete($id)
       {
        $updateDetails = [
            'CurrentStatus' => 'InActive',
            'UpdatedOn' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'UpdateBy' => auth()->user()->id
        ];
    
           $propertiesudpate = properties::where('PropertyId', $id)->update($updateDetails);

          if(!$propertiesudpate){
            // Session::flash("message", "Fail to add new property details try again!");
             return redirect()->back()->with("success", "Fail to delete property details try again");
          }
         
         // Session::flash("message", "Success add property details do to list");
          return redirect()->back()->with("success", "Success deleted property details go to list");
       }
       
}
