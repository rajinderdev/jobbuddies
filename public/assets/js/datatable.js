$('.display').DataTable({
    "responsive": true,
    "ordering": false,
    "searching": false,
    "bInfo" : false,
    "bLengthChange": false,
    dom: 'lBfrtip',
        buttons: [
            
        ],
    lengthMenu: [
            [10, 40, 60, 80, 100],
            [10, 40, 60, 80, 100]
        ],
});
$(document).ready(function(){
    // $('.display').DataTable({
    //     responsive: true
    // });

    $('button[data-toggle="pill"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust()
            .responsive.recalc();
    });   
});
 

