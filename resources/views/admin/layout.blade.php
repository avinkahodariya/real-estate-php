<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content='{{ __('message.System Name') }}' name="description" />
    <meta content='{{ __('message.System Name') }}' name="author" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:title" content='{{ __('message.System Name') }}' />
    <meta property="og:image" content="{{ Session::get('favicon') }}" />
    <meta property="og:image:width" content="250px" />
    <meta property="og:image:height" content="250px" />
    <meta property="og:site_name" content='{{ __('message.System Name') }}' />
    <meta property="og:description" content='{{ __('message.meta_description') }}' />
    <meta property="og:keyword" content='{{ __('message.Meta Keyword') }}' />
    <link href="{{ asset('public/admin_design/layouts/vertical/assets/libs/dropzone/min/dropzone.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ Session::get('favicon') }}" />
    <link href="{{ asset('public/admin_design/layouts/vertical/assets/css/bootstrap.min.css') }}" id="bootstrap-style"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/admin_design/layouts/vertical/assets/css/icons.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet"
        href="{{ asset('public/admin_design/layouts/vertical/assets/libs/twitter-bootstrap-wizard/prettify.css') }}" />


    {{-- <link href="{{asset('public/admin_design/layouts/vertical/assets/css/app-rtl.min.css')}}" id="app-style" rel="stylesheet" type="text/css" /> --}}

    <link href="{{ asset('public/admin_design/layouts/vertical/assets/css/app.min.css') }}" id="app-style"
        rel="stylesheet" type="text/css" />

    <link
        href="{{ asset('public/admin_design/layouts/vertical/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ asset('public/admin_design/layouts/vertical/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ asset('public/admin_design/layouts/vertical/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/admin_design/layouts/vertical/assets/libs/select2/css/select2.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" />
    <style>
        .custom-btn {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: white;
        }

        .custom-text {
            color: #0d6efd;
        }

        .custom-btn:hover {
            color: white;
        }

        .mm-active .active {
            color: #0d6efd !important;
        }

        .mm-active .active i {
            color: #0d6efd !important;
        }
    </style>
</head>

<body>
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <div class="navbar-brand-box">
                        <a href="{{ url('admin/dashboard') }}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ Session::get('logo') }}" alt="" height="22" />
                            </span>
                            <span class="logo-lg">
                                <img src="{{ Session::get('logo') }}" alt="" height="20" />
                            </span>
                        </a>
                        <a href="{{ url('admin/dashboard') }}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ Session::get('logo') }}" alt="" height="22"/>
                            </span>
                            <span class="logo-lg">
                                <img src="{{ Session::get('logo') }}" alt="" height="20" />
                            </span>
                        </a>
                    </div>
                    <button type="button"
                        class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>
                <div class="d-flex">
                    <div class="dropdown d-none d-lg-inline-block ml-1">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            data-toggle="fullscreen">
                            <i class="uil-minus-path"></i>
                        </button>
                    </div>
                    {{-- <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-notifications-dropdown" data-toggle="dropdown" id="bell-button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="uil-bell"></i>
                            <span class="badge badge-danger badge-pill" id="ordercount">0</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                            aria-labelledby="page-header-notifications-dropdown" id="notificationshow">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <p class="red" id="notificationmsg"></p>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;"></div>
                            <div class="p-2 border-top"></div>
                        </div>
                    </div> --}}
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('public/upload/profile/' . (auth()->user()->profile_pic ?? 'admin.png')) }}"
                                <span
                                class="d-none d-xl-inline-block ml-1 font-weight-medium font-size-15">{{ auth()->user()->name ?? 'Admin' }}</span>
                            <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('admin/editprofile') }}"><i
                                    class="uil uil-user-circle font-size-18 align-middle text-muted mr-1"></i> <span
                                    class="align-middle">{{ __('message.View_Profile') }}</span></a>
                            <a class="dropdown-item" href="{{ url('admin/changepassword') }}"><i
                                    class="mdi mdi-key font-size-18 align-middle text-muted mr-1"></i> <span
                                    class="align-middle">{{ __('message.change_password') }}</span></a>
                            <a class="dropdown-item" href="{{ url('admin/logout') }}"><i
                                    class="uil uil-sign-out-alt font-size-18 align-middle mr-1 text-muted"></i> <span
                                    class="align-middle">{{ __('message.sign_out') }}</span></a>
                        </div>
                    </div>
                    <div class="dropdown d-inline-block"></div>
                </div>
            </div>
        </header>
        <div class="vertical-menu">
            <div class="navbar-brand-box">
                <a href="{{ url('admin/dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ Session::get('logo') }}" alt="" height="22" />
                    </span>
                    <span class="logo-lg">
                        <img src="{{ Session::get('logo') }}" alt="" height="45" />
                    </span>
                </a>
                <a href="{{ url('admin/dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ Session::get('logo') }}" alt="" height="22" />
                    </span>
                    <span class="logo-lg">
                        <img src="{{ Session::get('logo') }}" alt="" height="20" />
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <div data-simplebar class="sidebar-menu-scroll">
                <div id="sidebar-menu">
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">{{ __('message.Menu') }}</li>
                        <li>
                            <a href="{{ url('admin/dashboard') }}">
                                <i class="uil-home-alt"></i><span
                                    class="badge badge-pill badge-primary float-right"></span>
                                <span>{{ __('message.Dashboard') }}</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/category') }}" class="waves-effect">
                                <i class="uil-file"></i>
                                <span>Category</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/product') }}" class="waves-effect">
                                <i class="uil-file"></i>
                                <span>Products</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/gallery') }}" class="waves-effect">
                                <i class="uil-image"></i>
                                <span>Gallery</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/blog') }}" class="waves-effect">
                                <i class="uil-image"></i>
                                <span>Blog</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/setting') }}" class="waves-effect">
                                <i class="uil-setting"></i>
                                <span>Setting</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        @yield('content')
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        {{ date('Y') }}
                        © {{ __('message.System Name') }}
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            <i class="mdi mdi-heart text-danger"></i> {{ __('message.by') }} <a
                                href="https://themesbrand.com/" target="_blank"
                                class="text-reset">{{ __('message.System Name') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <div class="rightbar-overlay"></div>
    <input type="hidden" id="siteurl" value="{{ url('admin') }}" />
    <input type="hidden" id="delete_record" value="{{ __('message.delete_record') }}">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <input type="hidden" id="soundnotify" value="{{ asset('public/sound/notification/notification.mp3') }}" />
    <script src="{{ asset('public/admin_design/layouts/vertical/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/admin_design/layouts/vertical/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset('public/admin_design/layouts/vertical/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('public/admin_design/layouts/vertical/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('public/admin_design/layouts/vertical/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('public/admin_design/layouts/vertical/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}">
    </script>
    <script src="{{ asset('public/admin_design/layouts/vertical/assets/libs/jquery.counterup/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('public/admin_design/layouts/vertical/assets/libs/dropzone/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('public/admin_design/layouts/vertical/assets/js/app.js') }}"></script>
    <script
        src="{{ asset('public/admin_design/layouts/vertical/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}">
    </script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script
        src="{{ asset('public/admin_design/layouts/vertical/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script
        src="{{ asset('public/admin_design/layouts/vertical/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}">
    </script>
    <script
        src="{{ asset('public/admin_design/layouts/vertical/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('public/admin_design/layouts/vertical/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('public/admin_design/layouts/vertical/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('public/admin_design/layouts/vertical/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script
        src="{{ asset('public/admin_design/layouts/vertical/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}">
    </script>
    <script
        src="{{ asset('public/admin_design/layouts/vertical/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}">
    </script>
    <script
        src="{{ asset('public/admin_design/layouts/vertical/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}">
    </script>
    <script
        src="{{ asset('public/admin_design/layouts/vertical/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script
        src="{{ asset('public/admin_design/layouts/vertical/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('public/admin_design/layouts/vertical/assets/js/pages/datatables.init.js') }}"></script>
    <script src="{{ asset('public/admin_design/layouts/vertical/assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('public/admin_design/layouts/vertical/assets/js/pages/ecommerce-add-product.init.js') }}">
    </script>
    <script src="{{ url('public/js/locationpicker.js') }}"></script>
    <script
        src="{{ asset('public/admin_design/layouts/vertical/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}">
    </script>
    <script src="{{ asset('public/admin_design/layouts/vertical/assets/libs/twitter-bootstrap-wizard/prettify.js') }}">
    </script>
    <script src="{{ asset('public/admin_design/layouts/vertical/assets/js/pages/form-wizard.init.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            let table = new DataTable('#table', {
                order: [
                    [0, 'desc']
                ]
            });
        });
    </script>
    <script>
        function disablebtn() {
            alert('{{ __('message.disable_demo_msg') }}');
        }
    </script>
    @yield('footer')
</body>

</html>
