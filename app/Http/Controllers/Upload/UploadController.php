<?php

namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use App\Models\User;
use App\Models\Tag;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;


class UploadController extends Controller {
    public function index(){
        if(Auth::check()){
            $agent = new Agent();
            return view('upload.show', [
                'agent' => $agent,
            ]);
        }
        return redirect()->route('login')->withErrors(['msg' => 'You are not logged in!']);
    }

    public function uploadImage(Request $request){
        /* Validación, TODO */
        $validated = $request->validate([
          'image' => 'required',
          'title' => 'required',
          'tags' => 'required'
        ]);
  
        if($validated){

          $username = auth()->user()->name;
          $newImage = Image::create([
              'title' => $request['title'],
              'user_id' => auth()->user()->id,
              'public' => true, //TODO
              // 'path' => Storage::disk('local')->put('public/images/'.$username, $request->file('image')) //TODO
              ]);
              
          $this->handleTags($request['tags'], $newImage);
          $path = Storage::disk('local')->putFile('public/images/'.$username , $request->file('image'));
          $path = explode('/', $path)[3];   //
          $newImage->path = $path;
          $newImage->save();
          //echo($path);
          return redirect()->back()->withSuccess('Image uploaded successfully!');
        } 
  
        return redirect()->back()->withErrors("Something went wrong! Contact the administrator.");
      }

    private function handleTags($tags, $image){
        //TODO
        $tags = explode(' ', $tags);
        $tags_ids = collect([]);
        foreach($tags as $tag){
            $existing_tag = Tag::where('tagname', $tag)->first();   //...sql en un bucle for...?
            if(!$existing_tag){
                $newTag = new Tag;
                $newTag->tagname = $tag;
                $newTag->save();
                $existing_tag = $newTag;
            }
            //añadir asociación imagen-tag
            $tags_ids->push($existing_tag->id);
        }
        $image->tags()->attach($tags_ids);
    }
}