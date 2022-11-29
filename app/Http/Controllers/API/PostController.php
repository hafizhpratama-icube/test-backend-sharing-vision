<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Posts;
use App\Http\Resources\Posts as PostsResource;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PostController extends BaseController
{

    public function index()
    {
        $post = Posts::all();
        return $this->sendResponse(PostsResource::collection($post), 'Posts fetched.');
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required|unique:posts|min:20',
            'content' => 'required|min:200',
            'category' => 'required|min:3',
            'status' => 'required|in:publish,draft,trash'
        ]);
        
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $post = Posts::create($input);
        return $this->sendResponse(new PostsResource($post), 'Post created.');
    }

   
    public function show($id)
    {
        $post = Posts::find($id);
        if (is_null($post)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new PostsResource($post), 'Post fetched.');
    }

    public function multiple($limit, $offset)
    {
        $post = DB::table('posts')->skip($limit)->take($offset)->get();
        if (empty($post[0])) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(PostsResource::collection($post), 'Posts fetched.');
    }
    

    public function update($id, Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'min:20',
            'content' => 'min:200',
            'category' => 'min:3',
            'status' => 'in:publish,draft,trash'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $post = Posts::find($id);

        $post->title = $input['title'];
        $post->content = $input['content'];
        $post->category = $input['category'];
        $post->status = $input['status'];
        $post->save();
        
        return $this->sendResponse(new PostsResource($post), 'Post updated.');
    }
   
    public function destroy($id)
    {
        $post = Posts::find($id);
        $post->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}