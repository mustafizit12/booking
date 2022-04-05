</div>
@if(!isset($headerLess) || !$headerLess)
    @if(in_array(settings('navigation_type'), [1,2]))
        @include('layouts.includes.side_nav')
    @endif
@endif
<!-- Flash Message -->
@include('errors.flash_message')

<!-- REQUIRED SCRIPTS -->
@yield('script-top')
<!-- jQuery -->
<script src="{{ asset('js/app.js') }}"></script>
@if(!isset($headerLess) || !$headerLess)
<script src="{{ asset('plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<script src="{{ asset('plugins/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('plugins/slicknav/slicknav.min.js') }}"></script>
<!-- Select2 JavaScript -->
<script src="{{ asset('plugins/select2/js/select2.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
@endif
@yield('extra-script')
<script src="{{ asset('js/custom.js') }}"></script>

@yield('script')

</body>
</html>
