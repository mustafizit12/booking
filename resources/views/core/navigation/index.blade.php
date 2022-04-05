@extends('layouts.master')
@section('title', $title)
@section('style')
    <link rel="stylesheet" href="{{mix('css/menu-builder.css')}}">
@endsection
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-outline card-info mb-4" style="box-shadow: 0 0 5px rgba(0,0,0,0.1)">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">{{ __('Select Nav') }}</h5>
                    </div>
                    <div class="card-body">
                    <nav class="nav nav-pills flex-column">
                        @foreach($navigationPlaces as $navigationPlace)
                            <a class="nav-link {{ $slug == $navigationPlace ? 'active bg-info' : '' }}"
                               href="{{route('menu-manager.index',$navigationPlace)}}">{{ucfirst(str_replace('-',' ',$navigationPlace))}}</a>
                        @endforeach
                    </nav>
                    </div>
                </div>


                <div class="card card-outline card-info mb-4" style="box-shadow: 0 0 5px rgba(0,0,0,0.1)">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">{{ __('Add Routes') }}</h5>
                    </div>
                    <div class="card-body" style="overflow: hidden">
                    <div style="margin:-12px -10px 12px; border-bottom: 1px solid #ced4da;padding:10px;">
                        <input id="search-route" type="text" class="form-control" placeholder="search"
                               style="box-shadow: none !important; padding: 5px 8px;border-radius: 0; font-size: 14px;">
                    </div>
                    <?php $count=1; ?>
                    <div id="all-routes" style="overflow-y: scroll; overflow-x:hidden; max-height: 150px; margin: -11px -21px -11px -9px;"
                         data-name="Unnamed">
                        @foreach($allRoutes as $routeName => $routeData)
                            @if(is_null($routeData->getName()))
                                @continue
                            @endif
                            @php
                                $middleware = $routeData->middleware();
                                $parameters = $routeData->signatureParameters();
                                $isMenuable = true;
                            @endphp
                            @if(is_array($middleware) && count(array_intersect($middleware,['permission','guest.permission','verification.permission','menuable']))>0)
                                @foreach($parameters as $parameter)
                                    @if(!$parameter->isOptional())
                                        @php($isMenuable = false)
                                        @break
                                    @endif
                                @endforeach
                            @else
                                @php($isMenuable = false)
                            @endif
                            @if($isMenuable)
                                <?php
                                $route = explode('/{', $routeName)[0];
                                if ($route == '/' || $route == '' || strlen($route) == 2) {
                                    $route = 'home';
                                } else {
                                    if (strpos($route, '/') == 2) {
                                        $route = substr($route, 3);
                                    }
                                    $route = strtolower(str_replace('/', ' - ', str_replace('-', ' ', $route)));
                                }
                                ?>
                                <div class="checkbox lf-checkbox">
                                    <input id="checkbox-route-{{$count}}" type="checkbox" class="flat-red route-check-box" value="{{$routeData->getName()}}">
                                    <label for="checkbox-route-{{$count}}" style="margin-bottom: 0">{{$route}}</label>
                                </div>
                                <?php $count++; ?>
                            @endif
                        @endforeach
                    </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-block btn-sm btn-info" id="add-route">{{ __('Add Route') }}</button>
                    </div>
                </div>

                <div class="card card-outline card-info" style="box-shadow: 0 0 5px rgba(0,0,0,0.1)">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">{{ __('Add LINK') }}</h5>
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                        <input type="text" id="link-data" placeholder="Enter url" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" data-name="Unnamed" id="link-name" placeholder="Enter Menu Item Name"
                               class="form-control">
                    </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-block btn-sm btn-info" id="add-link">{{ __('Add A custom Link') }}</button>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card card-outline card-info">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">{{ __('Menu Items') }}</h5>
                    </div>
                    <div class="card-body">
                    {{ Form::open(['route'=>['menu-manager.save', $slug], 'method'=>'post','id'=>'menu-form']) }}
                    <div style="overflow:hidden; width:100%;">
                        {{ $menu }}
                    </div>
                    <button id="form-submit-button" type="submit" style="display:none">{{ __('Save Menu') }}</button>
                    {{ Form::close() }}
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-info menu-submit">{{ __('Save Menu') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('plugins/jQueryUI/jquery-ui.min.js')}}"></script>
    <script src="{{asset('plugins/menu_manager/jquery.mjs.nestedSortable.js')}}"></script>
    <script src="{{asset('plugins/menu_manager/adminmenuhandler.js')}}"></script>
@endsection
