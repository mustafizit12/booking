<?php

namespace App\Http\Controllers\Core;


use App\Services\User\UserService;
use Codemen\Installer\Requests\FormRequest;
use Codemen\Installer\Services\FormGenerator;
use Exception;

class SuperAdminController extends Controller
{

    public function view($type, $routeConfig)
    {
        $route = route('installer.types.store', $type);
        $form = app(FormGenerator::class)->generate($routeConfig['fields'], $route);
        $title = __('Super Admin Configuration');
        return view('vendor.installer.environment',
            compact(
                'type',
                'routeConfig',
                'form',
                'title'
            )
        );
    }

    public function store(FormRequest $request)
    {
        $routeConfig = $request->getRouteConfig();
        $params = $request->validated();
        $params['is_email_verified'] = 1;
        $params['is_financial_active'] = 1;
        $params['is_accessible_under_maintenance'] = 1;
        $params['is_active'] = 1;
        $params['role_id'] = 1;
        try {
            app(UserService::class)->generate($params);
        } catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

        return redirect()->route($routeConfig['next_route']['name'], $routeConfig['next_route']['parameters']);
    }

}
