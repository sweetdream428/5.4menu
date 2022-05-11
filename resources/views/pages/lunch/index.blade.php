@include('layouts.header')
<link
    href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

@section('title', 'Home')

<style>
    td .p {
        font-size: 14px !important;
    }
    .edit-content-position, .remove-content-position{
        cursor: pointer;
    }
    .remove-icon-position{
        position: absolute;
        top: -10px;
        right: 0px;
        cursor: pointer;
        display: none;
    }
    .edit-icon-position{
        position: absolute;
        top: -10px;
        right: 30px;
        cursor: pointer;
        display: none;
    }
    .nav-tabs .nav-item:hover .remove-icon-position, .nav-tabs .nav-item:hover .edit-icon-position{
        display: block;
    }
    .footer-text-edit{
        width: 50%;
        margin: 0 auto;
    }
    .time-content-page{
        cursor: pointer;
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
            @foreach ($pages as $page)
                <div class="content-header row d-flex justify-content-between align-items-center">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="content-header-title float-left mb-0" style="text-transform: capitalize;">
                                    {{ $pagename }}</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/menupage">Menupage</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">{{ $pagename }}</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">{{ $page_id }}</a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12 mb-2">
                        <label for="basicInput">Menu Name</label>
                        <div class="d-flex justify-content-between">
                            <input type="text" class="form-control menu_name" placeholder="Menu Name" value="{{$page->pagename}}"/>
                            <button type="button" class="btn btn-primary ml-1 menu_name_save" data-id="{{ $page_id }}">Save</button>
                        </div>
                    </div>
                </div>
                <div class="content-body">
                    <section id="nav-tabs-aligned">
                        <div class="row match-height">
                            <!-- Centered Aligned Tabs starts -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                                            <div>
                                                <div class="form-modal-ex">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cate-create">
                                                        Add
                                                    </button>
                                                </div>
                                            </div>
                                            @foreach ($categories as $category)
                                                <li class="nav-item">
                                                    <a class="nav-link {{$category->id == $firstid ? 'active' : ''}}" id="tab-category-{{$category->id}}" data-toggle="tab" href="#category-{{$category->id}}" aria-controls="category-{{$category->id}}" role="tab" aria-selected="true">
                                                        {{$category->name}}
                                                    </a>
                                                    <i class="edit-icon-position" id="edit-icon-position{{$category->id}}" data-id="{{$category->id}}" data-sequence="{{$category->sequence}}" data-name="{{$category->name}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                    </i>
                                                    <i class="remove-icon-position" data-id="{{$category->id}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </i>
                                                </li>
                                            @endforeach
                                            
                                        </ul>
                                        <div class="tab-content mt-3">
                                            @foreach ($categories as $category)
                                                <div class="tab-pane {{$category->id == $firstid ?'active' : ''}}" id="category-{{$category->id}}" role="tabpanel">
                                                    <p>
                                                        <h2 id="content-all-title-{{$category->id}}">{{$category->name}}</h2>
                                                        <button type="button" class="btn btn-primary btn-add-content" data-toggle="modal" data-category_id="{{$category->id}}">Add</button>
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
                                                                    <td id="content-size-{{$content->id}}">{{$content->size}}</td>
                                                                    <td>
                                                                        <i class="edit-content-position" id="edit-content-position{{$content->id}}" data-id="{{$content->id}}" data-title="{{$content->title}}" data-description="{{$content->description}}" data-number="{{$content->number}}" data-sequence="{{$content->sequence}}" data-size="{{$content->size}}">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                                        </i>
                                                                        <i class="remove-content-position ml-1" data-id="{{$content->id}}">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                                        </i>
                                                                        <i class="time-content-page ml-1" data-id="{{$content->id}}">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                                                        </i>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endforeach                                        
                                        </div>
                                        <div class="footer-text-edit">
                                            <textarea class="form-control" id="footer-text" rows="3" placeholder="text...">{{$page->footer_text}}</textarea>
                                            <div class="col-12 d-flex justify-content-center mt-2">
                                                <button type="button" class="footer-save-btn btn btn-primary" data-id="{{ $page_id }}">
                                                    Save
                                                </button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Centered Aligned Tabs ends -->
                        </div>
                    </section>
                </div>
            @endforeach
            
        </div>
    </div>
    <!-- END: Content-->

    <!-- Modal -->
    <div class="modal fade text-left" id="modal-cate-create" tabindex="-1" role="dialog" aria-labelledby="create-category" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="create-category">Category</h4>
                    <button type="button" class="close category-modal-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" class="form-cate-create">
                    <div class="modal-body">
                        <label>Sequence: </label>
                        <div class="form-group">
                            <input type="number" placeholder="1" step="1" class="form-control category-sequence"/>
                        </div>
                        <label>Category Name: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Category" class="form-control category-text"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-add-category">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Content MODAL CREATE --}}
    <!-- Modal -->
    <div class="modal fade text-left" id="modal-content-create" tabindex="-1" role="dialog" aria-labelledby="create-content" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="create-content">Content</h4>
                    <button type="button" class="close content-modal-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" class="form-content-create">
                    <div class="modal-body">
                        <label>Sequence: </label>
                        <div class="form-group">
                            <input type="number" placeholder="1" step="1" class="form-control" id="con-sequence"/>
                        </div>

                        <label>Title: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Title" class="form-control" id="con-title"/>
                            <input type="hidden" id="cate_con_id"/>
                        </div>

                        <label>Content: </label>
                        <textarea class="form-control" id="con-desc" rows="3" placeholder="Content..."></textarea>

                        <label>Price: </label>
                        <div class="form-group">
                            <input type="text" placeholder="27.5$" class="form-control" id="con-num"/>
                        </div>
                        <label>Size: </label>
                        <div class="form-group">
                            <input type="text" placeholder="27.5L" class="form-control" id="con-size"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Category Modal Update --}}
    <div class="modal fade text-left" id="edit-cate-modal" tabindex="-1" role="dialog" aria-labelledby="update-category" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="update-category">Update Category</h4>
                    <button type="button" class="close category-modal-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" class="form-cate-edit">
                    <div class="modal-body">
                        <label>Sequence: </label>
                        <div class="form-group">
                            <input type="number" placeholder="1" step="1" class="form-control" id="u-sequence"/>
                        </div>

                        <label>Category Name: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Category" id="u-category" class="form-control"/>
                            <input type="hidden" id="cate_id" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Content MODAL Update--}}
    <div class="modal fade text-left" id="edit-content-modal" tabindex="-1" role="dialog" aria-labelledby="update-content" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="update-content">Content</h4>
                    <button type="button" class="close content-modal-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" class="form-cont-edit">
                    <div class="modal-body">
                        <label>Sequence: </label>
                        <div class="form-group">
                            <input type="number" placeholder="1" step="1" class="form-control" id="ucon-sequence"/>
                        </div>

                        <label>Title: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Title" class="form-control" id="ucon-title"/>
                            <input type="hidden" id="ucon_id"/>
                        </div>
                    
                        <label>Content: </label>
                        <textarea class="form-control" id="ucon-desc" rows="3" placeholder="Content..."></textarea>
                   
                        <label>Price: </label>
                        <div class="form-group">
                            <input type="text" placeholder="27.5$" class="form-control" id="ucon-num"/>
                        </div>
                    
                        <label>Size: </label>
                        <div class="form-group">
                            <input type="text" placeholder="17.5L" class="form-control" id="ucon-size"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('layouts.footer')
    <script>
        '@if (session()->has('message'))<div class="alert alert-success">' + toastr["success"]("{{ session()->get('message') }}") + '</div>@endif';

        // Category
        $(document).on('submit', '.form-cate-create', function(e){
            var category_text = $('.category-text').val();
            var category_sequence = $('.category-sequence').val();
            var url = '{{route('category.create')}}';
            var page_id = '{{$page_id}}';

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                data: {name : category_text, page_id : page_id, sequence: category_sequence},
                success: function(data) {
                    if(data['success']){
                        $('#modal-cate-create').modal('hide');
                        $('.category-text').val('');
                        $('.category-sequence').val('');
                        var id = data['success'];
                        $('.nav-tabs').append("<li class='nav-item'><a class='nav-link' id='tab-category-"+id+"' data-toggle='tab' href='#category-"+id+"' aria-controls='category-"+id+"' role='tab' aria-selected='false'>"+category_text+"</a><i class='edit-icon-position' edit-icon-position"+id+" data-id="+id+" data-sequence="+category_sequence+" data-name="+category_text+"><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-edit-2'><path d='M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z'></path></svg></i><i class='remove-icon-position' data-id="+id+"><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-x'><line x1='18' y1='6' x2='6' y2='18'></line><line x1='6' y1='6' x2='18' y2='18'></line></svg></i></li>");
                        
                        $('.tab-content').append("<div class='tab-pane' id='category-"+id+"' aria-labelledby='tab-category-"+id+"' role='tabpanel'><p><h2 id='content-all-title"+id+"'>"+category_text+"</h2><button type='button' class='btn btn-primary btn-add-content' data-toggle='modal' data-category_id="+id+">Add</button></p><table class='table'><tbody></tbody></table></div>");
                        feather.replace();
                    }
                    else{
                        
                    }
                }
            });
        });

        $(document).on('click', '.remove-icon-position', function(e){
            var id = $(this).data('id');
            $(this).parent().remove();
            $('#category-'+id).remove();
            var url = '{{route("category.remove")}}';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                data: {id : id},
                success: function(data) {
                    if(data['success']){
                        toastr["success"]("Removed Successfully.");
                    }
                    else{
                        toastr["error"]("Error.");
                    }
                }
            });
        
        });

        $(document).on('click', '.edit-icon-position', function(e){
            var id = $(this).data('id');
            var name = $(this).attr('data-name');
            var sequence = $(this).attr('data-sequence');
            $('#u-category').val(name);
            $('#u-sequence').val(sequence);
            $('#edit-cate-modal').modal('show');
            $('#cate_id').val(id);
            console.log('id------->', id);
        });

        $('.form-cate-edit').on('submit', function(e){
            console.log('edit--->cate -->');
            var category_text = $('#u-category').val();
            var category_sequence = $('#u-sequence').val();
            var url = '{{route("category.update")}}';
            var id = $('#cate_id').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                data: {name : category_text, id : id, sequence : category_sequence},
                success: function(data) {
                    if(data['success']){
                        console.log('success');
                        $('#tab-category-'+id).text(category_text);
                        $('#content-all-title-'+id).text(category_text);
                        $('#edit-icon-position'+id+'').attr('data-sequence', category_sequence);
                        $('#edit-icon-position'+id+'').attr('data-name', category_text);
                        $('#edit-cate-modal').modal('hide');
                    }
                    else{
                        toastr["error"]("Error.");
                    }
                }
            });
            
        });

        // Content
        $(document).on('click', '.btn-add-content', function(e){
            var category_id = $(this).data('category_id');            
            $('#cate_con_id').val(category_id);
            console.log('value--->', $('#cate_con_id').val());
            $('#modal-content-create').modal('show');
        });

        $(document).on('submit', '.form-content-create', function(e){
            var category_id = $('#cate_con_id').val();
            var title = $('#con-title').val();
            var description = $('#con-desc').val();
            var number = $('#con-num').val();
            var size = $('#con-size').val();
            var sequence = $('#con-sequence').val();

            $('.content-modal-close').click();
            
            var url = '{{route("content.create")}}';
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                data: {title : title, category_id : category_id, description : description, number : number, size : size, sequence: sequence},
                success: function(data) {
                    if(data['success']){
                        var id = data['success'];

                        $("#category-"+category_id+" .table").append("<tbody class='content-tpage"+category_id+"'><tr><td><h4 id='content-title-"+id+"'>"+title+"</h4><p id='content-desc-"+id+"'>"+description+"</p></td><td id='content-num-"+id+"'>"+number+"</td><td id='content-size-"+id+"'>"+size+"</td><td><i class='edit-content-position' id='edit-content-position"+id+"' data-id='"+id+"' data-title='"+title+"' data-sequence='"+sequence+"' data-description='"+description+"' data-number='"+number+"'  data-size='"+size+"'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-edit-2'><path d='M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z'></path></svg></i><i class='remove-content-position ml-1' data-id='"+id+"'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-x'><line x1='18' y1='6' x2='6' y2='18'></line><line x1='6' y1='6' x2='18' y2='18'></line></svg></i><i class='time-content-page ml-1' data-id="+id+"><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-clock'><circle cx='12' cy='12' r='10'></circle><polyline points='12 6 12 12 16 14'></polyline></svg></i></td></tr></tbody>");
                        feather.replace();
                        $('#cate_con_id').val('');
                        $('#con-title').val('');
                        $('#con-desc').val('');
                        $('#con-num').val('');
                        $('#con-size').val('');
                        $('#con-sequence').val('');
                                      
                    }
                    else{
                        toastr["error"]("Error.");
                    }
                }
            });
        });

        $(document).on('click', '.remove-content-position', function(e){
            var id = $(this).data('id');
            var url = "{{route('content.remove')}}";
            $(this).parent().parent().remove();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                data: {id : id},
                url: url,
                success: function(data) {
                    if(data['success']){
                        toastr["success"]("Removed Successfully.")
                    }
                    else{
                    }
                }
            });
        });

        $(document).on('click', '.edit-content-position', function(e){
            var id = $(this).data('id');
            var title = $(this).attr('data-title');
            var description = $(this).attr('data-description');
            var number = $(this).attr('data-number');
            var size = $(this).attr('data-size');
            var sequence = $(this).attr('data-sequence');
            console.log('size', size);
            $('#ucon-title').val(title);
            $('#ucon-desc').val(description);
            $('#ucon-num').val(number);
            $('#ucon-size').val(size);
            $('#ucon_id').val(id);
            $('#ucon-sequence').val(sequence);

            $('#edit-content-modal').modal('show');

        });

        $('.form-cont-edit').on('submit', function(e){
            var utitle = $('#ucon-title').val();
            var udescription = $('#ucon-desc').val();
            var unumber = $('#ucon-num').val();
            var usize = $('#ucon-size').val();
            var usequence = $('#ucon-sequence').val();
            var id = $('#ucon_id').val();
            
            var url = '{{route("content.update")}}';         

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                data: {title : utitle, id : id, description : udescription, number : unumber, size : usize, sequence : usequence},
                success: function(data) {
                    if(data['success']){
                        $('#edit-content-modal').modal('hide')
                        $('#content-title-'+id).text(utitle);
                        $('#content-desc-'+id).text(udescription);
                        $('#content-num-'+id).text(unumber);
                        $('#content-size-'+id).text(usize);
                        $('#edit-content-position'+id+'').attr('data-title', utitle);
                        $('#edit-content-position'+id+'').attr('data-description', udescription);
                        $('#edit-content-position'+id+'').attr('data-number', unumber);
                        $('#edit-content-position'+id+'').attr('data-size', usize);
                        $('#edit-content-position'+id+'').attr('data-sequence', usequence);
                        feather.replace();
                    }
                    else{
                        toastr["error"]("Error.");
                    }
                }
            });
            
        });

        $('.menu_name_save').on('click', function(e){
            var menu_name = $('.menu_name').val();
            var id = $(this).data('id');
            var url = "{{route ('pagenamesave')}}";

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                data: {menu_name : menu_name, id : id},
                success: function(data) {
                    if(data['success']){
                        toastr["success"]("Changed Successfully.");
                    }
                    else{
                        toastr["error"]("Error.");
                    }
                }
            });
        });

        $('.footer-save-btn').on('click', function(e){
            var footer_text = $('#footer-text').val();
            var id = $(this).data('id');
            var url = "{{route ('footersave')}}";
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                data: {footer_text : footer_text, id : id},
                success: function(data) {
                    if(data['success']){
                        toastr["success"]("Changed Successfully.");
                    }
                    else{
                        toastr["error"]("Error.");
                    }
                }
            });
        });

        $(document).on('click', '.time-content-page', function(e){
            var id = $(this).attr('data-id');
            console.log('id----------->', id);
        });
    </script>
</body>
