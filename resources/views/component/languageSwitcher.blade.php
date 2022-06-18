<li  style="transform:rotate(-10deg)" class="text-secondary">
    <a class="ml-1 underline ml-2 mr-2" href={{app()->getLocale()=='bn'?"/language/en":"/language/bn"}}>
        <span style="font-family: 'Segoe UI Symbol'; font-size: 2vh">{{app()->getLocale()=='bn'?'ENGLISH' :'বাংলায় পড়ুন'}}
          <i class="fa fa-caret-right" aria-hidden="true"></i>
 </span>
    </a>
</li>

{{--<div class="globalLanguageSwitcher">--}}
{{--    <li class="">--}}
{{--        <a class="ml-1 underline ml-2 mr-2" href={{app()->getLocale()=='bn'?"/language/en":"/language/bn"}}>--}}
{{--            <span style="font-size: 1.5vh">{{app()->getLocale()=='bn'?'Get English Version' :'বাংলায় পড়ুন'}}</span>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--</div>--}}

{{--<li class="menu-item  has-sub">--}}
{{--    <a class="menu-link nav-link active menu-toggle">{{ __('navbar.changeLang') }} <i class="fa fa-caret-down"></i></a>--}}
{{--    <ul class="menu-sub menu-drop">--}}
{{--            <li class="menu-item has-sub">--}}
{{--                <a class="ml-1 underline ml-2 mr-2" href={{app()->getLocale()=='en'?'#':"/language/en"}}>--}}
{{--                    <span style="font-size: 1.7vh"> English</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        <li class="menu-item has-sub">--}}
{{--            <a class="ml-1 underline ml-2 mr-2" href={{app()->getLocale()=='bn'?'#':"/language/bn"}}>--}}
{{--                <span style="font-size: 1.7vh"> বাংলা</span>--}}
{{--            </a>--}}
{{--            </li>--}}
{{--    </ul>--}}
{{--</li>--}}
