@include('layouts.header')
<link rel="stylesheet" href="{{ asset('/assets/style/css/home.css')}}">

@section('title', 'Home')

<style>
    
</style>
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    @include('layouts.nav')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('layouts.layout')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Index</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('menupage.name')}}">Menupage</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Index</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <section id="ajax-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Menu list</h4>
                                </div>
                                <div class="card-datatable">
                                    
                                    <table class="datatables-basic table">
                                        <thead>
                                            <tr>
                                                <th>Page Name</th>
                                                <th>Date</th>
                                                <th>Theme Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $counter = 1;
                                            @endphp
                                            @foreach ($pages as $page)
                                                <tr>
                                                    <td>{{$page->pagename}}</td>
                                                    <td>{{$page->updated_at}}</td>
                                                    <td>{{$page->name}}</td>
                                                    <td>
                                                        <a href="menupage/{{$page->name}}/{{$page->id}}?#" class="btn menu-edit-btn">
                                                            <i data-feather='edit'></i>
                                                        </a>
                                                        <a class="menu-remove-btn btn" data-id="{{$page->id}}">
                                                            <i data-feather='delete'></i>
                                                        </a>
                                                        <a href="/page/{{$page->name}}/{{$page->id}}" target="blank" class="menu-view-btn btn" data-id="{{$page->id}}">
                                                            <i data-feather='eye'></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('layouts.footer')
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('/app-assets/js/scripts/tables/table-datatables-menupage.js') }}"></script>
    <!-- END: Page JS-->
    <script>
        '@if (session()->has('message'))<div class="alert alert-success">' + toastr["success"]("{{ session()->get('message') }}") + '</div> @endif'
    </script>
</body>
