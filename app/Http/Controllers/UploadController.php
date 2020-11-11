<?php

namespace App\Http\Controllers;

use App\File;
use App\Task;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class UploadController extends Controller
{

    public function index()
    {
        
    }

   /**
    * This method will handle the file uploads. 
    *
    * @param $request : The special form request for our upload application
    * @return array|\Illuminate\Http\UploadedController|\Illuminate\Http\UploadedFile[]|null
    * @throws BindingResolutionException
    */
   public function store(Request $request)
   { 
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                //

                $validated = $request->validate([
                    'image' => 'mimes:jpeg,png|max:5000|required',
                ]);
                $extension = $request->image->extension();
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $request->image->storeAs('/public', $filename);
                $url = Storage::url($filename);
                $file = File::create([
                    'url' => $url,
                    'fileable_id' => $request->taskId,
                ]);

                Session::flash('success', "Success!");
                return \Redirect::back();
            }
            
        }
        abort(500, 'Could not upload image :(');   
   }

   /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();
       
    }


}
