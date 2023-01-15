<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public $postRepository;
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'string|required',
            'author' => 'string|required',
            'created_at' => 'required|date'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        return $this->postRepository->create($request);
    }
}
