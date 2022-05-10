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
                                    <li class="breadcrumb-item"><a href="{{route('restaurant.index')}}">Restaurant</a>
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
                                    <h4 class="card-title">Restaurant</h4>
                                    <button type="button" class="btn btn-add-res btn-primary"><i data-feather='plus'></i> &nbsp;ADD</button>
                                </div>
                                <div class="card-datatable">
                                    
                                    <table class="datatables-basic table">
                                       <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Menu Name</th>
                                                <th>Action</th>
                                            </tr>
                                       </thead>
                                       <tbody>
                                            @foreach ($restaurants as $restaurant)
                                                <tr>
                                                    <td id="res-name{{$restaurant->id}}">{{$restaurant->name}}</td>
                                                    <td id="res-addr{{$restaurant->id}}">{{$restaurant->address}}</td>
                                                    <td id="res-menu{{$restaurant->id}}">{{$restaurant->menu_id}}</td>
                                                    <td>
                                                        <a class="btn res-edit-btn" id="res-edit-btn{{$restaurant->id}}" data-id="{{$restaurant->id}}" data-name="{{$restaurant->name}}" data-address="{{$restaurant->address}}" data-menu_id="{{$restaurant->menu_id}}">
                                                            <i data-feather='edit'></i>
                                                        </a>
                                                        <a class="res-remove-btn btn" data-id="{{$restaurant->id}}">
                                                            <i data-feather='delete'></i>
                                                        </a>
                                                        <a href="/restaurant/{{$restaurant->id}}" target="blank" class="menu-view-btn btn" data-id="{{$restaurant->id}}">
                                                            <i data-feather='eye'></i>
                                                        </a>
                                                    </td>
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
        <div class="modal fade text-left" id="modal-res-create" tabindex="-1" role="dialog" aria-labelledby="create-res" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="create-res">Restaurant</h4>
                        <button type="button" class="close content-modal-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#" class="form-res-create">
                        <div class="modal-body">
                            <label>Name: </label>
                            <div class="form-group">
                                <input type="text" placeholder="name" class="form-control" id="res-name"/>
                            </div>
                            <label>Address: </label>
                            <div class="form-group">
                                <input type="text" placeholder="address" class="form-control" id="res-addr"/>
                            </div>
                            <label>Menu Name: </label>
                            <div class="form-group">
                                <select class="menu_name form-control" id="menu_id">
                                    @foreach ($pages as $page)
                                        <option value="{{$page->id}}">{{$page->pagename}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade text-left" id="modal-res-update" tabindex="-1" role="dialog" aria-labelledby="update-res" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="update-res">Restaurant</h4>
                        <button type="button" class="close content-modal-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#" class="form-res-update">
                        <div class="modal-body">
                            <label>Name: </label>
                            <div class="form-group">
                                <input type="text" placeholder="name" class="form-control" id="res-uname"/>
                                <input type="hidden" id="res-uid">
                            </div>
                            <label>Address: </label>
                            <div class="form-group">
                                <input type="text" placeholder="address" class="form-control" id="res-uaddr"/>
                            </div>
                            <label>Menu Name: </label>
                            <div class="form-group">
                                <select class="menu_name form-control" id="umenu_id">
                                    @foreach ($pages as $page)
                                        <option value="{{$page->id}}">{{$page->pagename}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-update-save">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('layouts.footer')
    <!-- BEGIN: Page JS-->   
    <script src="{{ asset('/app-assets/js/scripts/tables/table-datatables-restaurant.js') }}"></script>
    <!-- END: Page JS-->
    <script>
        '@if (session()->has('message'))<div class="alert alert-success">' + toastr["success"]("{{ session()->get('message') }}") + '</div> @endif';

        $('.btn-add-res').on('click', function(e){
            $('#modal-res-create').modal('show');
        });

        $(document).on('click', '.res-edit-btn', function(e){
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            var address = $(this).attr('data-address');
            var menu_id = $(this).attr('data-menu_id');
            $('#res-uid').val(id);
            $('#res-uname').val(name);
            $('#res-uaddr').val(address);
            $('#umenu_id').val(menu_id);
            $('#modal-res-update').modal('show');
        });

        $(document).on('click', '.btn-update-save', function(e){
            var id =  $('#res-uid').val();
            var name = $('#res-uname').val();
            var address = $('#res-uaddr').val();
            var menu_id = $('#umenu_id').val();
            var url = '{{route("restaurant.update")}}';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                data: {id : id, name : name, address : address, menu_id : menu_id},
                url: url,
                success: function(data) {
                    if(data['success']){
                        $('#res-name'+id).text(name);
                        $('#res-addr'+id).text(address);
                        $('#res-menu'+id).text(menu_id);
                        $('#res-edit-btn'+id).attr('data-name', name);
                        $('#res-edit-btn'+id).attr('data-address', address);
                        $('#res-edit-btn'+id).attr('data-menu_id', menu_id);
                        $('#modal-res-update').modal('hide');
                        toastr["success"]("Changed Successfully.");
                    }
                    else{
                    }
                }
            });
        });
    </script>
</body>
