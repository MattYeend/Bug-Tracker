<?php

namespace App\Repositories;

use App\Models\Bug;

class BugRepository
{
    public function __construct()
    {
        //
    }

    public function all()
    {
        return Bug::with('project', 'user')->get();
    }

    public function find($id)
    {
        return Bug::findOrFail($id);
    }

    public function create(array $data)
    {
        return Bug::create($data);
    }

    public function update(Bug $bug, array $data)
    {
        $bug->update($data);
        return $bug;
    }

    public function delete(Bug $bug)
    {
        return $bug->delete();
    }
}
