$(document).ready(function(){
  $("#form-crud").on("submit", function(event){
    event.preventDefault()

    $.ajax({
        url     : $(this).attr("action"),
        method  : 'POST',
        data    : $(this).serialize(),
        datatype    : 'json',
        beforeSend  : function(){
            $(this).find(":submit").prop("disabled", true)
        },
        success : function(result){
            if(result.error){
              /** Error input Field 1 */
                if(result.errors.errorField1){
                    $("#input-field-1").addClass('is-invalid')
                    $("#error-field-1").css("display", "block")
                    $("#error-field-1").html(result.errorField1)
                } else {
                    $("#input-field-1").removeClass('is-invalid')
                    $("#error-field-1").css("display", "none")
                }

              /** Error input Field 2 */
                if(result.errors.errorField2){
                  $("#input-field-2").addClass('is-invalid')
                  $("#error-field-2").css("display", "block")
                  $("#error-field-2").html(result.errorField2)
              } else {
                  $("#input-field-2").removeClass('is-invalid')
                  $("#error-field-2").css("display", "none")
              }
            } else {
                $(".error-msg").css("display", "none")
                $(".is-invalid").removeClass("is-invalid")

                if(result.status == 'successInsert'){
                    $("#form-crud").trigger("reset")
                }

                Swal.fire({
                    position: "center",
                    showConfirmButton: true,
                    timer: 2500,
                    icon: result.statusIcon,
                    title: result.statusMsg
                })
            }
        },
        error   :  function(jqxhr, status, exception){
            alert("Exception", exception)
        }
    })
  })
})

function submitAjax (ajax_url) {
  // if (type == 'update') {
  //   var ajax_url = update_url
  // } else {
  //   var ajax_url = store_url
  // }

  event.preventDefault()

    $.ajax({
        url     : ajax_url,
        method  : $('#form-crud').attr("method"),
        data    : $('#form-crud').serialize(),
        datatype    : 'json',
        beforeSend  : function(){
            $('#form-crud').find(":submit").prop("disabled", true)
        },
        success : function(result){
            if(result.error){
              /** Error input Field 1 */
                if(result.errors.errorField1){
                    $("#input-field-1").addClass('is-invalid')
                    $("#error-field-1").css("display", "block")
                    $("#error-field-1").html(result.errorField1)
                } else {
                    $("#input-field-1").removeClass('is-invalid')
                    $("#error-field-1").css("display", "none")
                }

              /** Error input Field 2 */
                if(result.errors.errorField2){
                  $("#input-field-2").addClass('is-invalid')
                  $("#error-field-2").css("display", "block")
                  $("#error-field-2").html(result.errorField2)
              } else {
                  $("#input-field-2").removeClass('is-invalid')
                  $("#error-field-2").css("display", "none")
              }
            } else {
                $(".error-msg").css("display", "none")
                $(".is-invalid").removeClass("is-invalid")

                if(result.status == 'successInsert'){
                    $("#form-crud").trigger("reset")
                }

                Swal.fire({
                    position: "center",
                    showConfirmButton: true,
                    timer: 2500,
                    icon: result.statusIcon,
                    title: result.statusMsg
                })
            }
        },
        error   :  function(jqxhr, status, exception){
            alert("Exception", exception)
        }
    })
}
