<?php

namespace App\Repositories;

use App\Models\Bug;

class BugRepository
{
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

    public function getBugStatistics()
    {
        return [
            'total' => Bug::count(),
            'reported' => Bug::where('status', 'reported')->count(),
            'started' => Bug::where('status', 'started')->count(),
            'in_progress' => Bug::where('status', 'in_progress')->count(),
            'closed' => Bug::where('status', 'closed')->count(),
        ];
    }
}
