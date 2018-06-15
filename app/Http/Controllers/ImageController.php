<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 

use Validator;
use Redirect;
use Session;

class ImageController extends Controller
{

    /**
    * Create view file
    *
    * @return void
    */
    public function imageUpload()
    {
    	return view('userm');
    }

    /**
    * Manage Post Request
    *
    * @return void
    */
    public function imageUploadPost()
    {
    	// $this->validate($request, [
     //        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     //        ]);

         // getting all of the post data
        $file = array('image' => Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
        // send back to the page with the input data and errors
        return Redirect::to('image-upload')->withInput()->withErrors($validator);
        }
        else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {
                $destinationPath = '/uploads'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renaming image

                $path = Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                

                //input database 
                //image = $path;

                // sending back with message
                Session::flash('success', 'Upload successfully'); 
                return Redirect::to('image-upload');
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('image-upload');
            }
        }

        // return $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // $request->image->move(public_path('img'), $imageName);

    	// return back()
    	// 	->with('success','Image Uploaded successfully.')
    	// 	->with('path',$imageName);
}

}