<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Image;
use App\Models\Tag;
use App\Models\User;

class SearchController extends Controller
{
    public function index(Request $request){

        if($request["search-options"] == "tag"){
            $images = $this->searchByTags($request);
        }
        else if($request["search-options"] == "uploader"){
            $images = $this->searchByUploaderName($request);
        }
        else if($request["search-options"] == "title"){
            $images = $this->searchByImageTitle($request);
        }
        return view('gallery.show', ['images'=>$images]);
    }

    private function searchByTags(Request $request){
        $tags = explode(' ', $request['search-params']);
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
        return $images;
    }

    private function searchByUploaderName(Request $request){
        $images = User::where("name", $request["search-params"])->get()->first()->images;
        return $images; 
    }

    private function searchByImageTitle(Request $request){
        $images = Image::where("title", $request["search-params"])->get();
        return $images;
    }
}
