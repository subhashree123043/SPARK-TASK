$(document).ready( function () {
    var datatabe=$('#myTable').DataTable(
        {
            "pageLength":5,
            "order":false,
            "bLengthChange":false,
            "dom":'<"top">ct<"top"p><"clear">'
        }
    );
    $('#search').keyup(function(){
        datatabe.search(this.value).draw();
    });
} );
