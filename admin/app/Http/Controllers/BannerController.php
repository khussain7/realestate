<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\properties;
use App\Models\owner;
use App\Models\banners;
use App\Models\banner_log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    //
    public function list()
    {
        $bannerlist = banners::where('CurrentStatus', 'Active')->get();
        return view('banners.list',compact('bannerlist'));
    }

    public function Index()
    {
        $propertydetailslist = properties::where('CurrentStatus', 'Active')->where('AddedAsBanner', 'No')->get();
        $bannerdetailslist = properties::where('CurrentStatus', 'Active')->where('AddedAsBanner', 'Yes')->get();
        return view('banners.index',compact('propertydetailslist' , 'bannerdetailslist'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'PropertyId' => ['required'],
            'BannerImage' => ['required','image', 'mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

        $existingBanner = banners::where('PropertyId', $request->PropertyId);
        //dd( $existingBanner->count()); exit();
        if($existingBanner->count() > 0)
        {

            $fileName = $request->PropertyId . '_' .time() . '.' . $request->BannerImage->extension();
            $request->BannerImage->move(public_path('files'), $fileName);
    
            // $bannerscreate = new banners;
            // $bannerscreate->PropertyId = $request->PropertyId;
            // $bannerscreate->BannerImage = $fileName;
            // $bannerscreate->StartedDate = date('Y-m-d H:i:s');
            // $bannerscreate->CurrentStatus = 'Active';

            $updateBannerDetails = [
                'BannerImage' => $fileName
                ,'StartedDate' =>  date('Y-m-d H:i:s')
                ,'CurrentStatus' => 'Active'
                ,'UpdateBy' => auth()->user()->id
             ];
    
           $updateDetails = [
                                'AddedAsBanner' => 'Yes'
                                ,'UpdatedOn' =>  date('Y-m-d H:i:s')
                                ,'updated_at' => date('Y-m-d H:i:s')
                                ,'UpdateBy' => auth()->user()->id
                             ];
           $bannerUpdates = banners::where('PropertyId', $request->PropertyId)->update($updateBannerDetails);                             
           $propertiesudpate = properties::where('PropertyId', $request->PropertyId)->update($updateDetails);

            if(!$bannerUpdates){
               return redirect()->back()->with("success", "Fail to add banner details try again");
              }
              $bannerhistory = new banner_log;
              $bannerhistory->PropertyId = $request->PropertyId;
              $bannerhistory->PerformActivity = "Added";
              $bannerhistory->save();

            //   if(!$bannerhistory->save()){
            //     dd("Unable to save history");
            //     }
              return redirect()->back()->with("success", "Success add banner details do to list");
        }
        else{

            $fileName = $request->PropertyId . '_' .time() . '.' . $request->BannerImage->extension();
            $request->BannerImage->move(public_path('files'), $fileName);
    
            $bannerscreate = new banners;
            $bannerscreate->PropertyId = $request->PropertyId;
            $bannerscreate->BannerImage = $fileName;
            $bannerscreate->StartedDate = date('Y-m-d H:i:s');
            $bannerscreate->CurrentStatus = 'Active';
    
           $updateDetails = [
                                'AddedAsBanner' => 'Yes'
                                ,'UpdatedOn' =>  date('Y-m-d H:i:s')
                                ,'updated_at' => date('Y-m-d H:i:s')
                                ,'UpdateBy' => auth()->user()->id
                             ];
    
           $propertiesudpate = properties::where('PropertyId', $request->PropertyId)->update($updateDetails);
    
            if(!$bannerscreate->save()){
                 return redirect()->back()->with("success", "Fail to add banner details try again");
              }
              
              $banner_log = new banner_log;
              $banner_log->PropertyId = $request->PropertyId;
              $banner_log->PerformActivity = "Added";
              $banner_log->save();
            //   if(!$banner_log->save()){
            //         dd("Unable to save history");
            //   }
              return redirect()->back()->with("success", "Success add banner details do to list");
        }

       
    }

    public function delete($id)
    {
        $updateDetails = [
            'AddedAsBanner' => 'No'
            ,'UpdatedOn' =>  date('Y-m-d H:i:s')
            ,'updated_at' => date('Y-m-d H:i:s')
            ,'UpdateBy' => auth()->user()->id
         ];

        $propertiesudpate = properties::where('PropertyId', $id)->update($updateDetails);

        $updateBanner = [
            'CurrentStatus' => 'InActive'
            ,'UpdatedOn' =>  date('Y-m-d H:i:s')
            ,'updated_at' => date('Y-m-d H:i:s')
            ,'UpdateBy' => auth()->user()->id
         ];

        $updateBannerDate = banners::where('PropertyId', $id)->where('CurrentStatus', 'Active')->update($updateBanner);

            if(!$updateBannerDate){
               return redirect()->back()->with("success", "Fail to remove banner try again");
              }

              $banner_log = new banner_log;
              $banner_log->PropertyId = $id;
              $banner_log->PerformActivity = "Remove";
              $banner_log->save();

              return redirect()->back()->with("success", "Success remove banner details from the list");
    }

}
