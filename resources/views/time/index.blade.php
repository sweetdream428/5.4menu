@include('layouts.header')

@section('title', 'Restaurant')

<style>
    .switch {
        position: relative;
        display: flex;
        width: 60px;
        height: 34px;
    }

    .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }


    /* TIME */

    :root{
        --main-color: #1a535c;
        --secondary-color: #4ecdc4;
        --white-color: #f7fff7;
        --main-accent-color: #ff6b6b;
        --secondary-accent-color: #ffe66d;
        --dark-color: #2D232E;
    }

       
    h3, h4{
        color: var(--main-color)
    }

    h6{
        color: var(--secondary-color);
    }

    .day-txt{
        display: inline-block;
        transition: all ease-out 0.3s;de
    }

    .row:hover .day-txt{
        transform: translateX(5px);
        text-shadow: 0 0 0;
    }

    .tp-start-time,
    .tp-end-time{
        color: var(--main-color);
        cursor: pointer;
        display: inline-block;
        transition: all ease-out 0.3s;
    }

    .tp-start-time:hover,
    .tp-end-time:hover{
        transform: scale(1.2);
        text-shadow: 0 0 0 var(--main-color);
        
    }


        /* timePicker.css */
    #tp-modal .modal-footer{
        border: none;
    }

    #tp-modal .modal-header{
        border: none;
    }

    #tp-time-cont{
        display: flex;
        text-align: center;
        background: white;
        position: relative;
        align-items: stretch;
    }

    #tp-colon{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #tp-time-cont button{
        border: none;
        background: transparent;
        height: auto;
        padding: 0.5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        outline: none!important;
        transition: all ease-out 0.3s;
    }

    #tp-hour-cont,
    #tp-minutes-cont{
        flex-grow: 1;
    }

    #tp-time-cont button:hover{
        transform: scale(1.3);
        color: var(--main-color);
    }

    .tp-value{
        font-size: 2rem;
        line-height: 2rem;
    }

    #tp-set-btn{
        background: var(--main-color);
        border-color: var(--main-color);
    }
    .flatpickr-monday, .flatpickr-tuesday, .flatpickr-wednesday, .flatpickr-thursday, .flatpickr-friday, .flatpickr-saturday, .flatpickr-sunday{
        display: none;
    }
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
                
                @foreach ($contents as $content)
                    <section>
                        <div class="row">
                            <!-- left menu section -->
                            <div class="col-md-3 mb-2 mb-md-0">
                                <ul class="nav nav-pills flex-column nav-left">
                                    <!-- monday -->
                                    <li class="nav-item">
                                        <a class="nav-link active" id="service-pill-monday" data-toggle="pill" href="#service-vertical-monday" aria-expanded="true">
                                            <span class="font-weight-bold">Monday</span>
                                        </a>
                                    </li>
                                    <!-- tuesday -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="service-pill-tuesday" data-toggle="pill" href="#service-vertical-tuesday" aria-expanded="false">
                                            <span class="font-weight-bold">Tuesday</span>
                                        </a>
                                    </li>
                                    <!-- wednesday -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="service-pill-wednesday" data-toggle="pill" href="#service-vertical-wednesday" aria-expanded="false">
                                            <span class="font-weight-bold">Wednesday</span>
                                        </a>
                                    </li>
                                    <!-- thursday -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="service-pill-thursday" data-toggle="pill" href="#service-vertical-thursday" aria-expanded="false">
                                            <span class="font-weight-bold">Thursday</span>
                                        </a>
                                    </li>
                                    <!-- friday -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="service-pill-friday" data-toggle="pill" href="#service-vertical-friday" aria-expanded="false">
                                            <span class="font-weight-bold">Friday</span>
                                        </a>
                                    </li>
                                    <!-- saturday -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="service-pill-saturday" data-toggle="pill" href="#service-vertical-saturday" aria-expanded="false">
                                            <span class="font-weight-bold">Saturday</span>
                                        </a>
                                    </li>
                                    <!-- sunday -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="service-pill-sunday" data-toggle="pill" href="#service-vertical-sunday" aria-expanded="false">
                                            <span class="font-weight-bold">Sunday</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!--/ left menu section -->

                            <!-- right content section -->
                            <div class="col-md-9">
                                
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <!-- monday tab -->
                                            <div role="tabpanel" class="tab-pane active" id="service-vertical-monday" aria-labelledby="service-pill-general" aria-expanded="true">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="monday" class="form-label font-weight-bold">Monday:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-control-primary custom-switch">
                                                            <input type="checkbox" class="custom-control-input monday-status" id="mon" {{$content->mon == 1 ? 'checked' : ''}}/>
                                                            <label class="custom-control-label" for="mon"></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-2">
                                                    <div class="col-6">
                                                        <button class="btn btn-info add-monday" type="button">Add</button>
                                                    </div>
                                                </div>

                                                @foreach ($mondays as $monday)
                                                    <div class="row mt-2 tp-day-cont d-flex align-items-center">
                                                        <div class="col-md-4 col-12">
                                                            <button type="button" class="btn btn-danger remove-monday" data-id='live_{{$monday->id}}'>Remove</button>
                                                            <button type="button" class="btn btn-success save-monday ml-1" data-id='live_{{$monday->id}}'>Saved</button>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <span class="tp-start-time mon-start-time" data-id='live_{{$monday->id}}'>{{$monday->start_time}}</span>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <span class="tp-end-time mon-end-time" data-id='live_{{$monday->id}}'>{{$monday->end_time}}</span>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <input type="checkbox" class="mon_check" data-id='live_{{$monday->id}}' {{$monday->date_check == 1 ? 'checked' : ''}}/>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <input type="text" class="form-control flatpickr-monday" placeholder="YYYY-MM-DD" data-id='live_{{$monday->id}}' value="{{$monday->selectdata}}" style="{{$monday->date_check == 1 ? 'display:inline;' : 'display:none;'}}"/>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                
                                            </div>
                                            <!--/ monday tab -->

                                            <!-- tuesday-->
                                            <div class="tab-pane fade" id="service-vertical-tuesday" role="tabpanel" aria-labelledby="service-pill-tuesday" aria-expanded="false">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="tuesday" class="form-label font-weight-bold">Tuesday:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-control-primary custom-switch">
                                                            <input type="checkbox" class="custom-control-input tuesday-status" id="tue" {{$content->tue == 1 ? 'checked' : ''}}/>
                                                            <label class="custom-control-label" for="tue"></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-2">
                                                    <div class="col-6">
                                                        <button class="btn btn-info add-tuesday" type="button">Add</button>
                                                    </div>
                                                </div>

                                                @foreach ($tuesdays as $tuesday)
                                                    <div class="row mt-2 tp-day-cont d-flex align-items-center">
                                                        <div class="col-md-4 col-12">
                                                            <button type="button" class="btn btn-danger remove-tuesday" data-id='live_{{$tuesday->id}}'>Remove</button>
                                                            <button type="button" class="btn btn-success save-tuesday ml-1" data-id='live_{{$tuesday->id}}'>Saved</button>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <span class="tp-start-time tue-start-time" data-id='live_{{$tuesday->id}}'>{{$tuesday->start_time}}</span>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <span class="tp-end-time tue-end-time" data-id='live_{{$tuesday->id}}'>{{$tuesday->end_time}}</span>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <input type="checkbox" class="tue_check" data-id='live_{{$tuesday->id}}' {{$tuesday->date_check == 1 ? 'checked' : ''}}/>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <input type="text" class="form-control flatpickr-tuesday" placeholder="YYYY-MM-DD" data-id='live_{{$tuesday->id}}' value="{{$tuesday->selectdata}}" style="{{$tuesday->date_check == 1 ? 'display:inline;' : 'display:none;'}}"/>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!--/ tuesday-->

                                            <!-- wednesday -->
                                            <div class="tab-pane fade" id="service-vertical-wednesday" role="tabpanel" aria-labelledby="service-pill-wednesday" aria-expanded="false">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="wednesday" class="form-label font-weight-bold">Wednesday:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-control-primary custom-switch">
                                                            <input type="checkbox" class="custom-control-input wednesday-status" id="wed" {{$content->wed == 1 ? 'checked' : ''}}/>
                                                            <label class="custom-control-label" for="wed"></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-2">
                                                    <div class="col-6">
                                                        <button class="btn btn-info add-wednesday" type="button">Add</button>
                                                    </div>
                                                </div>

                                                @foreach ($wednesdays as $wednesday)
                                                    <div class="row mt-2 tp-day-cont d-flex align-items-center">
                                                        <div class="col-md-4 col-12">
                                                            <button type="button" class="btn btn-danger remove-wednesday" data-id='live_{{$wednesday->id}}'>Remove</button>
                                                            <button type="button" class="btn btn-success save-wednesday ml-1" data-id='live_{{$wednesday->id}}'>Saved</button>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <span class="tp-start-time wed-start-time" data-id='live_{{$wednesday->id}}'>{{$wednesday->start_time}}</span>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <span class="tp-end-time wed-end-time" data-id='live_{{$wednesday->id}}'>{{$wednesday->end_time}}</span>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <input type="checkbox" class="wed_check" data-id='live_{{$wednesday->id}}' {{$wednesday->date_check == 1 ? 'checked' : ''}}/>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <input type="text" class="form-control flatpickr-wednesday" placeholder="YYYY-MM-DD" data-id='live_{{$wednesday->id}}' value="{{$wednesday->selectdata}}" style="{{$wednesday->date_check == 1 ? 'display:inline;' : 'display:none;'}}"/>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!--/ wednesday -->

                                            <!-- thursday -->
                                            <div class="tab-pane fade" id="service-vertical-thursday" role="tabpanel" aria-labelledby="service-pill-thursday" aria-expanded="false">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="thursday" class="form-label font-weight-bold">Thursday:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-control-primary custom-switch">
                                                            <input type="checkbox" class="custom-control-input thursday-status" id="thu" {{$content->thu == 1 ? 'checked' : ''}}/>
                                                            <label class="custom-control-label" for="thu"></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-2">
                                                    <div class="col-6">
                                                        <button class="btn btn-info add-thursday" type="button">Add</button>
                                                    </div>
                                                </div>

                                                @foreach ($thursdays as $thursday)
                                                    <div class="row mt-2 tp-day-cont d-flex align-items-center">
                                                        <div class="col-md-4 col-12">
                                                            <button type="button" class="btn btn-danger remove-thursday" data-id='live_{{$thursday->id}}'>Remove</button>
                                                            <button type="button" class="btn btn-success save-thursday ml-1" data-id='live_{{$thursday->id}}'>Saved</button>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <span class="tp-start-time thu-start-time" data-id='live_{{$thursday->id}}'>{{$thursday->start_time}}</span>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <span class="tp-end-time thu-end-time" data-id='live_{{$thursday->id}}'>{{$thursday->end_time}}</span>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <input type="checkbox" class="thu_check" data-id='live_{{$thursday->id}}' {{$thursday->date_check == 1 ? 'checked' : ''}}/>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <input type="text" class="form-control flatpickr-thursday" placeholder="YYYY-MM-DD" data-id='live_{{$thursday->id}}' value="{{$thursday->selectdata}}" style="{{$thursday->date_check == 1 ? 'display:inline;' : 'display:none;'}}"/>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!--/ thursday -->

                                            <!-- friday -->
                                            <div class="tab-pane fade" id="service-vertical-friday" role="tabpanel" aria-labelledby="service-pill-friday" aria-expanded="false">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="friday" class="form-label font-weight-bold">Friday:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-control-primary custom-switch">
                                                            <input type="checkbox" class="custom-control-input friday-status" id="fri" {{$content->fri == 1 ? 'checked' : ''}}/>
                                                            <label class="custom-control-label" for="fri"></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-2">
                                                    <div class="col-6">
                                                        <button class="btn btn-info add-friday" type="button">Add</button>
                                                    </div>
                                                </div>

                                                @foreach ($fridays as $friday)
                                                    <div class="row mt-2 tp-day-cont d-flex align-items-center">
                                                        <div class="col-md-4 col-12">
                                                            <button type="button" class="btn btn-danger remove-friday" data-id='live_{{$friday->id}}'>Remove</button>
                                                            <button type="button" class="btn btn-success save-friday ml-1" data-id='live_{{$friday->id}}'>Saved</button>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <span class="tp-start-time fri-start-time" data-id='live_{{$friday->id}}'>{{$friday->start_time}}</span>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <span class="tp-end-time fri-end-time" data-id='live_{{$friday->id}}'>{{$friday->end_time}}</span>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <input type="checkbox" class="fri_check" data-id='live_{{$friday->id}}' {{$friday->date_check == 1 ? 'checked' : ''}}/>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <input type="text" class="form-control flatpickr-friday" placeholder="YYYY-MM-DD" data-id='live_{{$friday->id}}' value="{{$friday->selectdata}}" style="{{$friday->date_check == 1 ? 'display:inline;' : 'display:none;'}}"/>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!--/ friday -->

                                            <!-- saturday -->
                                            <div class="tab-pane fade" id="service-vertical-saturday" role="tabpanel" aria-labelledby="service-pill-saturday" aria-expanded="false">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="saturday" class="form-label font-weight-bold">Saturday:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-control-primary custom-switch">
                                                            <input type="checkbox" class="custom-control-input saturday-status" id="sat" {{$content->sat == 1 ? 'checked' : ''}}/>
                                                            <label class="custom-control-label" for="sat"></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-2">
                                                    <div class="col-6">
                                                        <button class="btn btn-info add-saturday" type="button">Add</button>
                                                    </div>
                                                </div>

                                                @foreach ($saturdays as $saturday)
                                                    <div class="row mt-2 tp-day-cont d-flex align-items-center">
                                                        <div class="col-md-4 col-12">
                                                            <button type="button" class="btn btn-danger remove-saturday" data-id='live_{{$saturday->id}}'>Remove</button>
                                                            <button type="button" class="btn btn-success save-saturday ml-1" data-id='live_{{$saturday->id}}'>Saved</button>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <span class="tp-start-time sat-start-time" data-id='live_{{$saturday->id}}'>{{$saturday->start_time}}</span>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <span class="tp-end-time sat-end-time" data-id='live_{{$saturday->id}}'>{{$saturday->end_time}}</span>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <input type="checkbox" class="sat_check" data-id='live_{{$saturday->id}}' {{$saturday->date_check == 1 ? 'checked' : ''}}/>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <input type="text" class="form-control flatpickr-saturday" placeholder="YYYY-MM-DD" data-id='live_{{$saturday->id}}' value="{{$saturday->selectdata}}" style="{{$saturday->date_check == 1 ? 'display:inline;' : 'display:none;'}}"/>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!--/ saturday -->

                                            <!-- sunday -->
                                            <div class="tab-pane fade" id="service-vertical-sunday" role="tabpanel" aria-labelledby="service-pill-sunday" aria-expanded="false">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="sunday" class="form-label font-weight-bold">Sunday:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-control-primary custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="sun" {{$content->sun == 1 ? 'checked' : ''}}/>
                                                            <label class="custom-control-label" for="sun"></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-2">
                                                    <div class="col-6">
                                                        <button class="btn btn-info add-sunday" type="button">Add</button>
                                                    </div>
                                                </div>

                                                @foreach ($sundays as $sunday)
                                                    <div class="row mt-2 tp-day-cont d-flex align-items-center">
                                                        <div class="col-md-4 col-12">
                                                            <button type="button" class="btn btn-danger remove-sunday" data-id='live_{{$sunday->id}}'>Remove</button>
                                                            <button type="button" class="btn btn-success save-sunday ml-1" data-id='live_{{$sunday->id}}'>Saved</button>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <span class="tp-start-time sun-start-time" data-id='live_{{$sunday->id}}'>{{$sunday->start_time}}</span>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <span class="tp-end-time sun-end-time" data-id='live_{{$sunday->id}}'>{{$sunday->end_time}}</span>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <input type="checkbox" class="sun_check" data-id='live_{{$sunday->id}}' {{$sunday->date_check == 1 ? 'checked' : ''}}/>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <input type="text" class="form-control flatpickr-sunday" placeholder="YYYY-MM-DD" data-id='live_{{$sunday->id}}' value="{{$sunday->selectdata}}" style="{{$sunday->date_check == 1 ? 'display:inline;' : 'display:none;'}}"/>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!--/ sunday -->
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!--/ right content section -->

                            <div class="col-12 d-flex justify-content-between">
                                <button type="button" class="btn btn-danger btn-service-cancel">Cancel</button>
                                <button type="button" class="btn btn-info btn-service-save">Save</button>
                            </div>

                        </div>
                    </section>
                @endforeach
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
        $(function(){
            var mon = 0, tue = 0, wed = 0, thu = 0, fri = 0, sat = 0, sun = 0;
            $('.add-monday').on('click', function(e){
                $('#service-vertical-monday').append('<div class="row mt-2 tp-day-cont d-flex align-items-center"><div class="col-md-4 col-12"><button type="button" class="btn btn-danger remove-monday" data-id='+ mon +'>Remove</button><button type="button" class="btn btn-success save-monday ml-2" data-id='+ mon +'>Save</button></div><div class="col-md-2 col-6"><span class="tp-start-time mon-start-time" data-id='+ mon +'>00:00</span></div><div class="col-md-2 col-6"><span class="tp-end-time mon-end-time" data-id='+ mon +'>00:00</span></div><div class="col-md-2 col-6"><input type="checkbox" class="mon_check" data-id='+ mon +' /></div><div class="col-md-2 col-6"><input type="text" class="form-control flatpickr-monday" placeholder="YYYY-MM-DD" data-id='+ mon +' /></div></div>');
                mon = mon + 1;
            });
            $('.add-tuesday').on('click', function(e){
                $('#service-vertical-tuesday').append('<div class="row mt-2 tp-day-cont d-flex align-items-center"><div class="col-md-4 col-12"><button type="button" class="btn btn-danger remove-tuesday" data-id='+ tue +'>Remove</button><button type="button" class="btn btn-success save-tuesday ml-2" data-id='+ tue +'>Save</button></div><div class="col-md-2 col-6"><span class="tp-start-time tue-start-time" data-id='+ tue +'>00:00</span></div><div class="col-md-2 col-6"><span class="tp-end-time tue-end-time" data-id='+ tue +'>00:00</span></div><div class="col-md-2 col-6"><input type="checkbox" class="tue_check" data-id='+ tue +' /></div><div class="col-md-2 col-6"><input type="text" class="form-control flatpickr-tuesday" placeholder="YYYY-MM-DD" data-id='+ tue +' /></div></div>');
                tue = tue + 1;
            })
            $('.add-wednesday').on('click', function(e){
                $('#service-vertical-wednesday').append('<div class="row mt-2 tp-day-cont d-flex align-items-center"><div class="col-md-4 col-12"><button type="button" class="btn btn-danger remove-wednesday" data-id='+ wed +'>Remove</button><button type="button" class="btn btn-success save-wednesday ml-2" data-id='+ wed +'>Save</button></div><div class="col-md-2 col-6"><span class="tp-start-time wed-start-time" data-id='+ wed +'>00:00</span></div><div class="col-md-2 col-6"><span class="tp-end-time wed-end-time" data-id='+ wed +'>00:00</span></div><div class="col-md-2 col-6"><input type="checkbox" class="wed_check" data-id='+ wed +' /></div><div class="col-md-2 col-6"><input type="text" class="form-control flatpickr-wednesday" placeholder="YYYY-MM-DD" data-id='+ wed +' /></div></div>');
                wed = wed + 1;
            })
            $('.add-thursday').on('click', function(e){
                $('#service-vertical-thursday').append('<div class="row mt-2 tp-day-cont d-flex align-items-center"><div class="col-md-4 col-12"><button type="button" class="btn btn-danger remove-thursday" data-id='+ thu +'>Remove</button><button type="button" class="btn btn-success save-thursday ml-2" data-id='+ thu +'>Save</button></div><div class="col-md-2 col-6"><span class="tp-start-time thu-start-time" data-id='+ thu +'>00:00</span></div><div class="col-md-2 col-6"><span class="tp-end-time thu-end-time" data-id='+ thu +'>00:00</span></div><div class="col-md-2 col-6"><input type="checkbox" class="thu_check" data-id='+ thu +' /></div><div class="col-md-2 col-6"><input type="text" class="form-control flatpickr-thursday" placeholder="YYYY-MM-DD" data-id='+ thu +' /></div></div>');
                thu = thu + 1;
            })
            $('.add-friday').on('click', function(e){
                $('#service-vertical-friday').append('<div class="row mt-2 tp-day-cont d-flex align-items-center"><div class="col-md-4 col-12"><button type="button" class="btn btn-danger remove-friday" data-id='+ fri +'>Remove</button><button type="button" class="btn btn-success save-friday ml-2" data-id='+ fri +'>Save</button></div><div class="col-md-2 col-6"><span class="tp-start-time fri-start-time" data-id='+ fri +'>00:00</span></div><div class="col-md-2 col-6"><span class="tp-end-time fri-end-time" data-id='+ fri +'>00:00</span></div><div class="col-md-2 col-6"><input type="checkbox" class="fri_check" data-id='+ fri +' /></div><div class="col-md-2 col-6"><input type="text" class="form-control flatpickr-friday" placeholder="YYYY-MM-DD" data-id='+ fri +' /></div></div>');
                fri = fri + 1;
            })
            $('.add-saturday').on('click', function(e){
                $('#service-vertical-saturday').append('<div class="row mt-2 tp-day-cont d-flex align-items-center"><div class="col-md-4 col-12"><button type="button" class="btn btn-danger remove-saturday" data-id='+ sat +'>Remove</button><button type="button" class="btn btn-success save-saturday ml-2" data-id='+ sat +'>Save</button></div><div class="col-md-2 col-6"><span class="tp-start-time sat-start-time" data-id='+ sat +'>00:00</span></div><div class="col-md-2 col-6"><span class="tp-end-time sat-end-time" data-id='+ sat +'>00:00</span></div><div class="col-md-2 col-6"><input type="checkbox" class="sat_check" data-id='+ sat +' /></div><div class="col-md-2 col-6"><input type="text" class="form-control flatpickr-saturday" placeholder="YYYY-MM-DD" data-id='+ sat +' /></div></div>');
                sat = sat + 1;
            })
            $('.add-sunday').on('click', function(e){
                $('#service-vertical-sunday').append('<div class="row mt-2 tp-day-cont d-flex align-items-center"><div class="col-md-4 col-12"><button type="button" class="btn btn-danger remove-sunday" data-id='+ sun +'>Remove</button><button type="button" class="btn btn-success save-sunday ml-2" data-id='+ sun +'>Save</button></div><div class="col-md-2 col-6"><span class="tp-start-time sun-start-time" data-id='+ sun +'>00:00</span></div><div class="col-md-2 col-6"><span class="tp-end-time sun-end-time" data-id='+ sun +'>00:00</span></div><div class="col-md-2 col-6"><input type="checkbox" class="sun_check" data-id='+ sun +' /></div><div class="col-md-2 col-6"><input type="text" class="form-control flatpickr-sunday" placeholder="YYYY-MM-DD" data-id='+ sun +' /></div></div>');
                mon = mon + 1;
            })
        });

        $(document).on('click', '.mon_check', function(){
            var id = $(this).attr('data-id').toString();
            console.log('data-id----->', id);
            $(this).is(':checked') ? $('.flatpickr-monday[data-id=' + id + ']').css('display', 'inline') : $('.flatpickr-monday[data-id=' + id + ']').css('display', 'none');

            $('.flatpickr-monday[data-id=' + id + ']').flatpickr({
                min: 'today',
                minDate: 'today',
                format: 'yyyy-m-d',
                maxDate: new Date().fp_incr(365),
                enable: [
                    function(dateObj){
                        return dateObj.getDay() %7 == 1;
                    }
                ]
            });
        });

        $(document).on('click', '.tue_check', function(){
            var id = $(this).attr('data-id').toString();
            $(this).is(':checked') ? $('.flatpickr-tuesday[data-id=' + id + ']').css('display', 'inline') : $('.flatpickr-tuesday[data-id=' + id + ']').css('display', 'none');

            $('.flatpickr-tuesday[data-id=' + id + ']').flatpickr({
                min: 'today',
                minDate: 'today',
                format: 'yyyy-m-d',
                maxDate: new Date().fp_incr(365),
                enable: [
                    function(dateObj){
                        return dateObj.getDay() %7 == 2;
                    }
                ]
            });
        });

        $(document).on('click', '.wed_check', function(){
            var id = $(this).attr('data-id').toString();
            $(this).is(':checked') ? $('.flatpickr-wednesday[data-id=' + id + ']').css('display', 'inline') : $('.flatpickr-wednesday[data-id=' + id + ']').css('display', 'none');

            $('.flatpickr-wednesday[data-id=' + id + ']').flatpickr({
                min: 'today',
                minDate: 'today',
                format: 'yyyy-m-d',
                maxDate: new Date().fp_incr(365),
                enable: [
                    function(dateObj){
                        return dateObj.getDay() %7 == 3;
                    }
                ]
            });
        });

        $(document).on('click', '.thu_check', function(){
            var id = $(this).attr('data-id').toString();
            $(this).is(':checked') ? $('.flatpickr-thursday[data-id=' + id + ']').css('display', 'inline') : $('.flatpickr-thursday[data-id=' + id + ']').css('display', 'none');

            $('.flatpickr-thursday[data-id=' + id + ']').flatpickr({
                min: 'today',
                minDate: 'today',
                format: 'yyyy-m-d',
                maxDate: new Date().fp_incr(365),
                enable: [
                    function(dateObj){
                        return dateObj.getDay() %7 == 4;
                    }
                ]
            });
        });

        $(document).on('click', '.fri_check', function(){
            var id = $(this).attr('data-id').toString();
            $(this).is(':checked') ? $('.flatpickr-friday[data-id=' + id + ']').css('display', 'inline') : $('.flatpickr-friday[data-id=' + id + ']').css('display', 'none');

            $('.flatpickr-friday[data-id=' + id + ']').flatpickr({
                min: 'today',
                minDate: 'today',
                format: 'yyyy-m-d',
                maxDate: new Date().fp_incr(365),
                enable: [
                    function(dateObj){
                        return dateObj.getDay() %7 == 5;
                    }
                ]
            });
        });

        $(document).on('click', '.sat_check', function(){
            var id = $(this).attr('data-id').toString();
            $(this).is(':checked') ? $('.flatpickr-saturday[data-id=' + id + ']').css('display', 'inline') : $('.flatpickr-saturday[data-id=' + id + ']').css('display', 'none');

            $('.flatpickr-saturday[data-id=' + id + ']').flatpickr({
                min: 'today',
                minDate: 'today',
                format: 'yyyy-m-d',
                maxDate: new Date().fp_incr(365),
                enable: [
                    function(dateObj){
                        return dateObj.getDay() %7 == 6;
                    }
                ]
            });
        });

        $(document).on('click', '.sun_check', function(){
            var id = $(this).attr('data-id').toString();
            $(this).is(':checked') ? $('.flatpickr-sunday[data-id=' + id + ']').css('display', 'inline') : $('.flatpickr-sunday[data-id=' + id + ']').css('display', 'none');

            $('.flatpickr-sunday[data-id=' + id + ']').flatpickr({
                min: 'today',
                minDate: 'today',
                format: 'yyyy-m-d',
                maxDate: new Date().fp_incr(365),
                enable: [
                    function(dateObj){
                        return dateObj.getDay() %7 == 0;
                    }
                ]
            });
        });

        $(document).on('click', '.save-monday', function(){
            var id = $(this).attr('data-id').toString();
            
            var start_time = $('.mon-start-time[data-id=' + id + ']').text();
            var end_time = $('.mon-end-time[data-id=' + id + ']').text();
            var date_check = $('.mon_check[data-id=' + id + ']').is(':checked') ? 1 : 0;
            var selectdata = $('.flatpickr-monday[data-id=' + id + ']').val() ? $('.flatpickr-monday[data-id=' + id + ']').val() : '0';
            var service_id = '{{$createId}}';
            var weekname = 'mondays';
            var week = 'monday';
            var short_week = 'mon';
            
            CreateUpdate(id, start_time, end_time, date_check, selectdata, service_id, weekname, week, short_week);
            
        });

        $(document).on('click', '.save-tuesday', function(){
            var id = $(this).attr('data-id').toString();
            
            var start_time = $('.tue-start-time[data-id=' + id + ']').text();
            var end_time = $('.tue-end-time[data-id=' + id + ']').text();
            var date_check = $('.tue_check[data-id=' + id + ']').is(':checked') ? 1 : 0;
            var selectdata = $('.flatpickr-tuesday[data-id=' + id + ']').val() ? $('.flatpickr-tuesday[data-id=' + id + ']').val() : '0';
            var service_id = '{{$createId}}';
            var weekname = 'tuesdays';
            var week = 'tuesday';
            var short_week = 'tue';

            
            CreateUpdate(id, start_time, end_time, date_check, selectdata, service_id, weekname, week, short_week);
            
        });

        $(document).on('click', '.save-wednesday', function(){
            var id = $(this).attr('data-id').toString();
            
            var start_time = $('.wed-start-time[data-id=' + id + ']').text();
            var end_time = $('.wed-end-time[data-id=' + id + ']').text();
            var date_check = $('.wed_check[data-id=' + id + ']').is(':checked') ? 1 : 0;
            var selectdata = $('.flatpickr-wednesday[data-id=' + id + ']').val() ? $('.flatpickr-wednesday[data-id=' + id + ']').val() : '0';
            var service_id = '{{$createId}}';
            var weekname = 'wednesdays';
            var week = 'wednesday';
            var short_week = 'wed';

            
            CreateUpdate(id, start_time, end_time, date_check, selectdata, service_id, weekname, week, short_week);
            
        });

        $(document).on('click', '.save-thursday', function(){
            var id = $(this).attr('data-id').toString();
            
            var start_time = $('.thu-start-time[data-id=' + id + ']').text();
            var end_time = $('.thu-end-time[data-id=' + id + ']').text();
            var date_check = $('.thu_check[data-id=' + id + ']').is(':checked') ? 1 : 0;
            var selectdata = $('.flatpickr-thursday[data-id=' + id + ']').val() ? $('.flatpickr-thursday[data-id=' + id + ']').val() : '0';
            var service_id = '{{$createId}}';
            var weekname = 'thursdays';
            var week = 'thursday';
            var short_week = 'thu';

            
            CreateUpdate(id, start_time, end_time, date_check, selectdata, service_id, weekname, week, short_week);
            
        });

        $(document).on('click', '.save-friday', function(){
            var id = $(this).attr('data-id').toString();
            
            var start_time = $('.fri-start-time[data-id=' + id + ']').text();
            var end_time = $('.fri-end-time[data-id=' + id + ']').text();
            var date_check = $('.fri_check[data-id=' + id + ']').is(':checked') ? 1 : 0;
            var selectdata = $('.flatpickr-friday[data-id=' + id + ']').val() ? $('.flatpickr-friday[data-id=' + id + ']').val() : '0';
            var service_id = '{{$createId}}';
            var weekname = 'fridays';
            var week = 'friday';
            var short_week = 'fri';

            
            CreateUpdate(id, start_time, end_time, date_check, selectdata, service_id, weekname, week, short_week);
            
        });

        $(document).on('click', '.save-saturday', function(){
            var id = $(this).attr('data-id').toString();
            console.log(id);
            var start_time = $('.sat-start-time[data-id=' + id + ']').text();
            var end_time = $('.sat-end-time[data-id=' + id + ']').text();
            var date_check = $('.sat_check[data-id=' + id + ']').is(':checked') ? 1 : 0;
            var selectdata = $('.flatpickr-saturday[data-id=' + id + ']').val() ? $('.flatpickr-saturday[data-id=' + id + ']').val() : '0';
            var service_id = '{{$createId}}';
            var weekname = 'saturdays';
            var week = 'saturday';
            var short_week = 'sat';

            
            CreateUpdate(id, start_time, end_time, date_check, selectdata, service_id, weekname, week, short_week);
            
        });

        $(document).on('click', '.save-sunday', function(){
            var id = $(this).attr('data-id').toString();
            
            var start_time = $('.sun-start-time[data-id=' + id + ']').text();
            var end_time = $('.sun-end-time[data-id=' + id + ']').text();
            var date_check = $('.sun_check[data-id=' + id + ']').is(':checked') ? 1 : 0;
            var selectdata = $('.flatpickr-sunday[data-id=' + id + ']').val() ? $('.flatpickr-sunday[data-id=' + id + ']').val() : '0';
            var service_id = '{{$createId}}';
            var weekname = 'sundays';
            var week = 'sunday';
            var short_week = 'sun';
            
            CreateUpdate(id, start_time, end_time, date_check, selectdata, service_id, weekname, week, short_week);
            
        });

        // Remove
        $(document).on('click', '.remove-monday', function(e){
            var id = $(this).data('id').toString();
            var weekname = 'mondays';
            
            if(id.includes("live_")){
                var real_id = id.split('_')[1];
                RemoveFun(weekname, real_id);
               
                $(this).parent().parent().remove();
            }
            else{
                $(this).parent().parent().remove();
            }
            
        });

        $(document).on('click', '.remove-tuesday', function(e){
            var id = $(this).data('id').toString();
            var weekname = 'tuesdays';
            
            if(id.includes("live_")){
                var real_id = id.split('_')[1];
                RemoveFun(weekname, real_id);
               
                $(this).parent().parent().remove();
            }
            else{
                $(this).parent().parent().remove();
            }
            
        });

        $(document).on('click', '.remove-wednesday', function(e){
            var id = $(this).data('id').toString();
            var weekname = 'wednesdays';
            
            if(id.includes("live_")){
                var real_id = id.split('_')[1];
                RemoveFun(weekname, real_id);
               
                $(this).parent().parent().remove();
            }
            else{
                $(this).parent().parent().remove();
            }
            
        });

        $(document).on('click', '.remove-thursday', function(e){
            var id = $(this).data('id').toString();
            var weekname = 'thursdays';
            
            if(id.includes("live_")){
                var real_id = id.split('_')[1];
                RemoveFun(weekname, real_id);
               
                $(this).parent().parent().remove();
            }
            else{
                $(this).parent().parent().remove();
            }
            
        });

        $(document).on('click', '.remove-friday', function(e){
            var id = $(this).data('id').toString();
            var weekname = 'fridays';
            
            if(id.includes("live_")){
                var real_id = id.split('_')[1];
                RemoveFun(weekname, real_id);
               
                $(this).parent().parent().remove();
            }
            else{
                $(this).parent().parent().remove();
            }
            
        });

        $(document).on('click', '.remove-saturday', function(e){
            var id = $(this).data('id').toString();
            var weekname = 'saturdays';
            
            if(id.includes("live_")){
                var real_id = id.split('_')[1];
                RemoveFun(weekname, real_id);
               
                $(this).parent().parent().remove();
            }
            else{
                $(this).parent().parent().remove();
            }
            
        });

        $(document).on('click', '.remove-sunday', function(e){
            var id = $(this).data('id').toString();
            var weekname = 'sundays';
            
            if(id.includes("live_")){
                var real_id = id.split('_')[1];
                RemoveFun(weekname, real_id);
               
                $(this).parent().parent().remove();
            }
            else{
                $(this).parent().parent().remove();
            }
            
        });


        $('.monday-status').on('change', function(e){
            e.preventDefault();
            var status = $(this).is(':checked')?1:0;
            var week = 'mon';
            var id = '{{$createId}}';
            StatusFun(id, week, status);
        });

        $('.tuesday-status').on('change', function(e){
            e.preventDefault();
            var status = $(this).is(':checked')?1:0;
            var week = 'tue';
            var id = '{{$createId}}';
            StatusFun(id, week, status);
        });

        $('.wednesday-status').on('change', function(e){
            e.preventDefault();
            var status = $(this).is(':checked')?1:0;
            var week = 'wed';
            var id = '{{$createId}}';
            StatusFun(id, week, status);
        });

        $('.thursday-status').on('change', function(e){
            e.preventDefault();
            var status = $(this).is(':checked')?1:0;
            var week = 'thu';
            var id = '{{$createId}}';
            StatusFun(id, week, status);
        });

        $('.friday-status').on('change', function(e){
            e.preventDefault();
            var status = $(this).is(':checked')?1:0;
            var week = 'fri';
            var id = '{{$createId}}';
            StatusFun(id, week, status);
        });

        $('.saturday-status').on('change', function(e){
            e.preventDefault();
            var status = $(this).is(':checked')?1:0;
            var week = 'sat';
            var id = '{{$createId}}';
            StatusFun(id, week, status);
        });

        $('.sunday-status').on('change', function(e){
            e.preventDefault();
            var status = $(this).is(':checked')?1:0;
            var week = 'sun';
            var id = '{{$createId}}';
            StatusFun(id, week, status);
        });
              
        $(document).ready(function(){
            
            $(document).on('click', '.tp-start-time', function(){
                timePicker($(this));
            });
            
            $(document).on('click', '.tp-end-time', function(){
                startTime = $(this).closest('.tp-day-cont').find('.tp-start-time').html();
                timePicker($(this), 5, getHour(startTime));
            });
            });

            function timePicker($elem, minutesStep = 5, startHour = 0, startMinutes = 0, endHour = 23, endMinutes = 59, defaultTime)
            {
            let currentHour = '12';
            let currentMinutes = '00';
            if(startHour < 0 || startHour > 23){
                startHour = 0;
            }
            if (endHour < startHour || endHour > 23){
                endHour = 23;
            }
            
            if (startMinutes < 0 || startMinutes > 59){
                startMinutes = 0;
            }
            if (endMinutes <= startMinutes || endMinutes > 59){
                endMinutes = 59;
            }
            
            if (minutesStep < 1 || minutesStep > 60){
                minutesStep = 5;
            }
            
            if (!defaultTime){
                let currentTime = $elem.html();
                if(isValidTime(currentTime)){
                currentHour = getHour(currentTime);
                currentMinutes = getMinutes(currentTime);
                }
            }
            let modal = '<div id="tp-modal" class="modal fade" tabindex="-1">' +
                '<div class="modal-dialog modal-sm">' +
                    '<div class="modal-content">' +
                    '<div class="modal-header"><h4>Set Time</h4></div>' +
                    '<div class="modal-body pt-0 pl-0 pr-0 ">' +
                        '<div id="tp-time-cont">' +
                        '<div id="tp-hour-cont" class="mr-1 text-right">' +
                            '<button id="tp-h-up" class="ml-auto"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">' +
                        '<path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>' +
                            '</svg></button>' +
                            '<div id="tp-h-value" class="tp-value">12</div>' +
                            '<button id="tp-h-down" class="ml-auto">' +
                            '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">' +
                        '<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>' +
                            '</svg>' +
                            '</button>' +
                        '</div>' +
                        '<div id="tp-colon">:</div>' +
                        '<div id="tp-minutes-cont" class="ml-1 text-left">' +
                            '<button id="tp-m-up"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">' +
                        '<path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>' +
                            '</svg></button>' +
                            '<div id="tp-m-value" class="tp-value">12</div>' +
                            '<button id="tp-m-down">' +
                            '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">' +
                        '<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>' +
                            '</svg>' +
                            '</button>' +
                        '</div>' +
                        '</div>' +
                    '<div class="modal-footer">' +
                        '<button type="button" id="tp-cancel-btn" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
                        '<button type="button" id="tp-set-btn" class="btn btn-primary">Set</button>' +
                    '</div>' +
                    '</div>' +
                '</div>' +
                '</div>';
            $('body').append(modal);
            
            $('#tp-h-value').html(currentHour);
            $('#tp-m-value').html(currentMinutes);
            
            $('#tp-h-up').off('click').on('click', function(){
                let val = parseInt($('#tp-h-value').html()) + 1;
                if (val == endHour + 1){
                $('#tp-h-value').html(('0' + startHour).substr(-2));
                } else {
                $('#tp-h-value').html(('0' + val).substr(-2));
                }
            });
            
            $('#tp-h-down').off('click').on('click', function(){
                let val = parseInt($('#tp-h-value').html()) - 1;
                if (val == startHour - 1){
                $('#tp-h-value').html(('0' + endHour).substr(-2));
                } else {
                $('#tp-h-value').html(('0' + val).substr(-2));
                }
            });
            
            $('#tp-m-up').off('click').on('click', function(){
                let val = parseInt($('#tp-m-value').html()) + minutesStep;
                if (val >= endMinutes + 1){
                $('#tp-m-value').html((startMinutes == 0)? '00' : ('0' + (startMinutes + minutesStep - startMinutes % minutesStep)).substr(-2));
                } else {
                $('#tp-m-value').html(('0' + val).substr(-2));
                }
            });
            
            $('#tp-m-down').off('click').on('click', function(){
                let val = parseInt($('#tp-m-value').html()) - minutesStep;
                if (val <= startMinutes - 1){
                $('#tp-m-value').html(('0' + (endMinutes - endMinutes % minutesStep)).substr(-2));
                } else {
                $('#tp-m-value').html(('0' + val).substr(-2));
                }
            });
            
            $('#tp-set-btn').off('click').on('click', function(){
                let h = $('#tp-h-value').html();
                let m = $('#tp-m-value').html();
                
                $elem.html(h + ':' + m);
                
                if ($elem.hasClass('tp-start-time')){
                let $endTimeElem = $elem.closest('.tp-day-cont').find('.tp-end-time');
                if ($endTimeElem.length > 0){
                    if (compareTimes($elem.html(), $endTimeElem.html()) == 0 || compareTimes($elem.html(), $endTimeElem.html()) == 1){
                    $endTimeElem.html(newEndTime($elem.html(), minutesStep));
                    }
                }
                } else {
                let $startTimeElem = $elem.closest('.tp-day-cont').find('.tp-start-time');
                if ($startTimeElem.length > 0){
                    if (compareTimes($startTimeElem.html(), $elem.html()) == 0 || compareTimes($startTimeElem.html(), $elem.html()) == 1){
                    $elem.html(newEndTime($startTimeElem.html(), minutesStep));
                    }
                }
                }
                $('#tp-modal').modal('hide');
            });
            
            $('#tp-modal').modal('show');
            }
            
            function getHour(time){
            return time.substr(0, time.indexOf(':'));
            }

            function getIntHour(time){
            return parseInt(getHour(time));
            }

            function getMinutes(time){
            return time.substr(time.indexOf(':') + 1);
            }

            function getIntMinutes(time){
            return parseInt(getMinutes(time));
            }

            function isValidTime(time){
            let patt = /([01]?\d):([0-5]\d)/g;
            return patt.test(time);
            }

            function compareTimes(time1, time2){
            if (!isValidTime(time1) || !isValidTime(time2)) {
                return -1;
            }
            if (time1 == time2){
                return 0;
            } else if(getIntHour(time1) > getIntHour(time2)) {
                return 1;
            } else if(getIntHour(time1) == getIntHour(time2)) {
                if (getIntMinutes(time1) > getIntMinutes(time2)) {
                return 1;
                }
                else {
                return 2;
                }
            } else {
                return 2;
            }
            }

            function newEndTime(startTime, minutesStep){
            if (!isValidTime(startTime)){
                return -1;
            }
            
            let hour = getIntHour(startTime);
            let minutes = getIntMinutes(startTime);
            
            if (minutes + minutesStep > 59){
                minutes = 0;
                hour++;
                if (hour > 23){
                return startTime;
                }
            } else {
                minutes += minutesStep;
            }
            
            hour = ("0" + hour).substr(-2);
            minutes = ("0" + minutes).substr(-2);
            return hour + ":" + minutes;
        }

        function CreateUpdate(id, start_time, end_time, date_check, selectdata, service_id, weekname, week, short_week){
            // createId
            var createurl = '/time-create';
            var updateurl = '/time-update';
           
            if(start_time != end_time){
                
                if(id.includes("live")){
                    
                    var real_id = id.split('_')[1];
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'post',
                        url: updateurl,
                        data: { start_time: start_time, end_time : end_time, date_check : date_check, selectdata : selectdata, weekname : weekname, service_id : service_id, real_id : real_id },
                        success: function (data) {
                            if (data['success']) {
                                toastr["success"]("Changed successfully.");
                            }
                            else {
                                console.log('error');
                            }
                        }
                    });
                }
                else{
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'post',
                        url: createurl,
                        data: { start_time: start_time, end_time : end_time, date_check : date_check, selectdata : selectdata, weekname : weekname, service_id : service_id },
                        success: function (data) {
                            if (data['success']) {
                                toastr["success"]("Changed successfully.");

                                $('.save-'+week+'[data-id=' + id + ']').html('Saved');
                                $('.remove-'+week+'[data-id=' + id + ']').attr("data-id", 'live_' + data['success']);
                                $('.save-'+week+'[data-id=' + id + ']').attr("data-id", 'live_' + data['success']);
                                $('.'+short_week+'-start-time[data-id=' + id + ']').attr("data-id", 'live_' + data['success']);
                                $('.'+short_week+'-end-time[data-id=' + id + ']').attr("data-id", 'live_' + data['success']);
                                
                                $('.'+short_week+'_check[data-id=' + id + ']').attr("data-id", 'live_' + data['success']);
                                $('.flatpickr-'+week+'[data-id=' + id + ']').attr("data-id", 'live_' + data['success']);

                            }
                            else {
                                console.log('error');
                            }
                        }
                    });
                }
            }
        }
        
        function RemoveFun(weekname, real_id){
            var remove_url = '/time-remove';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: remove_url,
                data:{weekname: weekname, real_id : real_id},
                success: function (data) {
                    if(data['success']) {
                        
                    }
                    else {
                        console.log('error');
                    }
                }
            });
        }

        function StatusFun(id, week, status){
            var changeurl = '/time-status'
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: changeurl,
                data: { id : id, week : week, status : status },
                success: function (data) {
                    if (data['success']) {
                        toastr["success"]("Changed successfully.");
                    }
                    else {
                        toastr["error"]("ERROR");
                    }
                }
            
            });
        }
    </script>
</body>
