<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    function AddBlog(){

        return view('backend.blog.add_blog');
    }

    function PostBlog(Request $request){
        $input = $request->all();
        $tags = explode(", ", $input['tags']);

        foreach($tags as $tag){
            $tag;
        }
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = Str::lower(Str::random(5)) .'-'. $file->getClientOriginalExtension(); 
            $image = Image::make($file)->save(public_path('thumbnail/'.$ext));

            Blog::insert([
                'title' => $request->title,
                'image' => $ext,
                'category' => $request->category,
                'summary' => $request->summary,
                'tags' => $tag,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);
            return back()->with('success', 'Blog Published..');
        }
        else{
            return back();
        }
        
    }

    function ViewBlog(){
        $blog = Blog::all();
        return view('backend.blog.view_blog', compact('blog'));
    }

    function EditBlog($id){
        $blog = Blog::findOrFail($id);
        return view('backend.blog.edit_blog', compact('blog'));
    }

    function UpdateBlog(Request $request){
        if($request->hasFile('image')){
            $image = $request->file('image');
            $id = $request->id;
            $old_image = Blog::findOrFail($id)->image;
            
            if(file_exists(public_path('thumbnail/'.$old_image))){
                unlink(public_path('thumbnail/'.$old_image));
            }

            $ext = Str::lower(Str::random(5)) . '.' .$image->getClientOriginalExtension();
            Image::make($image)->save(public_path('thumbnail/'.$ext));
            
            Blog::findOrFail($id)->update([
                'title' => $request->title,
                'category' => $request->category,
                'summary' => $request->summary,
                'description' => $request->description,
                'image' => $ext,
                'updated_at' => Carbon::now()
            ]);
        }
        else {
            $id = $request->id;
            Blog::findOrFail($id)->update([
                'title' => $request->title,
                'category' => $request->category,
                'summary' => $request->summary,
                'description' => $request->description,
                'updated_at' => Carbon::now()
            ]);
        }

        return back()->with('success', 'Blog Updated Successfully');
    }

    function DeleteBlog($id){
        Blog::findOrFail($id)->delete();
        return back()->with('success', 'Blog Deleted.');
    }

    function SingleBlog(Request $request, $id){
        $search = $request->query('search');
        if($search){
            $cat = ServiceCategory::all();
            $blog = Blog::where('title', 'LIKE', "%{$search}%")->simplePaginate(5);
            $recent = Blog::all();
        }
        else{
            $blog = Blog::where('title', $id)->get();
            $blog_id = Blog::where('title', $id)->first();
            $recent = Blog::all();
            $cat = ServiceCategory::all();
            $blog_cat = Blog::all();
            $blog_comment = BlogComment::where('blog_id', $id)->get();

            
            foreach ($blog as $tags) {
                $tag = $tags->tag;
            }
            
        }
        return view('frontend.single_blog', compact('blog', 'recent','cat', 'blog_id', 'blog_comment', 'blog_cat', 'tag'));
    }


    function BlogComment(Request $request){
        $request->validate([
            'user_name' => ['required'],
            'user_email' => ['required'],
            'user_message' => ['required']
        ]);

        BlogComment::insert([
            'blog_id' => $request->blog_id,
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'user_message' => $request->user_message,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Comment Published Successfully.');
    }

}
