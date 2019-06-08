<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company; 

class CompanyController extends Controller
{
    public function __construct()
    { 
        $this->middleware(['employer', 'verified'], ['except'=> array('index')]); 
    }

    public function index($id, Company $company)
    { 
        return view('company.index', compact('company')); 
    }

    public function create()
    { 
        return view('company.create'); 
    }
    
    public function store()
    { 
        // $this->validate($request,[
        //     'address'      => 'required',
        //     'phone' => 'required|min:10|numeric', 
        //     'website'   => 'required|min:20', 
        //     'slogan'          => 'required|min:20', 
        //     '' => ''
        // ]); 

        $user_id = auth()->user()->id;

        Company::where('user_id', $user_id)->update([
            'address'     => request('address'),
            'phone'       => request('phone'), 
            'website'     => request('website'),             
            'slogan'      => request('slogan'),             
            'description' => request('description'),             
        ]);

        return redirect()->back()->with('message', 'Company Successfully Updated!');
    }

    public function coverPhoto(Request $request)
    { 
        $user_id = auth()->user()->id;
        if($request->hasfile('cover_photo'))
        { 
            $file = $request->file('cover_photo'); 
            $ext = $file->getClientOriginalExtension(); 
            $fileName = time().'.'. $ext; 
            $file->move('uploads/coverphoto/', $fileName); 
            
            Company::where('user_id', $user_id)->update([
                'cover_photo' => $fileName
            ]);

            return redirect()->back()->with('message', 'Company Cover Photo Successfully Updated!');
        }
    }

    public function companyLogo(Request $request)
    { 
        $user_id = auth()->user()->id;
        if($request->hasfile('company_logo'))
        { 
            $file = $request->file('company_logo'); 
            $ext = $file->getClientOriginalExtension(); 
            $fileName = time().'.'. $ext; 
            $file->move('uploads/logo/', $fileName); 
            
            Company::where('user_id', $user_id)->update([
                'logo' => $fileName
            ]);

            return redirect()->back()->with('message', 'Company Logo Photo Successfully Updated!');
        }
    }
}
