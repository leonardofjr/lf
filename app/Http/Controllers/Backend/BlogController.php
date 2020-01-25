<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Blog;
use Auth;
use Carbon\Carbon;
use Storage;
use App\Http\Requests\BlogValidationRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  index() {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $blog = $user->blog;
        $data = [];

        foreach($blog as $i => $item) {
            $data[$i] = [
                'id' => $item->id,
                'title' => $item->title,
                'author' => $user->fname,
                'created_at' => (new Carbon($item->created_at))->format('M d, Y'),
            ];
        };
        return view('backend.pages.blog.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

       // Passing in array of $langauges to View
        return view('backend.pages.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(BlogValidationRequest $request)
{       $user_id = Auth::id();
        $blog = new Blog;

        // Preparing updated data to database
        $blog->user_id = $user_id;
        $blog->title = $request->input('title');
        $blog->slug = $request->input('slug');
        $blog->content = $request->input('content');


        if ($request->hasFile('uploadedImageFile')) {
            // Generating filename
            $new_filename_generated =  md5(rand()) . '.png';
            $new_file_directory = 'users/' . Auth::Id() . '/imgs/';
           
            $temp_file_location = Storage::allFiles('temp/')[0];

            // Storing new File using laravels file storage
            $new_file = Storage::move($temp_file_location, $new_file_directory . $new_filename_generated);
            $blog->image = $new_file_directory . $new_filename_generated;
        }
        
        $blog->save();
        return redirect('/admin/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $blog = Blog::findOrFail($id);
        return view('backend.pages.blog.edit')->with([
                'data' => $blog,
            ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogValidationRequest $request, $blog_post_id)
    {  
        $blog_post = Blog::findOrFail($blog_post_id);

        // Preparing updated data to database
        $blog_post->title = $request->input('title');
        $blog_post->slug = $request->input('slug');
        $blog_post->content = $request->input('content');


        if ($request->hasFile('uploadedImageFile')) {

            // Getting current file name
            $current_filename = $blog_post->image;
            
            if( $current_filename) {
                // Removing current stored file and directories from storage
                Storage::disk('public')->delete($current_filename);

            }

            // Generating filename
            $new_filename_generated =  md5(rand()) . '.png';
            $new_file_directory = 'users/' . Auth::Id() . '/imgs/';
           
            $temp_file_location = Storage::allFiles('temp/')[0];

            // Storing new File using laravels file storage
            $new_file = Storage::move($temp_file_location, $new_file_directory . $new_filename_generated);
            $blog_post->image = $new_file_directory . $new_filename_generated;
        }
        
        $blog_post->save();
        return redirect('/admin/blog');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($blog_post_id)
    {   
        if ($blog_post_id) {
            $blog_post = Blog::findOrFail($blog_post_id);
            // Storing Filename in variable
             $filename = $blog_post->image;
            // Deleteing File
             Storage::delete($filename);
            $blog_post->delete();
            return redirect('/admin/blog');
        } else {
            return;
        }

    }
}

