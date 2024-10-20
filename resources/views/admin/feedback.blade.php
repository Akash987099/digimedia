@extends('admin.layout.master')

@section('web')

<div class="main-content ">

    <section class="section" style="margin-top:-34px;">

        <div class="section-body">

            <div class="row">



                <div class="col-12">

                    <div class="card">

                        <div class="card-header supreme-container">

                            <h4>Feedback Master</h4>


                        </div>

                        <hr>

                        
                       
                        <div class="tab-pane fade show active px-2" id="contact3" role="tabpanel"
                        aria-labelledby="contact-tab3">

                        <div class="table-responsive">

                            <table class="table table-striped xys" id="datatable">
                                <thead>
                                <tr>

                                    <th>Sr No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Project</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody class="alltbody">
                                                                                </tbody>

                            </table>

                        </div>

                    </div>

                  

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>


<script>

  $(document).ready(function(){
  
    $('#Addbutton').on('click' , function(){
  
      $('.createforms').css('display', 'block');
      $('.updateforms').css('display' , 'none');
  
    });
  
  
    var table = $('#datatable').DataTable({
  
          // dom: 'lBfrtip',
          // buttons: ['copy', 'excel', 'pdf', 'print'],
          processing: true,
          serverSide: true,
          searching:true,
         ajax : "{{route('admin.FeedbackAjax')}}",
         columns: [
              {
                  data: 'id',
              },
              {
                  data : 'name',
                  orderable: false,
              },
              {
                  data : 'email',
                  orderable: false,
              },
              {
                  data : 'star',
                  orderable: false,
              },
              {
                  data : 'action',
                  orderable: false,
              }
         ],
  
    });
  
    $('body').on('click' , '.delete' , function(){
  
      // alert('hello');
  
      var id = $(this).attr('data-id');

      // alert(id);
  
  
      Swal.fire({
            title: 'Confirm Submission',
            text: 'Are you sure you want to delete this record?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, submit!',
            cancelButtonText: 'Cancel',
          }).then((result) => {
                  if (result.isConfirmed) {
                    
                      $.ajax({
                        url : "{{route('admin.service-delete')}}",
                        type : "GET",
                        data : {id : id} , 
                        success : function(response){
  
                          if(response.status == "success"){
  
  Swal.fire({
          title: 'Success!',
          text: 'Success!',
          icon: 'success',
          confirmButtonText: 'OK'
      }).then((result) => {
          if (result.isConfirmed) {
             table.ajax.reload();
          }
      });
  
  }

  if(response.status == "already"){
  
  Swal.fire({
          title: 'Error!',
          text: 'This record was not deleted; it already exists elsewhere!',
          icon: 'error',
          confirmButtonText: 'OK'
      }).then((result) => {
          if (result.isConfirmed) {
             table.ajax.reload();
          }
      });
  
  }
  
                        },
                        error: function(xhr, status, error) {
  
  console.error(xhr.responseText);
  
  Swal.fire({
      title: 'Error!',
      text: 'There was a problem.',
      icon: 'error',
      confirmButtonText: 'OK'
  });
  }
                      });
  
                  }
                });
  
    });
  
  
    $('body').on('click' , '.edit' , function(){
      
    //  alert('hello');
      var id = $(this).attr('data-id');

    //   alert(id);
  
  
      $.ajax({
        url : "{{route('admin.service-delete')}}",
        type : "GET",
        data : {update : id},
        success : function(response){
          console.log(response.data);
          
           if(response.status == "success"){
            
            
            $('#updateid').val(response.data.id);
            $('#pageid').val(response.data.page_id);
            $('#name').val(response.data.name);
            $('#description').val(response.data.content)
            $('.updateforms').show();
  
           }
        }
      });
  
    });
      
    // $('#update')
    $('#updateform').on('submit', function(e) {
  
      // alert('hello');
      e.preventDefault();
      var formData = new FormData(this);
  
      Swal.fire({
            title: 'Confirm Submission',
            text: 'Are you sure you want to submit the form?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, submit!',
            cancelButtonText: 'Cancel',
          }).then((result) => {
                  if (result.isConfirmed) {
                    
  
          $.ajax({
          url: "{{route('admin.service-update')}}",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function(response) {
              
  
        if(response.status == "success"){
  
          Swal.fire({
                  title: 'Success!',
                  text: 'Success!',
                  icon: 'success',
                  confirmButtonText: 'OK'
              }).then((result) => {
                  if (result.isConfirmed) {
                      window.location.reload();
                  }
              });
  
        }
  
        if(response.status == "error"){
  
          $.each(response.message, function(field, message) {
                    $('#' + field).addClass('is-invalid');
                    $('#' + field + '-error').text(message).addClass('text-danger');
                }); 
  
       }
              
          },
          error: function(xhr, status, error) {
  
              console.error(xhr.responseText);
  
              Swal.fire({
                  title: 'Error!',
                  text: 'There was a problem.',
                  icon: 'error',
                  confirmButtonText: 'OK'
              });
          }
      });
  
  
                  }
              });
  
    });
  
    //Saving the form
    $('#createform').on('submit', function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    Swal.fire({
        title: 'Confirm Submission',
        text: 'Are you sure you want to submit the form?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, submit!',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.isConfirmed) {


            $.ajax({
                url: "{{route('admin.ServiceAdd')}}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    //console.log(response);

                    if (response.status == "success") {

                        Swal.fire({
                            title: 'Success!',
                            text: 'Success!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });

                    }

                    if (response.status == "error") {

                        $.each(response.message, function(field, message) {
                            $('#' + field).addClass('is-invalid');
                            $('#' + field + '-error').text(message).addClass('text-danger');
                        });

                    }

                },
                error: function(xhr, status, error) {

                    console.error(xhr.responseText);

                    Swal.fire({
                        title: 'Error!',
                        text: 'There was a problem.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });


        }
    });


});
  
  
      });
  
  </script>

@endsection