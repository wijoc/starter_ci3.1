$(document).ready(function(){
    var data = $("#table-data").DataTable({
      'responsive': true,
      'autoWidth' : false,
      'processing' : true, // Fitur control indicator "processing"
      'serverside' : true, // Fitur control datatables server-side processing mode
      //'order'      : [1, 'desc'], // Set nilai default order ke null

      /** Load data dari function ajax list di controller */
      'ajax'  : {
          'url'   : list_url,
          'type'  : 'POST'
      },

      /** Set coloumn properties */
      'columnDefs'   : [{
          'targets'   : [0, -1],
          'orderable' : false
      }]
  })
})

function deleteRow (id) {
  event.preventDefault()

  $.ajax({
      url     : delete_url + id,
      method  : 'DELETE',
      datatype    : 'json',
      beforeSend  : function(){
          $(this).find(":submit").prop("disabled", true)
      },
      success : function(result){
        Swal.fire({
          position: "center",
          showConfirmButton: true,
          timer: 2500,
          icon: result.statusIcon,
          title: result.statusMsg
        })

        $("#table-data").DataTable().ajax.reload()
      },
      error   :  function(jqxhr, status, exception){
          alert("Exception", exception)
      }
  })
}
