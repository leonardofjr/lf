<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();

        return view('backend.pages.users.index')->withUsers($users);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.pages.users.edit')->withData($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Searching by Users corresponding id
        $user = User::findOrFail($id);
        // Preparing updated data to database
        $user->bio = $request->bio;
        $user->lname = $request->lname;
        $user->fname = $request->fname;
        $user->phone = $request->phone;
        $user->twitter_url = $request->twitter_url;
        $user->facebook_url = $request->facebook_url;
        $user->linkedin_url = $request->linkedin_url;
        $user->github_url = $request->github_url;
        $user->email = $request->email;

        if ($request->hasFile('uploadedImageFile')) {
            // Getting current file name
            $current_filename = $user->profile_image;
            $current_file_directory = str_split($current_filename, 2);
            if($current_filename) {

            // Removing current stored file and directories from storage
            Storage::disk('public')->delete('/user/imgs/' . $current_file_directory[0] . '/' . $current_file_directory[1] . '/' . $current_file_directory[2] . '/' . $current_filename);
            Storage::disk('public')->deleteDirectory('/user/imgs/' .$current_file_directory[0] . '/' . $current_file_directory[1] . '/' . $current_file_directory[2] . '/');
            Storage::disk('public')->deleteDirectory('/user/imgs/' . $current_file_directory[0] . '/' . $current_file_directory[1] . '/');
            Storage::disk('public')->deleteDirectory('/user/imgs/' . $current_file_directory[0] . '/');
        }

            // Generating filename
            $new_filename_generated =  md5(rand()) . '.png';
            $new_file_directory = str_split($new_filename_generated, 2)[0] . '/' . str_split($new_filename_generated, 2)[1] . '/' . str_split($new_filename_generated, 2)[2] . '/';

            // Getting current file name
            $temp_file = Storage::allFiles('temp/')[0];

            // Storing new File using laravels file storage
            $new_file = Storage::move($temp_file, '/user/imgs/' . $new_file_directory . $new_filename_generated );
            // Preparing updated data to database
            $user->profile_image = $new_file_directory . $new_filename_generated;

        }
            // Saving data to database
            $user->save();
            return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Getting Selection By ID
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('admin/users');
    }
}
