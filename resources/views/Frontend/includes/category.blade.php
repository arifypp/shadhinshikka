<div class="category-responsive d-xl-none d-block">
        <div class="container">
            <div class="category-slider owl-carousel">
                @foreach($categories as $key => $category)
                <div class="item"><a href="category.html">{{ $category->name }}</a></div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="category-navbar navbar-area d-xl-block d-none">
        <nav class="navbar navbar-expand-lg">
            <div class="container nav-container">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav menu-open">
                        @foreach($categories as $key => $category)
                        <li>
                            <a href="{{ __($category->slug) }}">{{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </div>