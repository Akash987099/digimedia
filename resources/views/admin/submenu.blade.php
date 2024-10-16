@extends('admin.layout.master')

@section('web')

<div class="main-content ">

    <section class="section" style="margin-top:-34px;">

        <div class="section-body">

            <div class="row">



                <div class="col-12">

                    <div class="card">

                        <div class="card-header supreme-container">

                            <h4>submenus List</h4>

                            

                        </div>

                        <hr>

                        
                       
                        <div class="tab-pane fade show active px-2" id="contact3" role="tabpanel"
                        aria-labelledby="contact-tab3">

                        <div class="table-responsive">

                            <table class="table table-striped xys" id="datatable">
                                <thead>
                                <tr>

                                    <th>Sr No.</th>
                                    <th>Menu Name</th>
                                    <th>Submenu Name</th>
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
          <h5 class="card-title">Add Submenu</h5>

          <!-- Vertical Form -->
          <form class="row g-3" id="createform" method="POST">
            @csrf 

            <div class="col-4">
              <label for="inputNanme4" class="form-label">Select Menu <span class="validation">*</span></label>
              <select name="menu_name" id="menu_name" class="form-control">
                <option value="">Select Menu</option>
                @foreach ($menus as $key => $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
              <span id="menu_name-error"></span>
            </div>

            <div class="col-4">
              <label for="inputNanme4" class="form-label">Submenu <span class="validation">*</span></label>
              <input type="text" name="submenu_name" class="form-control citizen" id="submenu_name" required>
              <span id="submenu_name-error"></span>
            </div>

            <div class="col-4">
                <label for="inputNanme4" class="form-label">Slug <span class="validation">*</span></label>
                <input type="text" name="submenu_slug" class="form-control citizen" id="submenu_slug" required>
                <span id="submenu_slug-error"></span>
              </div>


            <div class="col-12 p-2">
              <div class="text-left">
                <button type="submit" class="btn btn-primary btn-sm" id="save">Submit</button>
              </div>
            </div>
            
          </form><!-- Vertical Form -->

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
        <h5 class="card-title">State Form</h5>

        <!-- Vertical Form -->
        <form class="row g-3" id="updatefrom" method="POST">
          @csrf

          <input type="hidden" name="updateid" id="updateid" >

          <div class="col-4">
            <label for="inputNanme4" class="form-label">Select Menu <span class="validation">*</span></label>
            <select name="menu_name" id="menu_name" class="form-control menu_name">
              <option value="">Select Menu</option>
              @foreach ($menus as $key => $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
            </select>
            <span id="menu_name_error"></span>
          </div>

          <div class="col-4">
            <label for="inputNanme4" class="form-label">Submenu <span class="validation">*</span></label>
            <input type="text" name="submenu_name" class="form-control citizen submenu_name" id="submenu_name" required>
            <span id="submenu_name_error"></span>
          </div>

          <div class="col-4">
              <label for="inputNanme4" class="form-label">Slug <span class="validation">*</span></label>
              <input type="text" name="submenu_slug" class="form-control citizen submenu_slug" id="submenu_slug" required>
              <span id="submenu_slug_error"></span>
            </div>

          <div class="col-12 p-2">
            <div class="text-left">
              <button type="submit" class="btn btn-primary btn-sm" id="update">Update</button>
              {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
            </div>
          </div>
        </form><!-- Vertical Form -->

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
  
    });
  
  
    var table = $('#datatable').DataTable({
  
          processing: true,
          serverSide: true,
          searching:true,
         ajax : "{{route('admin.submenusAjax')}}",
         columns: [
              {
                  data: 'id',
              },
              
              {
                  data: 'menuname',
                  orderable: false,
              },
              {
                  data: 'name',
                  orderable: false,
              },
              {
                  data: 'slug',
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
  
      //  alert(id);
  
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
                        url : "{{route('admin.submenu-delete')}}",
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
      // alert('hello');
      // updateforms
      var id = $(this).attr('data-id');
      // alert(id);
  
      $.ajax({
        url : "{{route('admin.submenu-delete')}}",
        type : "GET",
        data : {update : id},
        success : function(response){
          // console.log(response);
           if(response.status == "success"){
  
            $('#updateid').val(response.data.id);
            $('.submenu_slug').val(response.data.slug);
            $('.submenu_name').val(response.data.name);
            $('.menu_name').val(response.data.menu_id);
             
             $('.updateforms').css('display' , 'block');
  
           }
        }
      });
  
    });
      
    // $('#update')
    $('#update').on('click', function(e) {
  
      // alert('hello');
      e.preventDefault();
      var formdata = $('#updatefrom').serialize();
  
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
          url: "{{route('admin.update-submenu')}}",
          type: "POST",
          data: formdata,
          success: function(response) {
              console.log(response);
  
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
                    $('#' + field + '_error').text(message).addClass('text-danger');
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
  
  
      $('#save').on('click', function(e) {
        // alert('hello');
        // exit();
      e.preventDefault();
  
      var formdata = $('#createform').serialize();
  
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
          url: "{{route('admin.submenusave')}}",
          type: "POST",
          data: formdata,
          success: function(response) {
              console.log(response);
  
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
  
  
      });
  
  </script>

@endsection