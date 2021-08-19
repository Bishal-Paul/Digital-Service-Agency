<?php

namespace App\Http\Controllers;

use App\Models\Bannar;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Brand;
use App\Models\Pricing;
use App\Models\ServiceCategory;
use App\Models\SiteInfo;
use App\Models\StartProject;
use App\Models\Testimonial;
use App\Models\Video;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index(){
        $pricing = Pricing::all();
        $test = Testimonial::all();
        $work = Work::all();
        $brand = Brand::all();
        $cat = ServiceCategory::all();
        $bannar = Bannar::all();
        $video = Video::all();
        return view('frontend.index', compact('pricing', 'test', 'work', 'brand','cat', 'bannar', 'video'));
    }

    function master(){
        $cat = ServiceCategory::all();
        $siteinfo = SiteInfo::latest()->get();
        return view('frontend.master', compact('cat', 'siteinfo'));
    }

    function pricing(){
        $pricing = Pricing::all();
        $cat = ServiceCategory::all();
        return view('frontend.price', compact('pricing','cat'));
    }

    function testimonial(){
        $test = Testimonial::all();
        $cat = ServiceCategory::all();
        $brands = Brand::all();
        return view('frontend.testimonial', compact('test','cat','brands'));
    }

    function work(){
        $work = Work::all();
        $cat = ServiceCategory::all();
        return view('frontend.work', compact('work','cat'));
    }

    function contact(){
        $cat = ServiceCategory::all();
        $siteinfo = SiteInfo::latest()->first();
        return view('frontend.contact',compact('cat', 'siteinfo'));
    }

    function blog(Request $request){
        $search = $request->query('search');
        if($search){
            $cat = ServiceCategory::all();
            $blog = Blog::where('title', 'LIKE', "%{$search}%")->simplePaginate(5);
        }else {
            $blog = Blog::simplePaginate(5);
            $cat = ServiceCategory::all();
        }
        return view("frontend.blog", compact('blog','cat'));
    }
    

    // START PROJECT
    function StartProject(){
        $cat = ServiceCategory::all();
        return view('frontend.start_project', compact('cat'));
    }
    function SubmitProject(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'company' => ['required'],
            'project_type' => ['required'],
            'budget' => ['required'],
            'about_project' => ['required'],
            'hear_about' => ['required'],
        ]);
        StartProject::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'project_type' => $request->project_type,
            'budget' => $request->budget,
            'about_project' => $request->about_project,
            'hear_about' => $request->hear_about,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success','Message Send Successfully! Thank You.');
    }

    function ViewSubmitedProject(){
        $projects = StartProject::all();
        $cat = ServiceCategory::all();
        return view('backend.view_submitted_projects', compact('projects','cat'));
    }

    function DeleteProject($id){
        StartProject::findOrFail($id)->delete();
        return back()->with('success', 'Project Deleted.');
    }

    function ViewFullProject($id){
        $project = StartProject::findOrFail($id);
        return view('backend.view_full_project', compact('project'));
    }
}
