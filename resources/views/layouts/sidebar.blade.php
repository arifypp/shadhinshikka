<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">অ্যাপ্লিকেশন মেনু</li>

                <li>
                    @if( Auth::user()->role == 'admin' )
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <span key="t-dashboards">ড্যাশবোর্ড</span>
                    </a>
                    @elseif( Auth::user()->role == 'teacher' )
                    <a href="{{ route('teacher.dashboard') }}" class="waves-effect">
                        <span key="t-dashboards">ড্যাশবোর্ড</span>
                    </a>
                    @elseif( Auth::user()->role == 'student' )
                    <a href="{{ route('user.dashboard') }}" class="waves-effect">
                        <span key="t-dashboards">ড্যাশবোর্ড</span>
                    </a>
                    @endif
                    
                </li>

                <!--#### Admin Panel ####-->
                @if( Auth::user()->role == 'admin' )
                <li class="menu-title" key="t-apps">প্লাটফর্ম ফিচারড</li>

                <!-- Category Manage -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-move"></i>
                        <span key="t-category">কোর্স ক্যাটাগরি</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('category.manage') }}" key="t-category-manage">ম্যানেজ ক্যাটাগরি</a></li>
                        </li>
                        <li><a href="{{ route('category.create') }}" key="t-category-create">ক্যটাগরি তৈরি করুন</a></li>
                        </li>
                    </ul>
                </li>

                <!-- Skills Manage -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-palette"></i>
                        <span key="t-skills">স্কিল সেটিং</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('skills.manage') }}" key="t-skills-manage">ম্যানেজ স্কিল</a></li>
                        </li>
                        <li><a href="{{ route('skills.create') }}" key="t-skills-create">স্কিল তৈরি করুন</a></li>
                        </li>
                    </ul>
                </li>

                <!-- Payment Progress Manage -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-money"></i>
                        <span key="t-payment">রিকুয়েস্ট পেমেন্ট</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('progress.pending') }}" key="t-payment-manage">রিকুয়েস্ট পেমেন্ট</a></li>
                        </li>
                        <li><a href="{{ route('progress.manage') }}" key="t-payment-create">এ্যাপ্রুভ পেমেন্ট</a></li>
                        </li>
                    </ul>
                </li>

                <!-- Course Manage -->                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-play"></i>
                        <span key="t-course">কোর্স সেটিংস</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('course.manage') }}" key="t-course-manage">ম্যানেজ কোর্স</a></li>
                        </li>
                        <li><a href="{{ route('course.create') }}" key="t-course-create">কোর্স তৈরি করুন</a></li>
                        </li>
                    </ul>
                </li>

                <!-- Courses Resource -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-book"></i>
                        <span key="t-course">কোর্স রিসোর্স</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('resource.manage') }}" key="t-course-manage">ম্যানেজ রিসোর্স</a></li>
                        </li>
                        <li><a href="{{ route('resource.create') }}" key="t-course-create">অ্যাড রিসোর্স</a></li>
                        </li>
                    </ul>
                </li>

                <!-- Code resources -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-code"></i>
                        <span key="t-code">কোড রিসোর্স</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('resource.toolscode') }}" key="t-code-manage">ম্যানেজ কোড</a></li>
                        </li>
                        <li><a href="{{ route('toolscode.create') }}" key="t-code-create">অ্যাড রিসোর্স</a></li>
                        </li>
                    </ul>
                </li>

                

                <!-- Teacher Settings -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-course">টিচার্স সেটিংস</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('teacher.manage') }}" key="t-teacers-manage">শিক্ষকের লিস্ট</a></li>
                        </li>
                        <li><a href="{{ route('teacher.create') }}" key="t-teacers-create"> শিক্ষক তৈরি করুন</a></li>
                        </li>
                    </ul>
                </li>

                 <!-- Student Settings -->
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-users"></i>
                        <span key="t-course">শিক্ষার্থী সেটিংস</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('student.manage') }}" key="t-student-manage">শিক্ষার্থীদের লিস্ট</a></li>
                        </li>
                        <li><a href="{{ route('student.create') }}" key="t-student-create"> শিক্ষার্থী তৈরি করুন</a></li>
                        </li>
                    </ul>
                </li>

                <!-- Announcement -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-bell"></i>
                        <span key="t-notice">নোটিশ সেটিং</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('notice.manage') }}" key="t-list-notice">নোটিশ লিস্ট</a></li>
                        </li>
                        <li><a href="{{ route('notice.create') }}" key="t-send-notice">সেন্ড নোটিশ</a></li>
                        </li>
                    </ul>
                </li>

                <!-- Admission settings -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-book"></i>
                        <span key="t-admission">অ্যাডমিশন সেটিং</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('manage.admission') }}" key="t-admission-manage">অ্যাডমিশন লিস্ট</a></li>
                        </li>
                        <li><a href="{{ route('pending.admission') }}" key="t-admission-pending">অ্যাডমিশন পেন্ডিং লিস্ট</a></li>
                        </li>
                    </ul>
                </li>

                <!-- Messanger settings -->
                <li>
                    <a href="{{ url('/sschat') }}" class="waves-effect">
                        <i class="bx bx-chat"></i>
                        <span key="t-chat">{{ __('ম্যাসেন্জার') }}</span>
                    </a>
                </li>

                 <!-- Basic settings -->
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-basic">ব্যাসিক সেটিং</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('manage.settings') }}" key="t-platform-settings">প্লাটফর্ম সেটিংস</a></li>
                        </li>
                        <li><a href="{{ route('manage.wallet') }}" key="t-platform-wallet">ওয়ালেট টাইপ</a></li>
                        </li>
                        
                    </ul>
                </li>
                @endif

                <li class="menu-title" key="t-apps">@lang('translation.Apps')</li>

                <li>
                    <a href="calendar" class="waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span key="t-calendar">@lang('translation.Calendar')</span>
                    </a>
                </li>

                <li>
                    <a href="chat" class="waves-effect">
                        <i class="bx bx-chat"></i>
                        <span key="t-chat">@lang('translation.Chat')</span>
                    </a>
                </li>

                <li>
                    <a href="apps-filemanager" class="waves-effect">
                        <i class="bx bx-file"></i>
                        <span class="badge rounded-pill bg-success float-end"
                            key="t-new">@lang('translation.New')</span>
                        <span key="t-file-manager">@lang('translation.File_Manager')</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">@lang('translation.Ecommerce')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ecommerce-products" key="t-products">@lang('translation.Products')</a></li>
                        <li><a href="ecommerce-product-detail"
                                key="t-product-detail">@lang('translation.Product_Detail')</a></li>
                        <li><a href="ecommerce-orders" key="t-orders">@lang('translation.Orders')</a></li>
                        <li><a href="ecommerce-customers" key="t-customers">@lang('translation.Customers')</a></li>
                        <li><a href="ecommerce-cart" key="t-cart">@lang('translation.Cart')</a></li>
                        <li><a href="ecommerce-checkout" key="t-checkout">@lang('translation.Checkout')</a></li>
                        <li><a href="ecommerce-shops" key="t-shops">@lang('translation.Shops')</a></li>
                        <li><a href="ecommerce-add-product" key="t-add-product">@lang('translation.Add_Product')</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-bitcoin"></i>
                        <span key="t-crypto">@lang('translation.Crypto')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="crypto-wallet" key="t-wallet">@lang('translation.Wallet')</a></li>
                        <li><a href="crypto-buy-sell" key="t-buy">@lang('translation.Buy_Sell')</a></li>
                        <li><a href="crypto-exchange" key="t-exchange">@lang('translation.Exchange')</a></li>
                        <li><a href="crypto-lending" key="t-lending">@lang('translation.Lending')</a></li>
                        <li><a href="crypto-orders" key="t-orders">@lang('translation.Orders')</a></li>
                        <li><a href="crypto-kyc-application" key="t-kyc">@lang('translation.KYC_Application')</a></li>
                        <li><a href="crypto-ico-landing" key="t-ico">@lang('translation.ICO_Landing')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-envelope"></i>
                        <span key="t-email">@lang('translation.Email')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="email-inbox" key="t-inbox">@lang('translation.Inbox')</a></li>
                        <li><a href="email-read" key="t-read-email">@lang('translation.Read_Email')</a></li>
                        <li>
                            <a href="javascript: void(0);">
                                <span class="badge rounded-pill badge-soft-success float-end"
                                    key="t-new">@lang('translation.New')</span>
                                <span key="t-email-templates">@lang('translation.Templates')</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="email-template-basic"
                                        key="t-basic-action">@lang('translation.Basic_Action')</a></li>
                                <li><a href="email-template-alert"
                                        key="t-alert-email">@lang('translation.Alert_Email')</a></li>
                                <li><a href="email-template-billing"
                                        key="t-bill-email">@lang('translation.Billing_Email')</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-receipt"></i>
                        <span key="t-invoices">@lang('translation.Invoices')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="invoices-list" key="t-invoice-list">@lang('translation.Invoice_List')</a></li>
                        <li><a href="invoices-detail" key="t-invoice-detail">@lang('translation.Invoice_Detail')</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-briefcase-alt-2"></i>
                        <span key="t-projects">@lang('translation.Projects')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="projects-grid" key="t-p-grid">@lang('translation.Projects_Grid')</a></li>
                        <li><a href="projects-list" key="t-p-list">@lang('translation.Projects_List')</a></li>
                        <li><a href="projects-overview" key="t-p-overview">@lang('translation.Project_Overview')</a>
                        </li>
                        <li><a href="projects-create" key="t-create-new">@lang('translation.Create_New')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-task"></i>
                        <span key="t-tasks">@lang('translation.Tasks')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tasks-list" key="t-task-list">@lang('translation.Task_List')</a></li>
                        <li><a href="tasks-kanban" key="t-kanban-board">@lang('translation.Kanban_Board')</a></li>
                        <li><a href="tasks-create" key="t-create-task">@lang('translation.Create_Task')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span key="t-contacts">@lang('translation.Contacts')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="contacts-grid" key="t-user-grid">@lang('translation.User_Grid')</a></li>
                        <li><a href="contacts-list" key="t-user-list">@lang('translation.User_List')</a></li>
                        <li><a href="contacts-profile" key="t-profile">@lang('translation.Profile')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <span class="badge rounded-pill bg-success float-end"
                            key="t-new">@lang('translation.New')</span>
                        <i class="bx bx-detail"></i>
                        <span key="t-blog">@lang('translation.Blog')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="blog-list" key="t-blog-list">@lang('translation.Blog_List')</a></li>
                        <li><a href="blog-grid" key="t-blog-grid">@lang('translation.Blog_Grid')</a></li>
                        <li><a href="blog-details" key="t-blog-details">@lang('translation.Blog_Details')</a></li>
                    </ul>
                </li>

                <li class="menu-title" key="t-pages">@lang('translation.Pages')</li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <span class="badge rounded-pill bg-success float-end"
                            key="t-new">@lang('translation.New')</span>
                        <i class="bx bx-user-circle"></i>
                        <span key="t-authentication">@lang('translation.Authentication')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login" key="t-login">@lang('translation.Login')</a></li>
                        <li><a href="auth-login-2" key="t-login-2">@lang('translation.Login') 2</a></li>
                        <li><a href="auth-register" key="t-register">@lang('translation.Register')</a></li>
                        <li><a href="auth-register-2" key="t-register-2">@lang('translation.Register') 2</a></li>
                        <li><a href="auth-recoverpw" key="t-recover-password">@lang('translation.Recover_Password')</a>
                        </li>
                        <li><a href="auth-recoverpw-2" key="t-recover-password-2">@lang('translation.Recover_Password')
                                2</a></li>
                        <li><a href="auth-lock-screen" key="t-lock-screen">@lang('translation.Lock_Screen')</a></li>
                        <li><a href="auth-lock-screen-2" key="t-lock-screen-2">@lang('translation.Lock_Screen') 2</a>
                        </li>
                        <li><a href="auth-confirm-mail" key="t-confirm-mail">@lang('translation.Confirm_Mail')</a></li>
                        <li><a href="auth-confirm-mail-2" key="t-confirm-mail-2">@lang('translation.Confirm_Mail') 2</a>
                        </li>
                        <li><a href="auth-email-verification"
                                key="t-email-verification">@lang('translation.Email_verification')</a></li>
                        <li><a href="auth-email-verification-2"
                                key="t-email-verification-2">@lang('translation.Email_verification') 2</a></li>
                        <li><a href="auth-two-step-verification"
                                key="t-two-step-verification">@lang('translation.Two_step_verification')</a></li>
                        <li><a href="auth-two-step-verification-2"
                                key="t-two-step-verification-2">@lang('translation.Two_step_verification') 2</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-utility">@lang('translation.Utility')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter" key="t-starter-page">@lang('translation.Starter_Page')</a></li>
                        <li><a href="pages-maintenance" key="t-maintenance">@lang('translation.Maintenance')</a></li>
                        <li><a href="pages-comingsoon" key="t-coming-soon">@lang('translation.Coming_Soon')</a></li>
                        <li><a href="pages-timeline" key="t-timeline">@lang('translation.Timeline')</a></li>
                        <li><a href="pages-faqs" key="t-faqs">@lang('translation.FAQs')</a></li>
                        <li><a href="pages-pricing" key="t-pricing">@lang('translation.Pricing')</a></li>
                        <li><a href="pages-404" key="t-error-404">@lang('translation.Error_404')</a></li>
                        <li><a href="pages-500" key="t-error-500">@lang('translation.Error_500')</a></li>
                    </ul>
                </li>

                <li class="menu-title" key="t-components">@lang('translation.Components')</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-tone"></i>
                        <span key="t-ui-elements">@lang('translation.UI_Elements')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts" key="t-alerts">@lang('translation.Alerts')</a></li>
                        <li><a href="ui-buttons" key="t-buttons">@lang('translation.Buttons')</a></li>
                        <li><a href="ui-cards" key="t-cards">@lang('translation.Cards')</a></li>
                        <li><a href="ui-carousel" key="t-carousel">@lang('translation.Carousel')</a></li>
                        <li><a href="ui-dropdowns" key="t-dropdowns">@lang('translation.Dropdowns')</a></li>
                        <li><a href="ui-grid" key="t-grid">@lang('translation.Grid')</a></li>
                        <li><a href="ui-images" key="t-images">@lang('translation.Images')</a></li>
                        <li><a href="ui-lightbox" key="t-lightbox">@lang('translation.Lightbox')</a></li>
                        <li><a href="ui-modals" key="t-modals">@lang('translation.Modals')</a></li>
                        <li><a href="ui-rangeslider" key="t-range-slider">@lang('translation.Range_Slider')</a></li>
                        <li><a href="ui-session-timeout"
                                key="t-session-timeout">@lang('translation.Session_Timeout')</a></li>
                        <li><a href="ui-progressbars" key="t-progress-bars">@lang('translation.Progress_Bars')</a></li>
                        <li><a href="ui-sweet-alert" key="t-sweet-alert">@lang('translation.Sweet_Alert')</a></li>
                        <li><a href="ui-tabs-accordions"
                                key="t-tabs-accordions">@lang('translation.Tabs_&_Accordions')</a></li>
                        <li><a href="ui-typography" key="t-typography">@lang('translation.Typography')</a></li>
                        <li><a href="ui-video" key="t-video">@lang('translation.Video')</a></li>
                        <li><a href="ui-general" key="t-general">@lang('translation.General')</a></li>
                        <li><a href="ui-colors" key="t-colors">@lang('translation.Colors')</a></li>
                        <li><a href="ui-rating" key="t-rating">@lang('translation.Rating')</a></li>
                        <li><a href="ui-notifications" key="t-notifications">@lang('translation.Notifications')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bxs-eraser"></i>
                        <span class="badge rounded-pill bg-danger float-end">10</span>
                        <span key="t-forms">@lang('translation.Forms')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements" key="t-form-elements">@lang('translation.Form_Elements')</a></li>
                        <li><a href="form-layouts" key="t-form-layouts">@lang('translation.Form_Layouts')</a></li>
                        <li><a href="form-validation" key="t-form-validation">@lang('translation.Form_Validation')</a>
                        </li>
                        <li><a href="form-advanced" key="t-form-advanced">@lang('translation.Form_Advanced')</a></li>
                        <li><a href="form-editors" key="t-form-editors">@lang('translation.Form_Editors')</a></li>
                        <li><a href="form-uploads" key="t-form-upload">@lang('translation.Form_File_Upload')</a></li>
                        <li><a href="form-xeditable" key="t-form-xeditable">@lang('translation.Form_Xeditable')</a></li>
                        <li><a href="form-repeater" key="t-form-repeater">@lang('translation.Form_Repeater')</a></li>
                        <li><a href="form-wizard" key="t-form-wizard">@lang('translation.Form_Wizard')</a></li>
                        <li><a href="form-mask" key="t-form-mask">@lang('translation.Form_Mask')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span key="t-tables">@lang('translation.Tables')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-basic" key="t-basic-tables">@lang('translation.Basic_Tables')</a></li>
                        <li><a href="tables-datatable" key="t-data-tables">@lang('translation.Data_Tables')</a></li>
                        <li><a href="tables-responsive"
                                key="t-responsive-table">@lang('translation.Responsive_Table')</a></li>
                        <li><a href="tables-editable" key="t-editable-table">@lang('translation.Editable_Table')</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-bar-chart-alt-2"></i>
                        <span key="t-charts">@lang('translation.Charts')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="charts-apex" key="t-apex-charts">@lang('translation.Apex_Charts')</a></li>
                        <li><a href="charts-echart" key="t-e-charts">@lang('translation.E_Charts')</a></li>
                        <li><a href="charts-chartjs" key="t-chartjs-charts">@lang('translation.Chartjs_Charts')</a></li>
                        <li><a href="charts-flot" key="t-flot-charts">@lang('translation.Flot_Charts')</a></li>
                        <li><a href="charts-tui" key="t-ui-charts">@lang('translation.Toast_UI_Charts')</a></li>
                        <li><a href="charts-knob" key="t-knob-charts">@lang('translation.Jquery_Knob_Charts')</a></li>
                        <li><a href="charts-sparkline"
                                key="t-sparkline-charts">@lang('translation.Sparkline_Charts')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-aperture"></i>
                        <span key="t-icons">@lang('translation.Icons')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="icons-boxicons" key="t-boxicons">@lang('translation.Boxicons')</a></li>
                        <li><a href="icons-materialdesign"
                                key="t-material-design">@lang('translation.Material_Design')</a></li>
                        <li><a href="icons-dripicons" key="t-dripicons">@lang('translation.Dripicons')</a></li>
                        <li><a href="icons-fontawesome" key="t-font-awesome">@lang('translation.Font_awesome')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-map"></i>
                        <span key="t-maps">@lang('translation.Maps')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maps-google" key="t-g-maps">@lang('translation.Google_Maps')</a></li>
                        <li><a href="maps-vector" key="t-v-maps">@lang('translation.Vector_Maps')</a></li>
                        <li><a href="maps-leaflet" key="t-l-maps">@lang('translation.Leaflet_Maps')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-share-alt"></i>
                        <span key="t-multi-level">@lang('translation.Multi_Level')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" key="t-level-1-1">@lang('translation.Level_1.1')</a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow"
                                key="t-level-1-2">@lang('translation.Level_1.2')</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);" key="t-level-2-1">@lang('translation.Level_2.1')</a>
                                </li>
                                <li><a href="javascript: void(0);" key="t-level-2-2">@lang('translation.Level_2.2')</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
