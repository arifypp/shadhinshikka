<nav class="navbar navbar-expand-lg">
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <button class="menu toggle-btn d-block d-lg-none" data-target="#themefie_main_menu" 
            aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-left"></span>
                <span class="icon-right"></span>
            </button>
        </div>
        <div class="logo">
            <a class="main-logo" href="{{ route('home') }}"><img src="{{ '/storage/'.LOGO_PATH.config('settings.logo') }}" alt="Logo"></a>
        </div>
        <div class="nav-right-part nav-right-part-mobile">
            <ul>
                <li><a class="search header-search" href="#"><i class="fa fa-search"></i></a></li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="themefie_main_menu">
            <div class="single-input-wrap">
                <input type="text" placeholder="Search your best courses">
                <button><i class="fa fa-search"></i></button>
            </div>
            <ul class="navbar-nav menu-open text-end">
                <li class="current-menu-item">
                    <a href="{{ route('home') }}">হোম পেইজ</a>
                </li>
               
                <li>
                    <a href="{{ route('TeacherLoginForm') }}">শিক্ষক হতে চান?</a>
                </li>
            </ul>
        </div>
        <div class="nav-right-part nav-right-part-desktop">
            <ul>
                <li class="right-search">
                    <a href="#"><i class="fa fa-search"></i></a>
                    <div class="single-input-wrap">
                        <input type="text" placeholder="Search your best courses">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </li>
                <li><a href="#"><i class="fa fa-shopping-basket"></i></a></li>
                <li><a href="{{ route('userlogin') }}">লগ ইন</a></li>
                <li>
                    <a href="{{ route('Student.Registerform') }}" class="btn btn-base-light">
                        সাইন আপ
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>