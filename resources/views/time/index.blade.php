@include('layouts.header')

@section('title', 'Restaurant')

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
                                    @foreach ($contents as $content)
                                        <li class="breadcrumb-item"><a href="#">Time</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">{{$content->title}}</a>
                                        </li>
                                    @endforeach
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
                                    <h4 class="card-title">Restaurant</h4>
                                    <button type="button" class="btn btn-add-res btn-primary"><i data-feather='plus'></i> &nbsp;ADD</button>
                                </div>
                                <div class="card-datatable">
                                   
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
    
    <!-- END: Page JS-->
    <script>
        
    </script>
</body>
