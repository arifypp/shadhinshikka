<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">অ্যাপ্লিকেশন মেনু</li>

                <li>                    
                    <a href="{{ route('user.dashboard') }}" class="waves-effect">
                        <span key="t-dashboards">{{ __('ড্যাশবোর্ড') }}</span>
                    </a>   
                </li>
                
                <li class="menu-title" key="t-apps">{{ __('ফিচারড মেনু') }}</li>

                <li>
                    <a href="{{ url('/sschat') }}" class="waves-effect">
                        <i class="bx bx-chat"></i>
                        <span key="t-chat">{{ __('ম্যাসেন্জার') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('trans.manage') }}" class="waves-effect">
                        <i class="bx bx-wallet"></i>
                        <span key="t-wallet">{{ __('ট্রাজেন্কশন লিস্ট') }}</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="bx bx-play"></i>
                        <span key="t-wallet">{{ __('কোর্স সমূহ') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('resource.codetools') }}" class="waves-effect">
                        <i class="bx bx-code"></i>
                        <span key="t-tools">{{ __('রিসোর্স টুলস্') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('calendar') }}" class="waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span key="t-events">{{ __('ইভেন্টস') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('#') }}" class="waves-effect">
                        <i class="bx bx-alarm"></i>
                        <span key="t-notice">{{ __('নোটিশ') }}</span>
                    </a>
                </li>

                <li class="menu-title" key="t-menu">Follow {{config('settings.title')}}</li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="bx bxl-facebook"></i>
                        <span key="t-facebook">{{ __('Facebook Porfile') }}</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="bx bxl-facebook"></i>
                        <span key="t-facebookpage">{{ __('Facebook Page') }}</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="bx bxl-youtube"></i>
                        <span key="t-youtube">{{ __('Youtube') }}</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="bx bxl-linkedin-square"></i>
                        <span key="t-linkedin">{{ __('LinkdeIn') }}</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="bx bxl-twitter"></i>
                        <span key="t-twitter">{{ __('Twitter') }}</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
