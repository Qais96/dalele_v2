
$(document).ready(function() {
  $('#example').DataTable( {
      order: [],
      rowGroup: {
          dataSrc: 2
          
      }
  } );
} );
function ConfirmDelete(){


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
            var url = $('.DleteBtn').attr('data-url'); 
            var id = $('.DleteBtn').attr('data-id'); 
           
            $.ajax({
              type:'POST',
              url:url,
              data:{id:id},
              headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
              success:function(response){
              
                var Data = $.parseJSON(response);
                
               window.location.href = Data.url;
      
        }
      })}})}

      
      function GetSummary(id){
     
        var url = $('#SummaryBtn_'+id).attr('data-url'); 
     
            $.ajax({
              type:'POST',
              url:url,
              data:{id:id},
              headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
              success:function(response){
            
                var Data = $.parseJSON(response);
                Swal.fire({
                  title: 'New Case!',
                  text: 'Discription',
                  html: ' <label for="exampleFormControlTextarea1">Discription</label>' +
                  ' <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">'+ Data.Summary+'</textarea>' ,
                })
             
      
        }
      })
  
        
        }
    
        function StartChat(id){
          var url='https://app.daleli.org/chatify/'+id;


              window.location.href = url;
        
            }
