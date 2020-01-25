<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Portfolio;
use App\Http\Controllers\HelperMethodsController;
use App\Http\Requests\PortfolioValidationRequest;
use Storage;
use Auth;
use Carbon\Carbon;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        // Issue Resolved
        $portfolio = $user->portfolio;
        $data = [];
        foreach ($portfolio as $i => $item) {
            $data[$i] = [
                'id' => $item->id,
                'title' => $item->title,
                'author' => $user->fname,
                'created_at' => (new Carbon($item->created_at))->format('M d, Y'),
                'type' => $item->type,
            ];
       }


       return view('backend.pages.portfolio.index')->with([
            'data' => $data,
       ]);
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

        $helper = new HelperMethodsController;
        $type_dropdown = $helper->typeDrowndown();
       // Passing in array of $langauges to View
        return view('backend.pages.portfolio.create')->with([
            'type_dropdown' => $type_dropdown,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioValidationRequest $request)
    {
        $portfolio = new Portfolio();

        // Preparing updated data to database
        $portfolio->user_id = Auth::id();
        $portfolio->title = $request->title;
        $portfolio->type = $request->type;
        $portfolio->website_url = $request->website_url;
        $portfolio->description = $request->description;


        if ($request->hasFile('uploadedImageFile')) {
            // Generating filename
            $new_filename_generated =  md5(rand()) . '.png';
            $new_file_directory = 'users/' . Auth::Id() . '/imgs/';
            
            $temp_file_location = Storage::allFiles('temp/')[0];

            // Storing new File using laravels file storage
            $new_file = Storage::move($temp_file_location, $new_file_directory . $new_filename_generated);
            $portfolio->image = $new_file_directory . $new_filename_generated;
        }
        
        $portfolio->save();
        return redirect('/admin/portfolio');
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
        $helper = new HelperMethodsController();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $type_dropdown = $helper->typeDrowndown();
        $portfolio = Portfolio::findOrFail($id);
        return view('backend.pages.portfolio.edit')->with([
            'data' => $portfolio,
            'type_dropdown' => $type_dropdown,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioValidationRequest $request, $id)
    {
        // Searching by Users corresponding id
        $portfolio_post = Portfolio::findOrFail($id);

        // Preparing updated data to database
        $portfolio_post->user_id = Auth::id();
        $portfolio_post->title = $request->title;
        $portfolio_post->type = $request->type;
        $portfolio_post->website_url = $request->website_url;
        $portfolio_post->description = $request->description;


        if ($request->hasFile('uploadedImageFile')) {

            // Getting current file name
            $current_filename = $portfolio_post->image;
            
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
            $portfolio_post->image = $new_file_directory . $new_filename_generated;
        }
        
        $portfolio_post->save();
        return redirect('/admin/portfolio');

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
        $portfolio = Portfolio::findOrFail($id);
        // Storing Filename in variable
        $filename = $portfolio->image;
        // Deleteing File
        Storage::delete($filename);
        
         $portfolio->delete();
       return redirect('admin/portfolio');
    }
}
