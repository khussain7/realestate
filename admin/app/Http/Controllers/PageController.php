<?php
namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\pages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    //
    public function index(){
        return view('pages.index');
    }

    public function add(Request $request){
        $request->validate([
            'PageName' => ['required', 'string', 'max:255'],
            'PageHeading' => ['required', 'string', 'max:255'],
            'Description' => ['required', 'string'],
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
                        if($check)
                        {
                            $fileName = time().$i.'.'. $extension;
                            $file->move(public_path('files'), $fileName);
                            $i +=1;
                            $allimages .= $fileName.',';
                        }
                    }
                    $allimages = rtrim($allimages, ", ");
            }
           
            $pagecreate = pages::create([
                 'PageName' => $request->PageName
                ,'PageHeading' => $request->PageHeading
                ,'Description' => $request->Description
                ,'Attachments' => $allimages
                ,'CurrentStatus' => 'Active'
                ,'CreatedBy' => auth()->user()->id
                ,'CreateOn' => date('Y-m-d H:i:s')
            ]);
        if(!$pagecreate->save()){
             return redirect()->back()->with("success", "Fail to add page details try again");
        }
          return redirect()->back()->with("success", "Success add page details go to list");
    }

    public function list(){
        $pageslist = pages::where('CurrentStatus', 'Active')->get();
        return view('pages.list',compact('pageslist'));
    }

    public function view($id){
        $pageinfo = pages::where('PageId ', $id)->first();
        return view('pages.view',compact('pageinfo'));
    }

    public function delete($id){

          $pageupdates = pages::where('PageId', $id)
          ->update([
                      'CurrentStatus' => 'InActive'
                      ,'UpdatedOn' => date('Y-m-d H:i:s')
                      ,'updated_at' => date('Y-m-d H:i:s')
                      ,'UpdateBy' => auth()->user()->id
                      ]);

          if(!$pageupdates > 0 ){
             return redirect()->back()->with("success", "Fail to delete page details try again");
          }

          $pageslist = pages::where('CurrentStatus', 'Active')->get();
          return view('pages.list',compact('pageslist'))->with("success", "Success deleted page details");
    }
}
