<?php

namespace App\Http\Controllers\Core;


use App\Http\Controllers\Controller;
use Codemen\Installer\Services\DatabaseService;
use Illuminate\Http\Request;

class TestSeederController extends Controller
{

    /**
     * @var DatabaseService
     */
    private $databaseService;

    public function __construct(DatabaseService $databaseService)
    {

        $this->databaseService = $databaseService;
    }

    public function view($type, $routeConfig)
    {
        $title = __('Test Seeding');
        return view('vendor.installer.seeding',
            compact(
                'type',
                'routeConfig',
                'title'
            )
        );
    }

    public function store(Request $request)
    {
        $type = $request->route('types');
        set_time_limit(120);
        $response = $this->databaseService->testSeed();
        return redirect()->route('installer.types', $type)->with(compact('response'));
    }

}

