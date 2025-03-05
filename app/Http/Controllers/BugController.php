<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBugRequest;
use App\Http\Requests\UpdateBugRequest;
use App\Repositories\BugRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class BugController extends Controller
{
    protected $repo;
    protected $projectRepo;

    public function __construct(
        BugRepository $repo, 
        ProjectRepository $projectRepo
    ) {
        $this->repo = $repo;
        $this->projectRepo = $projectRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $bugs = $this->repo->all();
        return Inertia::render('Bugs/Index', ['bugs' => $bugs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $projects = $this->projectRepo->all();
        return Inertia::render('Bugs/Create', ['projects' => $projects]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBugRequest $request): RedirectResponse
    {
        $this->repo->create($request->validated());
        return redirect()
            ->route('bugs.index')
            ->with('success', 'Bug reported successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): Response
    {
        $bug = $this->repo->find($id);
        return Inertia::render('Bugs/Show', ['bug' => $bug]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): Response
    {
        $bug = $this->repo->find($id);
        $projects = $this->projectRepo->all();
        return Inertia::render(
            'Bugs/Edit',
            ['bug' => $bug, 'projects' => $projects]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBugRequest $request, $id): RedirectResponse
    {
        $bug = $this->repo->find($id);
        $this->repo->update($bug, $request->validated());

        return redirect()
            ->route('bugs.index')
            ->with('success', 'Bug updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $bug = $this->repo->find($id);
        $this->repo->delete($bug);

        return redirect()->route('bugs.index')->with('success', 'Bug deleted.');
    }
}
