<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface PostRepository
{
    /**
     * Create  a new post resource
     * @param Request $request
     * @return array
     */
    public function create(Request $request);

    /**
     * Update a post resource
     * @param Request $request
     * @param  int $id
     * @return array
     */
    public function update($request, $id);

    /**
     * Get a single resource
     * @param int $id
     * @return array
     */
    public function findOneById($id);

    /**
     * Delete a resource using the Id
     * @param int $id
     * @return array
     */
    public function deleteOneById($id);
}
