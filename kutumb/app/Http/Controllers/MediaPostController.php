<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mediapost;

class MediaPostController extends Controller
{
    public function uploadMedia(Request $req){
        $req->validate([
            'user_id' => 'required',
            'title' => 'nullable',
            'description' => 'nullable',
            'location' => 'nullable',
            'date' => 'nullable',
            'video_url' => 'nullable',
            'file_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]); 

        $mediapost = new Mediapost;

        if($req->file()) {
            $file = $req->file('file_path');
            $uniqueFileName = uniqid() . $file->getClientOriginalName();
            $filePath = $req->file('file_path')->storeAs('mediaposts', $uniqueFileName, 'public');

            $mediapost->user_id = $req->get('user_id');
            $mediapost->title = $req->get('title');
            $mediapost->description = $req->get('description');
            $mediapost->location = $req->get('location');
            $mediapost->date = $req->get('date');
            $mediapost->video_url = $req->get('video_url');
            $mediapost->file_path = $filePath;
            $mediapost->save();

            $tab = $req->get('tab');
            return back()->withInput(['tab'=>$tab]);

            // return back()
            // ->with('success','File has been uploaded.')
            // ->with('file', $uniqueFileName);
        }
   }
}
