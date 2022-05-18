@include('layouts.header')
<link
    href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

@section('title', 'Home')

<style>
    body{
        background-color: #F6F5E6 !important;
    }
    td .p{
        font-size: 14px !important;
    }
    .footer-exp{
        font-size: 14px;
        margin-top: 20px;
        width: 60%;
        margin-left: auto;
        margin-right: auto;
    }
    .page-view{
        background : url('{{ asset("/assets/images/Template/complex/template-background.png") }} ');
        background-repeat: no-repeat;
        background-position: center top;
        height: 930px;
        padding: 70px 70px 0px 70px;
        margin-bottom: 30px;
        overflow: hidden;
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
        margin-top: 20px;
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
        td p, td, .footer-exp{
            font-size: 12px;
        }
    }
    @media only screen and (max-width: 992px) {
        .templatecontainer, .templatecontainer-sm, .templatecontainer-md, .templatecontainer-lg {
            max-width: 860px;
        }

    }
    @media only screen and (max-width: 768px) {
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
        .page-view .footer-exp{
            width: 100%;
            font-size: 10px;
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
        td p, td, .footer-exp{
            font-size: 10px;
        }
        .page-view{
            padding: 70px 0px 0px 0px;
        }
    }
    @media (max-width: 576px) {
        td h4{
            font-size: 12px;
        }
        td p, td, .footer-exp{
            font-size: 10px;
            line-height: 1.0rem !important;
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
                    <div class="pt-3">

                        {{-- <div>
                            <img src={{asset("/assets/images/Template/complex/temp-logo.png")}} alt="template logo" style="display: block;margin:auto;" />
                        </div> --}}
                        {{-- <div class='mt-2' style='width: 100%;text-align: center;'><div style='margin:0 auto;' class='d-flex justify-content-center'><span><img src={{asset('/assets/images/Template/complex/left-shape.png')}} alt='left' /></span><span class='text-uppercase' style='font-weight:500;font-size: 18px;color:gray;'><select class='form-control' id='cate_id' style='background-color: #F6F5E6;'>@foreach ($categories as $category)<option value='{{$category->id}}'>{{$category->name}}</option>@endforeach</select></span><span><img src={{asset('/assets/images/Template/complex/right-shape.png')}} alt='right' /></span></div></div> --}}
                        
                        <div id="table_view" class="page-view">
                            
                        </div>
                        <div id="main_test">
                            
                        </div>
                    </div>
                <!-- Centered Aligned Tabs ends -->
            </div>
        </div>
        <!-- END: Content-->
    </div>
    <div style="height: 100px;">

    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    
    @include('layouts.footer')
    <script>

        var header = "<div class='mt-2' style='width: 100%;text-align: center;'><div style='margin:0 auto;' class='d-flex justify-content-center'><span><img src={{asset('/assets/images/Template/complex/left-shape.png')}} alt='left' /></span><span class='text-uppercase' style='font-weight:500;font-size: 18px;color:gray;'><select class='form-control' id='cate_id' style='background-color: #F6F5E6;'>@foreach ($categories as $category)<option value='{{$category->id}}'>{{$category->name}}</option>@endforeach</select></span><span><img src={{asset('/assets/images/Template/complex/right-shape.png')}} alt='right' /></span></div></div>";

        var footer = `<div class='d-flex justify-content-center footer-exp text-uppercase'>@foreach ($pages as $page){{ $page->footer_text }}@endforeach</div>`;
        $(window).on('resize', function(){
            refresh();
        });
        refresh();

        $(document).on('change', '#cate_id', function(e){
            selCategory = $('#cate_id').val();
            refresh();
        });
        var selCategory = '{{$firstid}}';
        console.log('selCategory', selCategory);

        function refresh() {
            var cate_val = $('#cate_id').val() ? $('#cate_id').val() : '{{$firstid}}';
            console.log('cate_val', cate_val);
            var url = "{{route ('category.get')}}";

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                data: {id : cate_val},
                success: function(data) {
                    if(data['success']){
                        console.log('success data', data['contents']);
                        var contents = data['contents'];
                        var i = 0;
                        var lengths = data['contents'].length;
                        var content = '';
                        for(i; i<lengths; i++){
                            content = content + "<tr><td><h4>" + contents[i].title + "</h4><p>" + contents[i].description + "</p></td><td style='text-align: right;'>" + contents[i].number + "</td><td>" + contents[i].size + "</td></tr>";
                        }
                        var data = "<table id='tb_main' class='table mt-2'><tbody class='content-tpage'>"+content+"</tbody></table>" + footer;
                        
                        $('#table_view').html(data);
                        $('#main_test').empty();
                        $('#table_view').show();
                        refreshPdf();
                        
                        $('#table_view').hide();
                    }
                    else{
                        toastr["error"]("Error.");
                    }
                }
            });
        }
        function refreshPdf() {
            var foo_hei = $('.footer-exp').height();
            var head_hei = 40;
            var j = 0;
            var children = $("#tb_main").find('tr');
            var max_height = 820;
            var temp_height = 0;
            
            var temp_tbody = document.createElement("tbody");
            $(temp_tbody).addClass('content-tpage');
            
            while(j < children.length ){
                if(j == 0){
                    temp_height += head_hei;
                }
                temp_height += children.eq(j).height();
                
                if(j === children.length-1){
                    temp_height += foo_hei;
                }
                if (temp_height > max_height) {
                    let page_view_div = document.createElement("div");
                    let tbl = document.createElement("table");
                    $(tbl).addClass('table');
                    
                    tbl.append(temp_tbody);
                    page_view_div.append(tbl);
                    $('#main_test').append(page_view_div);
                    temp_height = 0;
                    temp_tbody = document.createElement("tbody");
                    $(temp_tbody).addClass('content-tpage');
                    
                    $(page_view_div).addClass('page-view page-response');
                    j = j-1;                       
                }
                $(children[j]).appendTo(temp_tbody);
                
                j++;
            }

            let page_view_div = document.createElement("div");
            let tbl = document.createElement("table");
            $(tbl).addClass('table');
            
            tbl.append(temp_tbody)
            page_view_div.append(tbl);
            $('#main_test').append(page_view_div);
            $(page_view_div).addClass('page-view page-response');
            
            $('.page-response').first().prepend(header);
            $('.page-response').last().append(footer);
            $('#cate_id').val(selCategory);
        }
        
    </script>
</body>
