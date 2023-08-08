<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyDetailsController extends Controller
{
    //
    public function index(Request $request): RedirectResponse{
        
        $request->validate([
            'Category' => ['required', 'string', 'max:255'],
            'SubCategory' => ['required', 'string', 'max:255'],
            'Property_Price' => ['required', 'integer'],
            'Property_Bedrooms' => ['required', 'integer'],
            'Property_Bath' => ['required', 'integer'],
            'Property_Category' => ['required', 'string'],
            'City'=> ['required', 'string'],
            'Location'=> ['required', 'string'],
            'Property_Images' => ['required'],
        ]);
        
     return redirect()->back()->with("success", "Success add property details do to list");
     }
}
