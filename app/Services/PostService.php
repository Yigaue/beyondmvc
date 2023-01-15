<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostService implements PostRepository
{
    /**
     * Create  a new post resource
     * @param Request $request
     * @return array
     */
    public function create($request)
    {
        $post = Post::make(
            ['id' => rand(1, 100),
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'created_at' => $request->created_at]
        );

        return ['post' => $post];
    }

    /**
     * Update a post resource
     * @param Request $request
     * @param  int $id
     * @return array
     */
    public function update($request, $id)
    {
        //
    }

    /**
     * Get a single resource
     * @param int $id
     * @return array
     */
    public function findOneById($id)
    {
        //
    }

    /**
     * Delete a resource using the Id
     * @param int $id
     * @return array
     */
    public function deleteOneById($id)
    {
        //
    }
}
