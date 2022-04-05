<div class="bg-primary py-3 px-3 mt-5">
    <div class="row">
        <form action="{{$route}}" class="lf-filter-form form-inline" method="get">
            @if(is_array($orderFields))
                <div class="col-md-{{$isDateFilterable ? '3' : '6'}}">
                    <div class="form-group clearfix">
                        <div class="lf-select">
                            <select class="form-control lf-filter-sort-by" name="{{$paginationKey}}_sort">
                                <option value="">{{ __('Sort by') }}</option>
                                @foreach($orderFields as $ofKey => $ofVal)
                                    <option
                                        value="{{$ofKey}}" {{return_get($paginationKey.'_sort',$ofKey)}}>{{$ofVal[1]}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="lf-select">
                            <select class="form-control lf-filter-order-by" name="{{$paginationKey}}_ord">
                                <option value="d"{{return_get($paginationKey.'_ord','d')}}>{{ __('Desc') }}</option>
                                <option value="a"{{return_get($paginationKey.'_ord','a')}}>{{ __('Asc') }}</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
            @endif

            @if($isDateFilterable)
                <div class="col-md-3">
                    <div class="form-group clearfix">
                        <input type="text" class="form-control lf-filter-from-date datepicker"
                               name="{{$paginationKey}}_frm"
                               placeholder="From date"
                               value="{{return_get($paginationKey.'_frm')}}">
                        <input type="text" class="form-control lf-filter-to-date datepicker"
                               name="{{$paginationKey}}_to"
                               placeholder="To date"
                               value="{{return_get($paginationKey.'_to')}}">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
            @endif
            <div
                class="col-md-{{(!is_array($orderFields) && $isDateFilterable) || (!is_array($orderFields) && !$isDateFilterable) ? '9' : '6'}} {{(!is_array($orderFields) && $isDateFilterable) || (is_array($orderFields) && !$isDateFilterable) || (is_array($orderFields) && $isDateFilterable) ? '' : 'offset-md-3'}}">
                <div class="d-flex lf-filter-search-group" style="{{$dataFilter ? 'margin-right:36px;' : ''}}">
                    @if(isset($searchFields))
                        <div class="lf-select" style="flex:3">
                            <select class="form-control" name="{{$paginationKey}}_ssf">
                                <option value="">{{ __('All Fields') }}</option>
                                @foreach($searchFields as $ssfKey => $ssfVal)
                                    <option
                                        value="{{$ssfKey}}" {{return_get($paginationKey.'_ssf',$ssfKey)}}>{{$ssfVal[1]}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="lf-select" style="flex:3">
                            <select class="form-control lf-filter-comparison-operator select-compact"
                                    name="{{$paginationKey}}_comp">
                                <option
                                    value="lk"{{return_get($paginationKey.'_comp','lk')}}>{{__('Similar to')}}</option>
                                <option value="e"{{return_get($paginationKey.'_comp','e')}}>{{__('Exact to')}}</option>
                                <option
                                    value="l"{{return_get($paginationKey.'_comp','l')}}>{{__('Smaller than')}}</option>
                                <option
                                    value="le"{{return_get($paginationKey.'_comp','le')}}>{{__('Less or equal to')}}</option>
                                <option
                                    value="m"{{return_get($paginationKey.'_comp','m')}}>{{__('Bigger Than')}}</option>
                                <option
                                    value="me"{{return_get($paginationKey.'_comp','me')}}>{{__('Bigger or Equal to')}}</option>
                                <option
                                    value="ne"{{return_get($paginationKey.'_comp','ne')}}>{{__('Not Equal')}}</option>
                            </select>
                        </div>
                    @endif
                    <div style="flex: 5; margin-right: 1%">
                        <input type="text" class="form-control lf-filter-search" name="{{$paginationKey}}_srch"
                               placeholder="search"
                               value="{{return_get($paginationKey.'_srch')}}" style="margin-right: 0 !important">
                    </div>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i></button>
                    <a href="javascript:" class="lf-filter-toggler btn btn-warning"
                       style="{{$dataFilter ? '' : 'display:none'}}"><i class="fa fa-filter"></i></a>
                </div>
            </div>
            @if(is_array(request()->input($paginationKey.'_fltr')))
                @foreach(request()->input($paginationKey.'_fltr') as $key=>$value)
                    @if(is_array($value))
                        @foreach($value as $optionKey=>$optionValue)
                            @if(!empty($optionValue) && !is_array($optionValue))
                                <input type="hidden" name="{{$paginationKey}}_fltr[{{$key}}][]"
                                       value="{{request()->input($paginationKey.'_fltr.'.$key.'.'.$optionKey)}}">
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endif
        </form>
    </div>
</div>
