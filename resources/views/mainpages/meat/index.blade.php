@include('layouts.header')
<link
    href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

@section('title', 'Home')

<style>
    body{
        background-color: #F6F5E6 !important;
    }
    td .p {
        font-size: 14px !important;
    }
    .page-view{
        background : url('{{ asset("/assets/images/Template/complex/template-background.png") }} ');
        background-repeat: no-repeat;
        background-position: center top;
        /* background-size: 100% auto; */
        height: 1000px;
    }
    .table td {
        border-top: none;
    }
    .templatecontainer, .templatecontainer-sm, .templatecontainer-md, .templatecontainer-lg, .templatecontainer-xl, .templatecontainer-xxl {
        width: calc(100% - );
        padding-right: 1rem;
        padding-left: 1rem;
        margin-right: auto;
        margin-left: auto;
    }
    .templatecontainer, .templatecontainer-sm, .templatecontainer-md, .templatecontainer-lg, .templatecontainer-xl {
        max-width: 1100px;
    }
    .table {
        width: 60%;
        margin-left: auto;
        margin-right: auto;
    }
    .table td {
        padding: 0.52rem 2rem;
    }
    h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
        margin-bottom: 0.5rem;
        font-family: inherit;
        font-weight: 500;
        line-height: 1.2;
        color: grey;
    }
    @media only screen and (max-width: 1200px) {
        .templatecontainer, .templatecontainer-sm, .templatecontainer-md, .templatecontainer-lg, .templatecontainer-xl {
            max-width: 900px;
        }
        td h4{
            font-size: 14px;
        }
        td p, td{
            font-size: 12px;
        }
    }
    @media (min-width: 768px) and (max-width: 992px) {
        .templatecontainer, .templatecontainer-sm, .templatecontainer-md, .templatecontainer-lg {
            max-width: 860px;
        }

    }
    @media (min-width: 576px) (max-width: 768px) {
        .templatecontainer, .templatecontainer-sm, .templatecontainer-md, .templatecontainer-lg {
            max-width: 720px;
        }
        td h4{
            font-size: 12px;
        }
        td p, td{
            font-size: 10px;
        }
        table.table {
            width: 100% !important;
        }
    }
    @media (max-width: 576px) {
        html body .app-content{
            padding: 0px !important;
        }
        .templatecontainer, .templatecontainer-sm, .templatecontainer-md, .templatecontainer-lg {
            max-width: 540px;
        }
        td h4{
            font-size: 12px;
        }
        td p, td{
            font-size: 10px;
        }
        .table {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }
    }
    @media (max-width: 576px) {
        td h4{
            font-size: 12px;
        }
        td p, td{
            font-size: 10px;
        }
        .table {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }
    }
   
    
</style>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">
    <div class="templatecontainer">
        <!-- BEGIN: Content-->
        <div class="app-content content m-0">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <!-- Centered Aligned Tabs starts -->
                @foreach ($categories as $category)                                 
                    <div class="page-view pt-3">
                        @if ($loop->index == 0) 
                            <div>
                                <img src={{asset("/assets/images/Template/complex/temp-logo.png")}} alt="template logo" style="display: block;margin:auto;" />
                            </div>
                        @endif
                        <div class="mt-2" style="width: 100%;text-align: center;">
                            <div style="display: inline-block;margin:0 auto;">
                                <span><img src={{asset("/assets/images/Template/complex/left-shape.png")}} alt="left" /></span>
                                <span class="text-uppercase" style="font-weight:500;font-size: 18px;color:gray;">{{$category->name}}</span>
                                <span><img src={{asset("/assets/images/Template/complex/right-shape.png")}} alt="right" /></span>
                            </div>
                        </div>
                        <table class="table mt-2">
                            <tbody class="content-tpage">
                                @foreach ($category->contents as $content)
                                    <tr>
                                        <td>
                                            <h4 id="content-title-{{$content->id}}">{{$content->title}}</h4>
                                            <p id="content-desc-{{$content->id}}">{{$content->description}}</p>
                                        </td>
                                        <td style="text-align: right;" id="content-num-{{$content->id}}">
                                            {{$content->number}}
                                        </td>
                                    </tr>
                            
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
                <!-- Centered Aligned Tabs ends -->
            </div>
        </div>
        <!-- END: Content-->
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('layouts.footer')
    
</body>
