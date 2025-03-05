<?php

namespace App\Http\Controllers;

use App\Repositories\BugRepository;
use App\Repositories\ProjectRepository;
use Inertia\Inertia;
use Inertia\Response;

class ReportsController extends Controller
{
    protected ProjectRepository $projectRepository;
    protected BugRepository $bugRepository;

    public function __construct(ProjectRepository $projectRepository, BugRepository $bugRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->bugRepository = $bugRepository;
    }

    /**
     * Display an overview report.
     */
    public function index(): Response
    {
        return Inertia::render('Reports/Index', [
            'bugStats' => $this->bugRepository->getBugStatistics(),
            'projectStats' => $this->projectRepository->getProjectStatistics(),
        ]);
    }
}
