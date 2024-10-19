@extends('admin.layout.master')

@section('web')

<div class="main-content ">

    <section class="section" style="margin-top:-34px;">

        <div class="section-body">

            <div class="row">



                <div class="col-12">

                    <div class="card">

                        <div class="card-header supreme-container">

                            <h4>Project Master</h4>

                        </div>

                        <hr>

                       
                        <div class="tab-pane fade show active px-2" id="contact3" role="tabpanel"
                        aria-labelledby="contact-tab3">

                        <div class="table-responsive">

                            <table class="table table-striped xys" id="datatable">
                                <thead>
                                <tr>

                                    <th>Sr No.</th>
                                    <th>Project Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody class="alltbody">
                                                                                </tbody>

                            </table>

                        </div>

                    </div>

                    <br>
                    <div class="text-left px-2">
                        <button type="submit" class="btn btn-primary btn-sm" id="Addbutton">Add</button>
                        {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
                      </div>

                      <br>

                    </div>

                </div>

            </div>

        </div>

    </section>

<section class="section createforms" style="display: none;">
  <div class="row">
    

    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Service Page</h5>

          
          <form class="row g-3" id="createform" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-4">
              <label for="menu" class="form-label">Select Page <span class="validation">*</span></label>
             <select name="pageid" id="" class="form-control" required>
                  <option value="">Select Page</option>
                @foreach ($page as $key => $val)

                <option value="{{$val->id}}">{{$val->slug}}</option>
                    
                @endforeach

             </select>
              <span id="menu-error"></span>
            </div>

            <div class="col-4">
                <label for="menu" class="form-label">Project Name <span class="validation">*</span></label>
                <input type="text" name="name" class="form-control citizen" id="slug" required>
                <span id="name-error"></span>
              </div>

              <div class="col-4">
                <label for="menu" class="form-label">Service Image <span class="validation">*</span></label>
                <input type="file" name="image" class="form-control citizen" id="slug" required>
                <span id="image-error"></span>
              </div>

              <div class="col-4">
                <label for="menu" class="form-label">Content <span class="validation">*</span></label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control" required></textarea>
                <span id="slug-error"></span>
              </div>


            <div class="col-12 p-2">
              <div class="text-left">
                <button type="submit" class="btn btn-primary btn-sm" id="save">Submit</button>
                
              </div>
            </div>

        
          </form>

        </div>
      </div>

      

      
    </div>
  </div>
</section>


<section class="section updateforms" style="display: none;">
    <div class="row">
      
  
      <div class="col-lg-12">
  
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Service Page</h5>
  
            
            <form class="row g-3" id="updateform" method="POST" enctype="multipart/form-data">
              @csrf
  
              <input type="hidden" id="updateid" name="updateid">
              <div class="col-4">
                <label for="menu" class="form-label">Select Page <span class="validation">*</span></label>
               <select name="pageid" id="pageid" class="form-control" required>
                    <option value="">Select Page</option>
                  @foreach ($page as $key => $val)
  
                  <option value="{{$val->id}}">{{$val->slug}}</option>
                      
                  @endforeach
  
               </select>
                <span id="menu-error"></span>
              </div>
  
              <div class="col-4">
                  <label for="menu" class="form-label">Service Name <span class="validation">*</span></label>
                  <input type="text" name="name" class="form-control citizen" id="name" required>
                  <span id="name-error"></span>
                </div>
  
                <div class="col-4">
                  <label for="menu" class="form-label">Service Image <span class="validation">*</span></label>
                  <input type="file" name="image" class="form-control citizen" id="image">
                  <span id="image-error"></span>
                </div>
  
                <div class="col-4">
                  <label for="menu" class="form-label">Content <span class="validation">*</span></label>
                  <textarea name="description" id="description" cols="30" rows="10" class="form-control" required></textarea>
                  <span id="slug-error"></span>
                </div>
  
  
              <div class="col-12 p-2">
                <div class="text-left">
                  <button type="submit" class="btn btn-primary btn-sm" id="save">Submit</button>
                  
                </div>
              </div>
  
          
            </form>
  
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
         ajax : "{{route('admin.projectAjax')}}",
         columns: [
              {
                  data: 'id',
              },
              {
                  data : 'name',
                  orderable: false,
              },
              {
                  data : 'slug',
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
                        url : "{{route('admin.project-delete')}}",
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
        url : "{{route('admin.project-delete')}}",
        type : "GET",
        data : {update : id},
        success : function(response){
          console.log(response.data);
          
           if(response.status == "success"){
            
            
            $('#updateid').val(response.data.id);
            $('#pageid').val(response.data.page_id);
            $('#name').val(response.data.project_name);
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
          url: "{{route('admin.project-update')}}",
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
                url: "{{route('admin.ProjectAdd')}}",
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