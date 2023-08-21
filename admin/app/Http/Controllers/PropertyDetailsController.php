<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\owner;
use App\Models\category;
use App\Models\User;
use App\Models\subcategory;
use App\Models\randomgenerator;
use App\Models\propertydetails;
use App\Models\propertyAmenities;
use App\Models\propertyimages;

class PropertyDetailsController extends Controller
{
    //
    public function index(){
        $agentlist = User::get();
        $dbcategory = category::where('CurrentStatus', "active")->get();
        $dbsubcategory = subcategory::where('CurrentStatus', "active")->get();
        $maxId =  randomgenerator::whereRaw('randomid = (select max(`randomid`) from randomgenerators)')->get(); //randomgenerator::where()->get();
        $seed = str_split('abcdefghijklmnopqrstuvwxyz'); // and any other characters
         shuffle($seed); // probably optional since array_is randomized; this may be redundant
         $rand = '';
         foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];

        return view('propertydetails.index',compact('dbcategory', 'dbsubcategory', 'maxId', 'rand', 'agentlist'));
     }

     public function addproperty(Request $request){

        $request->validate(
            ['PermitNumber' => 'required',
              'Category' => 'required|not_in:0',
              'SubCategory' => 'required|not_in:0',
              'Price' => 'required|numeric|not_in:0',
              'Area' => 'required|numeric|not_in:0',
              'Address'  => 'required',
              'Description' => 'required'
            ],
            [
                'PermitNumber.required' => 'Permit Number is required.',
                'Category.not_in' => 'Category is required.',
                'SubCategory.not_in' => 'Sub-Category is required.',
                'Price.required' => 'Price is required.',
                'Price.numeric' => 'Price should be numeric.',
                'Price.not_in' => 'Price cannot be zero.',
                'Area.required' => 'Price is required.',
                'Area.numeric' => 'Price should be numeric.',
                'Area.not_in' => 'Price cannot be zero.',
                'Address.required' => 'Address is required.',
                'Description.required' => 'Description is required.'
            ]);

            $propertiescreate = new propertydetails;
            $propertiescreate->ReferanceNumber = $request->ReferanceNumber;
            $propertiescreate->PermitNumber = $request->PermitNumber;
            $propertiescreate->Category = $request->Category;
            $propertiescreate->SubCategory = $request->SubCategory;
            $propertiescreate->Price = $request->Price;
            $propertiescreate->Area = $request->Area;
            $propertiescreate->Bedroorms = $request->Bedroorms;
            $propertiescreate->Bathrooms = $request->Bathrooms;
            $propertiescreate->Purpose = $request->Purpose;
            $propertiescreate->VacatingNoticePeriod = $request->VacatingNoticePeriod;
            $propertiescreate->Rent = $request->Rent;
            $propertiescreate->Furnished = $request->Furnished;
            $propertiescreate->Purpose = $request->Purpose;
            $propertiescreate->AgentId = $request->Agent;
            $propertiescreate->City = $request->City;
            $propertiescreate->Address = $request->Address;
            $propertiescreate->Description = $request->Description;
            $propertiescreate->MaintenanceFee = $request->MaintenanceFeeFor;
            $propertiescreate->LocationGoogleLink = "google link";
            $propertiescreate->CurrentStatus = "Amenities";
            $propertiescreate->AddedAsBanner = "No";
            $propertiescreate->CreatedBy = auth()->user()->id;
            $propertiescreate->CreateOn = date('Y-m-d H:i:s');

            // 
            
            if(!$propertiescreate->save()){
                 return redirect()->back()->with("success", "Fail to add new property details try again");
              }

              $randomgeneratorsave = new randomgenerator;
              $randomgeneratorsave->active = "y"; $randomgeneratorsave->save();
              
            $propertiesdata =  propertydetails::select('PropertyId')->where('ReferanceNumber', $request->ReferanceNumber)->get();

             return Redirect::to('propertyr/amenities/'.$propertiesdata[0]['PropertyId'])->with(['success' => 'Success add property details. Add amenities to property']);
            //return redirect()->back()->with("success", "Success add property details do to list");
     }

     public function addaminites($id){
        $propertyamenities = propertyamenities::where('PropertyId', $id)->first();
        $insertorupdate = ($propertyamenities == null) ? "insert" : "update";
        return view('propertydetails.aminites',compact('id' , 'propertyamenities' , 'insertorupdate'));
     }

     public function saveaminites(Request $request){
        $request->validate(
            ['PropertyId' => 'required'
            ],
            [
                'PropertyId.required' => 'Property details are not selected from list!'
            ]);
        if($request->insertorupdate == "insert")
        {    
            $propertyamenitiescreate = new propertyamenities;
            $propertyamenitiescreate->PropertyId = $request->PropertyId;
            $propertyamenitiescreate->BarbequeArea = $request->BarbequeArea;
            $propertyamenitiescreate->DayCareCenter = $request->DayCareCenter;
            $propertyamenitiescreate->KidsPlayArea = $request->KidsPlayArea;
            $propertyamenitiescreate->LawnOrGarden = $request->LawnOrGarden;
            $propertyamenitiescreate->CafeteriaOrCanteen = $request->CafeteriaOrCanteen;
            $propertyamenitiescreate->HealthAndFitness = $request->HealthAndFitness;
            $propertyamenitiescreate->GymOrHealthClub = $request->GymOrHealthClub;
            $propertyamenitiescreate->Jacuzzi = $request->Jacuzzi;
            $propertyamenitiescreate->Sauna = $request->Sauna;
            $propertyamenitiescreate->SteamRoom = $request->SteamRoom;
            $propertyamenitiescreate->SwimmingPool = $request->SwimmingPool;
            $propertyamenitiescreate->FacilitiesForDisabled = $request->FacilitiesForDisabled;
            $propertyamenitiescreate->LaundryRoom = $request->LaundryRoom;
            $propertyamenitiescreate->LaundryFacility = $request->LaundryFacility;
            $propertyamenitiescreate->SharedKitchen = $request->SharedKitchen;
            $propertyamenitiescreate->CompletionYear = $request->CompletionYear;
            $propertyamenitiescreate->BalconyOrTerrace = $request->BalconyOrTerrace;
            $propertyamenitiescreate->LobbyInBuilding = $request->LobbyInBuilding;
            $propertyamenitiescreate->Flooring = $request->Flooring;
            $propertyamenitiescreate->ElevatorsInBuilding = $request->ElevatorsInBuilding;
            $propertyamenitiescreate->ServiceElevators = $request->ServiceElevators;
            $propertyamenitiescreate->PrayerRoom = $request->PrayerRoom;
            $propertyamenitiescreate->ReceptionOrWaitingRoom = $request->ReceptionOrWaitingRoom;
            $propertyamenitiescreate->BusinessCenter = $request->BusinessCenter;
            $propertyamenitiescreate->SecurityStaff = $request->SecurityStaff;
            $propertyamenitiescreate->CCTVSecurity = $request->CCTVSecurity;
            $propertyamenitiescreate->View = $request->View;
            $propertyamenitiescreate->Floor = $request->Floor;
            $propertyamenitiescreate->OtherMainFeatures = $request->OtherMainFeatures;
            $propertyamenitiescreate->Freehold = $request->Freehold;
            $propertyamenitiescreate->PetPolicy = $request->PetPolicy;
            $propertyamenitiescreate->OtherRooms = $request->OtherRooms;
            $propertyamenitiescreate->ATMFacility = $request->ATMFacility;
            $propertyamenitiescreate->OtherFacilities = $request->OtherFacilities;
            $propertyamenitiescreate->LandArea = $request->LandArea;
            $propertyamenitiescreate->NumberOfBathrooms = $request->NumberOfBathrooms;
            $propertyamenitiescreate->NumberOfBedrooms = $request->NumberOfBedrooms;
            $propertyamenitiescreate->NearbySchools = $request->NearbySchools;
            $propertyamenitiescreate->NearbyHospitals = $request->NearbyHospitals;
            $propertyamenitiescreate->NearbyShoppingMalls = $request->NearbyShoppingMalls;
            $propertyamenitiescreate->DistanceFromAirport = $request->DistanceFromAirport;
            $propertyamenitiescreate->NearbyPublicTransport = $request->NearbyPublicTransport;
            $propertyamenitiescreate->OtherNearbyPlaces = $request->OtherNearbyPlaces;
            $propertyamenitiescreate->BroadbandInternet = $request->BroadbandInternet;
            $propertyamenitiescreate->SatelliteCableTV = $request->SatelliteCableTV;
            $propertyamenitiescreate->Intercom = $request->Intercom;
            $propertyamenitiescreate->Features = $request->Features;
            $propertyamenitiescreate->DoubleGlazedWindows = $request->DoubleGlazedWindows;
            $propertyamenitiescreate->CentrallyAirConditioned = $request->CentrallyAirConditioned;
            $propertyamenitiescreate->CentralHeating = $request->CentralHeating;
            $propertyamenitiescreate->ElectricityBackup = $request->ElectricityBackup;
            $propertyamenitiescreate->Furnished = $request->Furnished;
            $propertyamenitiescreate->ParkingSpaces = $request->ParkingSpaces;
            $propertyamenitiescreate->StorageAreas = $request->StorageAreas;
            $propertyamenitiescreate->StudyRoom = $request->StudyRoom;
            $propertyamenitiescreate->WasteDisposal = $request->WasteDisposal;
            $propertyamenitiescreate->MaintenanceStaff = $request->MaintenanceStaff;
            $propertyamenitiescreate->CleaningServices = $request->CleaningServices;
            $propertyamenitiescreate->CreatedBy = auth()->user()->id;
            $propertyamenitiescreate->CreateOn =  date('Y-m-d H:i:s');
            $propertyamenitiescreate->CurrentStatus ="Imageupload";

            if(!$propertyamenitiescreate->save()){

                $updatePropertyDetails = [
                    'CurrentStatus' => 'Imageuploads'
                    ,'UpdatedOn' =>  date('Y-m-d H:i:s')
                    ,'updated_at' => date('Y-m-d H:i:s')
                    ,'UpdateBy' => auth()->user()->id
                ];
                
                $propretyUpdates = propertydetails::where('PropertyId', $request->PropertyId)->update($updatePropertyDetails);    

                return redirect()->back()->with("success", "Fail to add amenities try again");
            }
            return Redirect::to('propertyr/uploadimages/'.$request->PropertyId)->with(['success' => 'Success add amenities to property!']);
        }
        else
        {
            // $propertyamenities = propertyamenities::where('PropertyId', $request->PropertyId)->first();
            $propertyamenitiesupdate = [
                 'BarbequeArea' => $request->BarbequeArea
                ,'DayCareCenter' => $request->DayCareCenter
                ,'KidsPlayArea' => $request->KidsPlayArea
                ,'LawnOrGarden' => $request->LawnOrGarden
                ,'CafeteriaOrCanteen' => $request->CafeteriaOrCanteen
                ,'HealthAndFitness' => $request->HealthAndFitness
                ,'GymOrHealthClub' => $request->GymOrHealthClub
                ,'Jacuzzi' => $request->Jacuzzi
                ,'Sauna' => $request->Sauna
                ,'SteamRoom' => $request->SteamRoom
                ,'SwimmingPool' => $request->SwimmingPool
                ,'FacilitiesForDisabled' => $request->FacilitiesForDisabled
                ,'LaundryRoom' => $request->LaundryRoom
                ,'LaundryFacility' => $request->LaundryFacility
                ,'SharedKitchen' => $request->SharedKitchen
                ,'CompletionYear' => $request->CompletionYear
                ,'BalconyOrTerrace' => $request->BalconyOrTerrace
                ,'LobbyInBuilding' => $request->LobbyInBuilding
                ,'Flooring' => $request->Flooring
                ,'ElevatorsInBuilding' => $request->ElevatorsInBuilding
                ,'ServiceElevators' => $request->ServiceElevators
                ,'PrayerRoom' => $request->PrayerRoom
                ,'ReceptionOrWaitingRoom' => $request->ReceptionOrWaitingRoom
                ,'BusinessCenter' => $request->BusinessCenter
                ,'SecurityStaff' => $request->SecurityStaff
                ,'CCTVSecurity' => $request->CCTVSecurity
                ,'View' => $request->View
                ,'Floor' => $request->Floor
                ,'OtherMainFeatures' => $request->OtherMainFeatures
                ,'Freehold' => $request->Freehold
                ,'PetPolicy' => $request->PetPolicy
                ,'OtherRooms' => $request->OtherRooms
                ,'ATMFacility' => $request->ATMFacility
                ,'OtherFacilities' => $request->OtherFacilities
                ,'LandArea' => $request->LandArea
                ,'NumberOfBathrooms' => $request->NumberOfBathrooms
                ,'NumberOfBedrooms' => $request->NumberOfBedrooms
                ,'NearbySchools' => $request->NearbySchools
                ,'NearbyHospitals' => $request->NearbyHospitals
                ,'NearbyShoppingMalls' => $request->NearbyShoppingMalls
                ,'DistanceFromAirport' => $request->DistanceFromAirport
                ,'NearbyPublicTransport' => $request->NearbyPublicTransport
                ,'OtherNearbyPlaces' => $request->OtherNearbyPlaces
                ,'BroadbandInternet' => $request->BroadbandInternet
                ,'SatelliteCableTV' => $request->SatelliteCableTV
                ,'Intercom' => $request->Intercom
                ,'Features' => $request->Features
                ,'DoubleGlazedWindows' => $request->DoubleGlazedWindows
                ,'CentrallyAirConditioned' => $request->CentrallyAirConditioned
                ,'CentralHeating' => $request->CentralHeating
                ,'ElectricityBackup' => $request->ElectricityBackup
                ,'Furnished' => $request->Furnished
                ,'ParkingSpaces' => $request->ParkingSpaces
                ,'StorageAreas' => $request->StorageAreas
                ,'StudyRoom' => $request->StudyRoom
                ,'WasteDisposal' => $request->WasteDisposal
                ,'MaintenanceStaff' => $request->MaintenanceStaff
                 ,'UpdatedOn' =>  date('Y-m-d H:i:s')
                 ,'updated_at' => date('Y-m-d H:i:s')
                ,'UpdateBy' => auth()->user()->id
            ];
            $updatedPropertyDetails = propertyamenities::where('PropertyId', $request->PropertyId)->update($propertyamenitiesupdate);
            if($updatedPropertyDetails > 0)
            {
               return Redirect::to('propertyr/uploadimages/'.$request->PropertyId)->with(['success' => 'Successfully updated property amenities details!']);
            }
            return Redirect::to('propertyr/amenities/'.$request->PropertyId)->with(['success' => 'Fail to updated property amenities details try again!']);
        }
     }

     public function uploadimages($id){
        return view('propertydetails.upload',compact('id'));
     }

     
     public function saveimages(Request $request){

        $request->validate([
            'PropertyId' => ['required'],
            'files' => ['required'],
        ],
        [
            'PropertyId.required' => 'Property details are not selected from list!',
            'files.required' => 'Choose images for upload'
        ]);
       
        $bannerImgName = null;
        if($request->bannerindex != 0)
        {
            $bannerImgName = $request->bannerindex;
        }

            $allowedfileExtension=["jpg", "jpeg", "bmp", "gif", "png"];   
            $files = $request->file('files');
            $i=1;
           
                foreach($files as $file)
                {
                    $extension = $file->getClientOriginalExtension();
                    $check=in_array($extension,$allowedfileExtension);
                    if($check)
                    {
                       
                        $fileName = time().$i.'.'. $extension;
                        $file->move(public_path('files'), $fileName);
                        $i +=1;

                        $propertyimages = new propertyimages;
                        $propertyimages->PropertyId  = $request->PropertyId;
                        $propertyimages->ImageName = $fileName;
                        if($request->bannerindex == 0 && $i == 1)
                        {
                            $propertyimages->IsBannner  = "Yes";
                        }
                        else{
                            if($file->getClientOriginalName() == $bannerImgName)
                            {
                                $propertyimages->IsBannner  = "Yes";
                            }
                            else{
                                $propertyimages->IsBannner  = "No";
                            }
                        }
                        // $propertyimages->IsBannner  = "No";
                        $propertyimages->CreatedBy = auth()->user()->id;
                        $propertyimages->CreateOn =  date('Y-m-d H:i:s');
                        $propertyimages->CurrentStatus ="Imageupload";
                        $propertyimages->save();
                    }
                }
               
                // if(count($files)+1 != $i){
                //      return redirect()->back()->with("success", "Fail to upload images try again!");
                //   }

                $updatePropertyDetails = [
                    'CurrentStatus' => 'Active'
                    ,'UpdatedOn' =>  date('Y-m-d H:i:s')
                    ,'updated_at' => date('Y-m-d H:i:s')
                    ,'UpdateBy' => auth()->user()->id
                 ];
                
                 $propretyUpdates = propertydetails::where('PropertyId', $request->PropertyId)->update($updatePropertyDetails);   

                  return redirect()->back()->with("success", "Success uploaded images to the property back to list!");
     }

     public function list(){
        $propertylist = propertydetails::join('subcategories', 'subcategories.SubCategoryId', '=', 'propertydetails.SubCategory')
                                        ->join('categorys','categorys.CategoryId','=','propertydetails.Category')
                                        ->where('propertydetails.CurrentStatus', 'Active')
                                        ->get(['propertydetails.PropertyId','propertydetails.ReferanceNumber', 'propertydetails.City', 'propertydetails.Price', 'propertydetails.Area', 
                                                'propertydetails.Bedroorms', 'propertydetails.Bathrooms', 'propertydetails.Purpose'
                                                , 'subcategories.SubCategoryName', 'subcategories.SubCategoryName']);

        return view('propertydetails.list',compact('propertylist'));
     }

     public function actionpage(Request $request){
       //  dd($request);
        if($request->ActionTaken == "delete"){
            $updatePropertyDetails = [
                'CurrentStatus' => 'InActive'
                ,'UpdatedOn' =>  date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
                ,'UpdateBy' => auth()->user()->id
             ];
             $propretyUpdates = propertydetails::where('PropertyId', $request->PropertyId)->update($updatePropertyDetails); 

            //  $propertylist = propertydetails::join('subcategories', 'subcategories.SubCategoryId', '=', 'propertydetails.SubCategory')
            //                             ->join('categorys','categorys.CategoryId','=','propertydetails.Category')
            //                             ->where('propertydetails.CurrentStatus', 'Active')
            //                             ->get(['propertydetails.PropertyId','propertydetails.ReferanceNumber', 'propertydetails.City', 'propertydetails.Price', 'propertydetails.Area', 
            //                                     'propertydetails.Bedroorms', 'propertydetails.Bathrooms', 'propertydetails.Purpose'
            //                                     , 'subcategories.SubCategoryName', 'subcategories.SubCategoryName']);

        return redirect()->back()->with("success", "Successfully deleted property details!");
        //return view('propertydetails.list',compact('propertylist'))->with("success", "Successfully deleted property details!"); 
        }
        else
        {
            $propertydetail = propertydetails::where('PropertyId', $request->PropertyId)->first(); 
            $selectcategory = category::where('CategoryId', $propertydetail->Category)->first();    
            $selectsubcategory = subcategory::where('SubCategoryId', $propertydetail->SubCategory)->first();    
            $userdetails = User::where('id', $propertydetail->AgentId)->first();
            $agentlist = User::get();
            $dbcategory = category::where('CurrentStatus', "active")->get();
            $dbsubcategory = subcategory::where('CurrentStatus', "active")->get();
            return view('propertydetails.editproperty',compact('dbcategory', 'dbsubcategory', 'agentlist' , 'propertydetail' , 'selectcategory', 'selectsubcategory', 'userdetails'));
        }
     }

     public function updateproperty(Request $request)
     {
            // dd($request);
            $propertydetail = propertydetails::where('PropertyId', $request->PropertyId)->first(); 
            $propertiesupdate = [
                'PermitNumber' => ($request->PermitNumber != null) ? $request->PermitNumber : $propertydetail->PermitNumber
                ,'Category' => ($request->Category != null) ? $request->Category : $propertydetail->Category
                ,'SubCategory' => ($request->SubCategory != null) ? $request->SubCategory : $propertydetail->SubCategory
                ,'Price' => ($request->Price != null) ? $request->Price : $propertydetail->Price
                ,'Area' => ($request->Area != null) ? $request->Area : $propertydetail->Area
                ,'Bedroorms' => ($request->Bedroorms != null) ? $request->Bedroorms : $propertydetail->Bedroorms
                ,'Bathrooms' => ($request->Bathrooms != null) ? $request->Bathrooms : $propertydetail->Bathrooms
                ,'Purpose' => ($request->Purpose != null) ? $request->Purpose : $propertydetail->Purpose
                ,'VacatingNoticePeriod' => ($request->VacatingNoticePeriod != null) ? $request->VacatingNoticePeriod : $propertydetail->VacatingNoticePeriod
                ,'Rent' => ($request->Rent != null) ? $request->Rent : $propertydetail->Rent
                ,'Furnished' => ($request->Furnished != null) ? $request->Furnished : $propertydetail->Furnished
                ,'AgentId' => ($request->AgentId != null) ? $request->AgentId : $propertydetail->AgentId
                ,'City' => ($request->City != null) ? $request->City : $propertydetail->City
                ,'Address' => ($request->Address != null) ? $request->Address : $propertydetail->Address
                ,'Description' => ($request->Description != null) ? $request->Description : $propertydetail->Description
                ,'MaintenanceFee' => ($request->MaintenanceFee != null) ? $request->MaintenanceFee : $propertydetail->MaintenanceFee
                ,'UpdatedOn' =>  date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
                ,'UpdateBy' => auth()->user()->id
             ];
            
             $updatedPropertyDetails = propertydetails::where('PropertyId', $request->PropertyId)->update($propertiesupdate);
             // dd($updatedPropertyDetails);
             if($updatedPropertyDetails > 0)
             {
                return Redirect::to('propertyr/amenities/'.$request->PropertyId)->with(['success' => 'Successfully updated property details!']);
             }

             return Redirect::to('propertyr/amenities/'.$request->PropertyId)->with(['success' => 'Fail to updated property details back try again!']);
             //return redirect()->back()->with("success", "Fail to update property details try again!");
     }
}
