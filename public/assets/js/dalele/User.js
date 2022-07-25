
$(document).ready(function() {
  $('#example').DataTable( {
      order: [],
      rowGroup: {
          dataSrc: 2
      }
  } );
} );

function ConfirmDelete(id,type){

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            var url = $('#con_'+id).attr('data-url'); 
           
           // var id = $('.DleteBtn').attr('data-id'); 
            $.ajax({
              type:'POST',
              url:url,
              data:{id:id,type:type},
              headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
              success:function(response){
                var Data = $.parseJSON(response);
               window.location.href = Data.url;
      
        }
      })}})}
