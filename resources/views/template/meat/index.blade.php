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
    @media only screen and (max-width: 1200px) {
        .templatecontainer, .templatecontainer-sm, .templatecontainer-md, .templatecontainer-lg, .templatecontainer-xl {
            max-width: 900px;
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
    }
    @media (max-width: 576px) {
        .templatecontainer, .templatecontainer-sm, .templatecontainer-md, .templatecontainer-lg {
            max-width: 540px;
        }
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
    /* .navbar-floating .header-navbar-shadow {
        height: 70px;
        background: #ffffff;
        -webkit-box-shadow: 0 -3px 31px 0 rgb(0 0 0 / 5%), 0 6px 20px 0 rgb(0 0 0 / 2%);
        box-shadow: 0 -3px 31px 0 rgb(0 0 0 / 5%), 0 6px 20px 0 rgb(0 0 0 / 2%);
    } */
</style>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    @include('layouts.nav')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('layouts.layout')
    <!-- END: Main Menu-->

    <div class="templatecontainer">
        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row d-flex justify-content-between align-items-center">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="content-header-title float-left mb-0" style="text-transform: capitalize;">
                                    {{ $pagename }}</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Templates</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">{{ $pagename }}</a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12 mb-2">
                        <button type="button" class="btn-outline-primary btn" id="confirm-meat-template"><i data-feather="heart"></i> USE</button>
                    </div>
                </div>
                <div class="content-body">
                <!-- Centered Aligned Tabs starts -->              
                    <div class="page-view pt-3">
                        <div>
                            <img src={{asset("/assets/images/Template/complex/temp-logo.png")}} alt="template logo" style="display: block;margin:auto;" />
                        </div>
                        <div class="mt-2" style="width: 100%;text-align: center;">
                            <div style="display: inline-block;margin:0 auto;">
                                <span><img src={{asset("/assets/images/Template/complex/left-shape.png")}} alt="left" /></span>
                                <span class="text-uppercase" style="font-weight:500;font-size: 18px;color:gray;">VORSPEISE</span>
                                <span><img src={{asset("/assets/images/Template/complex/right-shape.png")}} alt="right" /></span>
                            </div>
                        </div>
                        <table class="table mt-2">
                            <tbody class="content-tpage">
                                <tr colspan="12">
                                    <td colspan="8">
                                        <h4>GRÜNER SALAY</h4>
                                        <p></p>
                                    </td>
                                    <td colspan="4" style="text-align: right;">
                                        10.00
                                    </td>
                                </tr>
                                <tr colspan="12">
                                    <td colspan="8">
                                        <h4>GEMISCHYER SALAY</h4>
                                        <p></p>
                                    </td>
                                    <td colspan="4" style="text-align: right;">
                                        12.00
                                    </td>
                                </tr>
                                <tr colspan="12">
                                    <td colspan="8">
                                        <h4>INSALAYA DI RUCOLA E PARMIGIANO</h4>
                                        <p>RUCOLA-SALAT MIT PARMESAN UND CHERRYTOMATEN</p>
                                    </td>
                                    <td colspan="4" style="text-align: right;">
                                        14.00
                                    </td>
                                </tr>
                                <tr colspan="12">
                                    <td colspan="8">
                                        <h4>INSALAYA CAPRESE YOMAYEN UND MOZZARELLA</h4>
                                        <p></p>
                                    </td>
                                    <td colspan="4" style="text-align: right;">
                                        14.00
                                    </td>
                                </tr>
                                <tr colspan="12">
                                    <td colspan="8">
                                        <h4>INSALAYA CAPRESE YOMAYEN UND MOZZARELLA</h4>
                                        <p></p>
                                    </td>
                                    <td colspan="4" style="text-align: right;">
                                        16.00
                                    </td>
                                </tr>
                                <tr colspan="12">
                                    <td colspan="8">
                                        <h4>INSALAYA CAPRESE CON BURRAYA</h4>
                                        <p></p>
                                    </td>
                                    <td colspan="4" style="text-align: right;">
                                        16.00
                                    </td>
                                </tr>
                                <tr colspan="12">
                                    <td colspan="8">
                                        <h4>INSALAYA CAPRESE CON BURRAYA</h4>
                                        <p></p>
                                    </td>
                                    <td colspan="4" style="text-align: right;">
                                        16.00
                                    </td>
                                </tr>
                                <tr colspan="12">
                                    <td colspan="8">
                                        <h4>GEGRILLYES GEMÜSE MIY BURRAYA</h4>
                                        <p></p>
                                    </td>
                                    <td colspan="4" style="text-align: right;">
                                        16.00
                                    </td>
                                </tr>
                        
                            </tbody>
                        </table>
                    </div>
                    <div class="page-view pt-3">
                        <div class="mt-2" style="width: 100%;text-align: center;">
                            <div style="display: inline-block;margin:0 auto;">
                                <span><img src={{asset("/assets/images/Template/complex/left-shape.png")}} alt="left" /></span>
                                <span class="text-uppercase" style="font-weight:500;font-size: 18px;color:gray;">FISCH</span>
                                <span><img src={{asset("/assets/images/Template/complex/right-shape.png")}} alt="right" /></span>
                            </div>
                        </div>
                        <table class="table mt-2">
                            <tbody class="content-tpage">
                                <tr colspan="12">
                                    <td colspan="8">
                                        <h4>WOLFBARSCH-FILEY</h4>
                                        <p>MIT OLIVENÖL, ZITRONETTE UND BEILAGE</p>
                                    </td>
                                    <td colspan="4" style="text-align: right;">
                                        10.00
                                    </td>
                                </tr>
                                <tr colspan="12">
                                    <td colspan="8">
                                        <h4>VARIAYION GEBRAYENER FISCH</h4>
                                        <p>MIT BEILAGE</p>
                                    </td>
                                    <td colspan="4" style="text-align: right;">
                                        12.00
                                    </td>
                                </tr>
                                <tr colspan="12">
                                    <td colspan="8">
                                        <h4>YAGES FISCH</h4>
                                        <p></p>
                                    </td>
                                    <td colspan="4" style="text-align: right;">
                                        14.00
                                    </td>
                                </tr>
                                <tr colspan="12">
                                    <td colspan="8">
                                        <h4>GAMBERO ROSSO ALL‘AGLIO E PEPERONCINO</h4>
                                        <p>ROTE GARNELEN (ARGENTINIEN), KNOBLAUCH UND SCHARFE PAPRIKA</p>
                                    </td>
                                    <td colspan="4" style="text-align: right;">
                                        14.00
                                    </td>
                                </tr>
                        
                            </tbody>
                        </table>
                    </div>
                <!-- Centered Aligned Tabs ends -->
                </div>
            </div>
        </div>
        <!-- END: Content-->
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('layouts.footer')
    
</body>
