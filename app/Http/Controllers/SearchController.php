<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Image;
use App\Models\Tag;

class SearchController extends Controller
{
    public function index(Request $request){

        $tags = explode(' ', $request['tags']);
        $actualTags = Tag::whereIn('tagname', $tags)->get();
        $tags_id = [];
        foreach($actualTags as $tag){
            $tags_id[] = $tag->id; 
        }
        $image_ids = DB::table('image_tag')->select('image_id')->whereIn('tag_id', $tags_id)->distinct()->get();
        $plain_image_ids = [];
        foreach($image_ids as $image_id){
            $plain_image_ids[] = $image_id->image_id;
        }
        $images = Image::whereIn('id', $plain_image_ids)->get();
        return view('gallery.show', ['images'=>$images]);
    }
}
