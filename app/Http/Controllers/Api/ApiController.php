<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Upload\UploadController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Image;


class ApiController extends Controller
{
    //API methods
    public function getImage($username, $title){
        try{

            $user = User::where('name', $username)->get()->first();
            $image= Image::where('user_id', $user->id)->where('title', $title)->get()->first();
            $url = env('APP_URL') . Storage::url('public/images/' . $username . '/' . $image->path);
            $response = [
                'url' => $url,
                'title' => $image->title,
                'uploader' => $user->name,
                'tags' => $this->getTagNames($image),
                'qr' => \QrCode::size(300)->generate(
                    env('APP_URL') . Storage::url('public/images/' . $user->name . '/' . $image->path))->toHtml()
            ];
            // return response()->file(Storage::path('public/images/' . $username . '/' . $image_filename));
            return response()->json($response, 200);
        } catch (Exception $e){
            return response()->json(['error' => 'Backend error'], 500);
        }
    }

    public function getUserImages($username){
        $user = User::where('name', $username)->get()->first();
        $images = $user->images;
        $results = [];
        $url = env('APP_URL');
        foreach($images as $image){
             
            $results[] = [
                'url' => $url . Storage::url('public/images/' . $username . '/' . $image->path),
                'id' => $image->id,
                'title' => $image->title,
                'uploader' => $username,
                'tags' => $this->getTagNames($image),
                'qr' => \QrCode::size(300)->generate(
                    env('APP_URL') . Storage::url('public/images/' . $user->name . '/' . $image->path))->toHtml()
            ];
        }
        return response()->json($results);
    }

    public function uploadImage(Request $request){

        $validated = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'file' => 'required | mimetypes:image/jpg,image/jpeg,image/gif,image/png,image/x-png | max:2048',
        ]);

        if($validated){
            try{
                $user = auth()->user();
                //hacer la imagen
                if($user){
                    $image = Image::create([
                        'title' => $request['title'],
                        'user_id' => $user->id,
                        'public' => true,
                    ]);
                    //tags
                    UploadController::handleTags($request['tags'], $image);
                    $path = Storage::disk('local')->putFile('public/images/'. $user->name , $request->file('file'));
                    $path = explode('/', $path)[3];
                    $image->path = $path;
                    $image->save();
                    $tagnames = $this->getTagNames($image);

                    $results = [
                        'url' => env('APP_URL') . Storage::url('public/images/' . $user->name . '/' . $image->path),
                        'id' => $image->id,
                        'title' => $image->title,
                        'uploader' => $user->name,
                        'tags' => $tagnames,
                        'qr' => \QrCode::size(300)->generate(
                            env('APP_URL') . Storage::url('public/images/' . $user->name . '/' . $image->path))->toHtml(),
                    ];
                    return response()->json($results, 200);
                }

            } catch (Exception $e){
                return response()->json(['error' => 'Backend error'], 500); //
            }
        }
        return response()->json(['error' => 'Bad request'], 400);
    }

    public function deleteImage(Request $request){

        if($validated){
            $user = auth()->user();
            if($request['id']){
                Image::where('user_id', $user->id)->where('id', $request['id'])->get()->delete();
                return response()->json(['msg' => 'Image deleted'], 200);
            }
            if($request['title']){
                Image::where('user_id', $user->id)->where('title', $request['title'])->get()->first()->delete();
                return response()->json(['msg' => 'Image deleted'], 200);
            }
            return response()->json(['error' => 'Not enough data, try sending an image id or title'], 400);
        }
        return response()->json(['error' => 'Bad request'], 400);
    }

    public function loginAPI(Request $request){
        $request->validate([
            'email' => 'required | email',
            'password' => 'required | max:16'
        ]);

        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()
            ->json(['message' => 'Hi '.$user->name.', welcome to Photoback!','token' => $token, 'token_type' => 'Bearer', ]);
    }

    public function logoutAPI(){
        auth()->user()->tokens()->delete();
        return response()->json(['msg'=>'Logged out, deleting tokens...'], 200);
    }

    private function getTagNames($image){
        $tagnames = [];
        foreach($image->tags as $tag){
            $tagnames[] = $tag->tagname;
        }
        return $tagnames;
    }
}
