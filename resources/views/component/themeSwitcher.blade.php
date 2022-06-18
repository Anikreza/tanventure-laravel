<li class="menu-item text-secondary has-sub" >
    <a style="cursor: pointer" id="theme-toggle">
       <span style="color: #888888">
{{--         <i class="fa fa-{{ $theme == 'dark' ? 'sun' : 'moon' }}" style="font-size: 35px; " aria-hidden="true"></i>--}}
           {{ $theme == 'dark' ? trans('general.light') :trans('general.dark') }}
       </span>
    </a>
</li>

{{--<li class="text-secondary">--}}
{{--    <a class="ml-1 underline ml-2 mr-2" style="cursor: pointer">--}}
{{--        <span  id="theme-toggle">--}}
{{--           {{ $theme == 'dark' ? trans('general.light') : trans('general.dark')}}--}}
{{--          <i class="fa fa-caret-right" aria-hidden="true"></i>--}}
{{-- </span>--}}
{{--    </a>--}}
{{--</li>--}}

{{--<li class="menu-item text-secondary has-sub">--}}
{{--    <a style="cursor: pointer" id="theme-toggle">--}}
{{--        {{ __('navbar.changeTheme') }}--}}
{{--       <span>--}}
{{--         <i class="fa fa-caret-right" aria-hidden="true"></i>--}}
{{--       </span>--}}
{{--    </a>--}}
{{--</li>--}}


{{--<li class="menu-item  has-sub">--}}
{{--    <a class="menu-link nav-link active menu-toggle ">{{ __('navbar.changeTheme') }} <i class="fa fa-caret-down"></i></a>--}}
{{--    <ul class="menu-sub menu-drop">--}}
{{--        <li class="menu-item text-secondary has-sub" style="transform:rotate(-10deg);"  id="theme-toggle">--}}
{{--            <a style="cursor: pointer" >--}}
{{--       <span>--}}
{{--         <i class="fa fa-{{ $theme == 'dark' ? 'sun' : 'moon' }}" aria-hidden="true"></i>--}}
{{--       </span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}

