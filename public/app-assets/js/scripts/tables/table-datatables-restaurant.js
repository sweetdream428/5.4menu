/**
 * DataTables Advanced
 */

 'use strict';

 $(function () {
   var isRtl = $('html').attr('data-textdirection') === 'rtl';
 
   var dt_basic_table = $('.datatables-basic');    
 
   if (dt_basic_table.length) {
    var dt_basic = dt_basic_table.DataTable({
         columns: [
             // columns according to JSON
             { data: 'name' },
             { data: 'address' },
             { data: 'menu_id' },
             { data: 'action' }
         ],
         columnDefs: [{
             },
             {
                 targets: 0,
                 responsivePriority: 4,
             },
             {
                 targets: 2,
                 responsivePriority: 4,
             }
         ],
         order: [
             [0, 'asc']
         ],
         dom: '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
             '<"col-lg-12 col-xl-6" l>' +
             '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
             '>t' +
             '<"d-flex justify-content-between mx-2 row mb-1"' +
             '<"col-sm-12 col-md-6"i>' +
             '<"col-sm-12 col-md-6"p>' +
             '>',
         // Buttons with Dropdown
         // For responsive popup
         responsive: {
             details: {
                 display: $.fn.dataTable.Responsive.display.modal({
                     header: function(row) {
                         var data = row.data();
                         return 'Details of ' + data['name'];
                     }
                 }),
                 type: 'column',
                 renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                     tableClass: 'table',
                     columnDefs: [{
                             targets: 0,
                             visible: false
                         }
                     ]
                 }),
             }
         },
         language: {
             paginate: {
                 // remove previous & next text from pagination
                 previous: '&nbsp;',
                 next: '&nbsp;'
             }
         }
    });
   }
   $(document).on('click', '.sorting_1', function(e){
     feather.replace();
   });  
 
   $(document).on('click', '.res-remove-btn', function(e){
     e.preventDefault();
     var id = $(this).data('id');
     var url = '/res-remove/' + id;
     dt_basic_table.DataTable().row($(this).parents('tr')).remove().draw();
       $.ajax({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         type: 'post',
         url: url,
         success: function(data) {
             if(data['success']){
               console.log('successly rwemoved');
               toastr["success"]("Removed Successfully.")
             }
             else{
             }
         }
     });
     
   });

   $(document).on('submit', '.form-res-create', function(e){
    var url = "/res-create";
    var address = $('#res-addr').val();
    var name = $('#res-name').val();
    var menu_id = $('#menu_id').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        data: {address : address, name : name, menu_id : menu_id},
        url: url,
        success: function(data) {
            if(data['success']){
                toastr["success"]("Saved Successfully.");
                dt_basic.row
                    .add({
                    name: name,
                    address: address,
                    menu_id: menu_id,
                    action: null
                    })
                    .draw();
                // location.reload();
            }
            else{
                toastr["error"]("Error");
            }
        }
    });
});
 
 });
 