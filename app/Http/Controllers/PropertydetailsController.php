<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\propertyAmenities;
use App\Models\propertydetails;
use App\Models\propertyimages;
use App\Models\category;
use App\Models\subcategory;
use App\Models\User;


class PropertydetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $propertydetailslist = propertydetails::where('CurrentStatus', 'Active')->get();
        // $propertyimages = propertyimages::where('CurrentStatus', 'Imageupload')->get();
        $bannerlist = DB::table('propertydetails')->select('propertydetails.PropertyId','propertydetails.Category', 'propertydetails.SubCategory',
                                 'propertydetails.Purpose','propertydetails.Furnished','propertydetails.ReferanceNumber','propertydetails.City',
                                 'propertydetails.Price','propertydetails.Area','propertydetails.PermitNumber','propertydetails.Bedroorms',
                                 'propertydetails.Bathrooms','propertydetails.Rent','banners.BannerImage', 'banners.BannerImage','categories.CategoryName', 
                                 'subcategories.SubCategoryName' ) 
                                ->join('banners','propertydetails.PropertyId','=','banners.PropertyId')
                                ->join('categories','propertydetails.Category','=','categories.CategoryId')
                                ->join('subcategories','propertydetails.SubCategory','=','subcategories.SubCategoryId')
                                ->where('propertydetails.AddedAsBanner','=','Yes')
                                ->get();
                               // DB::table('users')->toSql()
                                //  dd($bannerlist);
        

        $bannerlist->transform(function ($item) {
        $pimg = propertyimages::where('PropertyId', $item->PropertyId)->get(['ImageName']);
            if ($pimg->count()) {
                $item->pimg = $pimg;
            }
            return $item;
        });

        // $bannerlist = propertydetails::orderBy(function ($query) {
        //      $query->select('ImageName')
        //          ->from('propertyimages')
        //          ->whereColumn('PropertyId', 'propertydetails.PropertyId');
        //  }) ->where('propertydetails.AddedAsBanner','=','Yes')->get();

        //    dd($bannerlist);
        return view('welcome',compact('propertydetailslist', 'bannerlist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function property($id)
    {
        //         dd($propertydetails);
        $propertydetails = propertydetails::where('CurrentStatus', 'Active')->where('PropertyId', $id)->get();
        $propertyAmenities = propertyAmenities::where('PropertyId', $id)->get();
        $propertyImages = propertyimages::where('PropertyId', $id)->get();
        $BannerImage =  propertyimages::where('PropertyId', $id)->where('IsBannner', "Yes")->get();
        $EmployeeProfile =  User::where('id', $propertydetails[0]['AgentId'])->get();
        return view('property',compact('propertydetails' , 'propertyAmenities', 'propertyImages', 'BannerImage', 'EmployeeProfile' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
