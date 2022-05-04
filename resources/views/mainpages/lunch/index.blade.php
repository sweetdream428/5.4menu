@include('layouts.header')
<link
    href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

@section('title', 'Home')

<style>
    td .p {
        font-size: 14px !important;
    }
</style>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">
    <div class="container">
        <!-- BEGIN: Content-->
        <div class="app-content content m-0">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-body">
                    <section id="nav-tabs-aligned">
                        <div class="row match-height">
                            <!-- Centered Aligned Tabs starts -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                                            @foreach ($categories as $category)
                                                <li class="nav-item">
                                                    <a class="nav-link {{$category->id == $firstid ? 'active' : ''}}" id="tab-category-{{$category->id}}" data-toggle="tab" href="#category-{{$category->id}}" aria-controls="category-{{$category->id}}" role="tab" aria-selected="true">
                                                        {{$category->name}}
                                                    </a>
                                                </li>
                                            @endforeach
                                            
                                        </ul>
                                        <div class="tab-content mt-3">
                                            @foreach ($categories as $category)
                                                <div class="tab-pane {{$category->id == $firstid ?'active' : ''}}" id="category-{{$category->id}}" role="tabpanel">
                                                    <p>
                                                        <h2 id="content-all-title-{{$category->id}}">{{$category->name}}</h2>
                                                    </p>

                                                    <table class="table">
                                                        <tbody class="content-tpage">
                                                            @foreach ($category->contents as $content)
                                                                <tr>
                                                                    <td>
                                                                        <h4 id="content-title-{{$content->id}}">{{$content->title}}</h4>
                                                                        <p id="content-desc-{{$content->id}}">{{$content->description}}</p>
                                                                    </td>
                                                                    <td id="content-num-{{$content->id}}">{{$content->number}}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endforeach                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Centered Aligned Tabs ends -->
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- END: Content-->
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('layouts.footer')
    
</body>
