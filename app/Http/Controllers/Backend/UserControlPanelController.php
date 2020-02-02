<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileValidationRequest;
use App\User;
use Storage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Auth;
use App\Portfolio;
use App\Blog;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;

class UserControlPanelController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $ca_provinces = \App\CaProvince::all();
        return view('backend.pages.profile.edit')->with([
            'data' => $user,
            'ca_provinces' => $ca_provinces,
            'id' => $user_id
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function update(ProfileValidationRequest $request, $id)
    {
              // Searching by Users corresponding id
              $user = User::findOrFail($id);
              // Preparing updated data to database
              $user->bio = $request->bio;
              $user->lname = $request->lname;
              $user->fname = $request->fname;
              $user->city = $request->city;
              $user->province = $request->province;
              $user->postal_code = $request->postal_code;
              $user->country = $request->country;
              $user->phone = $request->phone;
              $user->email = $request->email;
              $user->twitter_url = $request->twitter_url;
              $user->facebook_url = $request->facebook_url;
              $user->linkedin_url = $request->linkedin_url;
              $user->github_url = $request->github_url;
      
              if ($request->hasFile('uploadedImageFile')) {
                  // Getting current file name
                  $current_filename = $user->profile_image;
                  
                  if($current_filename) {
                      // Removing current stored file and directories from storage
                      Storage::disk('public')->delete($current_filename);
                  }
                  // Generating filename
                  $new_filename_generated =  md5(rand()) . '.png';
                  $new_file_directory = 'users/' . Auth::Id() . '/imgs/';
      
                  // Getting temp file name
                  $temp_file = Storage::allFiles('temp/')[0];
      
                  // Storing new File using laravels file storage
                  $new_file = Storage::move($temp_file, $new_file_directory . $new_filename_generated );
                  // Preparing updated data to database
                  $user->profile_image = $new_file_directory . $new_filename_generated;
      
              }
      
              $user->save();
              return redirect('/admin/profile');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
