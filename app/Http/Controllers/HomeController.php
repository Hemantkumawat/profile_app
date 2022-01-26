<?php

namespace App\Http\Controllers;

use App\Models\OrganizationAssociation;
use App\Models\User;
use App\Models\WorkExperience;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        return view('home', compact('user'));
    }

    public function updateUser(Request $request)
    {
        $data = array_filter($request->except('_method', '_token'));
        User::query()->findOrFail(auth()->user()->id)->update($data);
        return redirect()->back()->with('success','Data Updated Successfully');
    }

    public function storeWorkExperience(Request $request)
    {
        $data = array_filter($request->except('_method', '_token'));
        WorkExperience::query()->create($data);
        return redirect()->back()->with('success','Data Updated Successfully');
    }

    public function organizationAssociationStore(Request $request)
    {
        $data = array_filter($request->except('_method', '_token'));
        OrganizationAssociation::query()->create($data);
        return redirect()->back()->with('success','Data Updated Successfully');
    }
}
