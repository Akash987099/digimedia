@extends('admin.layout.master')

@section('web')

<div class="main-content ">

    <section class="section" style="margin-top:-34px;">

        <div class="section-body">

            <div class="row">



                <div class="col-12">

                    <div class="card">

                        <div class="card-header supreme-container">

                            <h4>All Pages Data</h4>

                            

                        </div>

                        <hr>

                        
                       
                        <div class="tab-pane fade show active px-2" id="contact3" role="tabpanel"
                        aria-labelledby="contact-tab3">

                        <div class="table-responsive">

                            <table class="table table-striped xys" id="datatable">
                                <thead>
                                <tr>

                                    <th>Sr No.</th>
                                    <th>Menu</th>
                                    <th>Submenu</th>
                                    <th>Page Slug</th>
                                    <th>Page Title</th>
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
              <h5 class="card-title">Add Web Pages</h5>
  
              <!-- Vertical Form -->
              
                <form method="post" enctype="multipart/form-data" id="createform" class="row g-3">
                @csrf
                

                <div class="col-4">
                  <label for="inputNanme4" class="form-label">Select Menu <span class="validation">*</span></label>
                  
                  <select name="menu_name" id="menu_name" class="form-control country">
  
                      <option value="">Select Menu</option>
  
                      @foreach ($menu as $key => $val)
  
                      <option value="{{$val->id}}">{{$val->name}}</option>
                          
                      @endforeach
  
                  </select>
                  <span id="state-error"></span>
                </div>

                <div class="col-4">
                  <label for="inputNanme4" class="form-label">Select Submenu </label>
                  
                  <select name="submenu" id="submenu" class="form-control state">
  
                      <option value="">select Submenu</option>
  
                      @foreach ($submenu as $key => $val)
  
                      <option value="{{$val->id}}">{{$val->name}}</option>
                          
                      @endforeach
  
                  </select>
                  <span id="state-error"></span>
                </div>

                <div class="col-4">
                  <label for="inputNanme4" class="form-label">Page Name <span class="validation">*</span></label>
                  <input type="text" name="page_slug" class="form-control" id="page_slug" required>
                  <span id="name-error"></span>
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

  <br>

  <section class="section titlechangepage" style="display: none;">
    <div class="row">
      

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Web Pages</h5>

            <!-- Vertical Form -->
            
              <form method="post" enctype="multipart/form-data" id="titlechange" class="row g-3">
              @csrf
              
              <input type="hidden" name="updateid" class="updateid">

              <div class="col-4">
                <label for="inputNanme4" class="form-label">Select Menu <span class="validation">*</span></label>
                
                <select name="menu_name" id="menu_name" class="form-control country menu_name">

                    <option value="">Select Menu</option>

                    @foreach ($menu as $key => $val)

                    <option value="{{$val->id}}">{{$val->name}}</option>
                        
                    @endforeach

                </select>
                <span id="state-error"></span>
              </div>

              <div class="col-4">
                <label for="inputNanme4" class="form-label">Select Submenu </label>
                
                <select name="submenu" id="submenu" class="form-control state submenu">

                    <option value="">select Submenu</option>

                    @foreach ($submenu as $key => $val)

                    <option value="{{$val->id}}">{{$val->name}}</option>
                        
                    @endforeach

                </select>
                <span id="state-error"></span>
              </div>

              <div class="col-4">
                <label for="inputNanme4" class="form-label">Page Name <span class="validation">*</span></label>
                <input type="text" name="page_slug" class="form-control pageslug" id="page_slug" required>
                <span id="name-error"></span>
              </div>

              
        <div class="col-12 p-2">
                <div class="text-left">
                  <button type="submit" class="btn btn-primary btn-sm" id="update">Submit</button>
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
            <h5 class="card-title">Update Page</h5>
  
            <!-- Update Form -->

            <form method="post" enctype="multipart/form-data" id="updatefrom" class="row g-3">
              @csrf
              
              <input type="hidden" name="updateid" id="updateid" >

              <div class="col-4">
                <label for="inputNanme4" class="form-label">Select Menu <span class="validation">*</span></label>
                
                <select name="menu_name" id="update_menu_name" class="form-control country">

                    <option value="">Select Menu</option>

                    @foreach ($menu as $key => $val)

                    <option value="{{$val->id}}">{{$val->name}}</option>
                        
                    @endforeach

                </select>
                <span id="state-error"></span>
              </div>

              <div class="col-4">
                <label for="inputNanme4" class="form-label">Select Submenu </label>
                
                <select name="submenu" id="update_submenu" class="form-control state">

                    <option value="">select Submenu</option>

                    @foreach ($submenu as $key => $val)

                    <option value="{{$val->id}}">{{$val->name}}</option>
                        
                    @endforeach

                </select>
                <span id="state-error"></span>
              </div>

              <div class="col-4">
                <label for="inputNanme4" class="form-label">Page Slug <span class="validation">*</span></label>
                <input type="text" name="page_slug" class="form-control" id="update_page_slug" required>
                <span id="name-error"></span>
              </div>

              <div class="col-4">
                <label for="inputNanme4" class="form-label">Page Title <span class="validation">*</span></label>
                <input type="text" name="page_title" class="form-control" id="update_page_title" required>
                <span id="pincode-error"></span>
              </div>

              <div class="col-4">
                <label for="inputNanme4" class="form-label">Page Image</label>
                <input type="file" name="page_image1" class="form-control" id="update_page_image1">
                <span id="name-error"></span>
              </div>

              <div class="col-4">
                <label for="inputNanme4" class="form-label">Page Video Link</label>
                <input type="text" name="page_video_1" class="form-control" id="update_page_video_1">
                <span id="name-error"></span>
              </div>

              <div class="col-8">
                <label for="inputNanme4" class="form-label">Page Content <span class="validation">*</span></label>
                <textarea name="page_content" class="form-control" id="update_page_content" required></textarea>
               
                <span id="name-error"></span>
              </div>

              <div class="col-6">
                <label for="inputNanme4" class="form-label">Page Title 2 <span class="validation">*</span></label>
                <input type="text" name="page_title_2" class="form-control" id="update_page_title_2" required>
                <span id="pincode-error"></span>
              </div>
              <div class="col-6">
                <label for="inputNanme4" class="form-label">Page Content 2<span class="validation">*</span></label>
                <textarea name="page_content_2" class="form-control" id="update_page_content_2" required></textarea>
               
                <span id="name-error"></span>
              </div>

              <div class="col-6">
                <label for="inputNanme4" class="form-label">Page Title 3<span class="validation">*</span></label>
                <input type="text" name="page_title_3" class="form-control" id="update_page_title_3" required>
                <span id="pincode-error"></span>
              </div>
              <div class="col-6">
                <label for="inputNanme4" class="form-label">Page Content 3<span class="validation">*</span></label>
                <textarea name="page_content_3" class="form-control" id="update_page_content_3" required></textarea>
               
                <span id="name-error"></span>
              </div>

              <div class="col-6">
                <label for="inputNanme4" class="form-label">Page Title 4<span class="validation">*</span></label>
                <input type="text" name="page_title_4" class="form-control" id="update_page_title_4" required>
                <span id="pincode-error"></span>
              </div>
              <div class="col-6">
                <label for="inputNanme4" class="form-label">Page Content 4<span class="validation">*</span></label>
                <textarea name="page_content_4" class="form-control" id="update_page_content_4" required></textarea>
               
                <span id="name-error"></span>
              </div>

              <div class="col-4">
                <label for="inputNanme4" class="form-label">Page Title 5<span class="validation">*</span></label>
                <input type="text" name="page_title_5" class="form-control" id="update_page_title_5" required>
                <span id="pincode-error"></span>
              </div>
              <div class="col-4">
                <label for="inputNanme4" class="form-label">Upload Image</label>
                <input type="file" name="page_image_5" class="form-control" id="update_page_image_5">
                <span id="pincode-error"></span>
              </div>

              <div class="col-4">
                <label for="inputNanme4" class="form-label">Page Content 5</label>
                <textarea name="page_content_5" class="form-control" id="update_page_content_5"></textarea>
               
                <span id="name-error"></span>
              </div>

              

              

                <hr style="width:100%;height:2px;color:black;">
                


               
                <div class="col-12">
               <span> <h5 class="card-title">Banner Section</h5></span>
                </div>

                <div class="col-4">
                  <label for="inputNanme4" class="form-label">Upload Banner 1</label>
                  <input type="file" name="banner1_file" class="form-control" id="update_banner1_file">
                  <span id="name-error"></span>
                </div>

                <div class="col-2">
                  <label for="inputNanme4" class="form-label">Banner 1 Title</label>
                  <input type="text" name="banner1_title" class="form-control" id="update_banner1_title">
                  <span id="name-error"></span>
                </div>

                <div class="col-6">
                  <label for="inputNanme4" class="form-label">Banner 1 Content </label>
                  <textarea name="banner1_content" class="form-control" id="update_banner1_content"></textarea>
                 
                  <span id="name-error"></span>
                </div>

                <div class="col-4">
                  <label for="inputNanme4" class="form-label">Upload Banner 2</label>
                  <input type="file" name="banner2_file" class="form-control" id="update_banner2_file">
                  <span id="name-error"></span>
                </div>

                <div class="col-2">
                  <label for="inputNanme4" class="form-label">Banner 2 Title</label>
                  <input type="text" name="banner2_title" class="form-control" id="update_banner2_title">
                  <span id="name-error"></span>
                </div>

                <div class="col-6">
                  <label for="inputNanme4" class="form-label">Banner 2 Content</label>
                  <textarea name="banner2_content" class="form-control" id="update_banner2_content"></textarea>
                 
                  <span id="name-error"></span>
                </div>

                {{-- Marquee Section --}}

                <div class="col-12">
                  <span> <h5 class="card-title">Marquee Section</h5></span>
                   </div>

                

                <div class="col-6">
                  <label for="inputNanme4" class="form-label">Marquee Content </label>
                  <textarea name="marquee_content" class="form-control" id="update_marquee_content"></textarea>
                 
                  <span id="name-error"></span>
                </div>

                <div class="col-6">
                  <label for="inputNanme4" class="form-label">Upload Gallery images</label>
                  <input type="file" name="galleryimage" multiple class="form-control" id="update_galleryimage">
                  <span id="name-error"></span>
                </div>

                {{-- Marquee Section --}}



              <div class="col-12 p-2">
                <div class="text-left">
                  <button type="submit" class="btn btn-primary btn-sm" id="save">Update</button>
                </div>
              </div>
              
             
            </form>

            {{-- Update Form --}}
            {{-- <form class="row g-3" id="updatefrom" method="POST">
              @csrf
  
              <input type="text" name="updateid" id="updateid" >

              <div class="col-4">
                <label for="inputNanme4" class="form-label">Select Menu <span class="validation">*</span></label>
                
                <select name="menu_name" id="menu_name" class="form-control country">
  
                    <option value="">Select Menu</option>

                    @foreach ($menu as $key => $val)

                    <option value="{{$val->id}}">{{$val->name}}</option>
                        
                    @endforeach

                </select>
                <span id="state-error"></span>
              </div>
  
              <div class="col-4">
                  <label for="inputNanme4" class="form-label">Select Submenu<span class="validation">*</span></label>
                 
                  <select name="submenu" id="submenu" class="form-control state">
  
                    <option value="">select Submenu</option>

                    @foreach ($submenu as $key => $val)

                    <option value="{{$val->id}}">{{$val->name}}</option>
                        
                    @endforeach

                </select>
                  <span id="state-error"></span>
                </div>

                <div class="col-4">
                    <label for="inputNanme4" class="form-label">Page Title <span class="validation">*</span></label>
                    <input type="text" name="page_title" class="form-control" id="update_page_title" required>
                    <span id="pincode-error"></span>
                  </div>
    
                  <div class="col-4">
                    <label for="inputNanme4" class="form-label">Page Content <span class="validation">*</span></label>
                    <input type="text" name="page_content" class="form-control" id="update_page_content" required>
                    <span id="name-error"></span>
                  </div>
  
                  <div class="col-4">
                      <label for="inputNanme4" class="form-label">Page Slug <span class="validation">*</span></label>
                      <input type="text" name="page_slug" class="form-control" id="page_slug" required>
                      <span id="name-error"></span>
                    </div>


  
               
  
               
  
                <div class="col-12 p-2">
                  <div class="text-left">
                    <button type="submit" class="btn btn-primary btn-sm" id="update">Update</button>
                  </div>
                </div>

            </form> --}}
  
          </div>
        </div>
  
        
  
        
      </div>
    </div>
  </section>
      

</div>


<script>

  $(document).ready(function(){

    $('.country').on('change', function() {
                var selectValue = $(this).val();
                if (selectValue) {
                    $.ajax({
                        url: "{{ route('admin.getsubmenus') }}",
                        type: 'GET',
                        data: { id: selectValue },
                        success: function(response) {
                          
                            var stateDropdown = $('.state');
                            stateDropdown.empty(); 
                            stateDropdown.append('<option value="">Select Submenu</option>'); 
                            
                            $.each(response.data, function(key, value) {
                              // alert(value);
                                stateDropdown.append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#state').empty().append('<option value="">Select Submenu</option>'); 
                }
            });

    
    
  
    $('#Addbutton').on('click' , function(){

      window.scrollTo({
                   top: 100000,
                    behavior: 'smooth' 
                });
  
      $('.createforms').css('display', 'block');
      $('.updateforms').css('display' , 'none');
  
    });
  
  
    var table = $('#datatable').DataTable({
  
          processing: true,
          serverSide: true,
          searching:true,
         ajax : "{{route('admin.pagesAjax')}}",
         columns: [
              {
                  data: 'id',
              },
              {
                  data: 'menu_name',
                  orderable: false,
              },
              {
                  data : 'submenu_name',
                  orderable: false,
              },
              {
                  data: 'page_slug',
                  orderable: false,
              },
              {
                  data: 'page_title',
                  orderable: false,
              },
              {
                  data : 'action',
                  orderable: false,
              }
         ],
  
    });


    $('body').on('click' , '.delete' , function(e){
      e.preventDefault();
      // alert('calling');

      var id = $(this).attr('data-id');

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
          url: "{{route('admin.delete-pages')}}",
          type: "POST",
          data: {id : id},
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


    $('body').on('click' , '.updatetitle' , function(){

      // alert('calling');

      window.scrollTo({
                   top: 100000,
                    behavior: 'smooth' 
                });
                
      var id = $(this).attr('data-id');

      $.ajax({
          url: "{{route('admin.delete-pages')}}",
          type: "POST",
          data: {update : id},
          success: function(response) {
              console.log(response);
  
        if(response.status == "success"){


          // titlechange

          $('.menu_name').val(response.data.menu_id);
          $('.submenu').val(response.data.submenu_id);
          $('.pageslug').val(response.data.slug);
          $('.updateid').val(response.data.id);
  
        $('.titlechangepage').css('display' , 'block');
        
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

    });


   
    //Update Form
  
    $('body').on('click' , '.edit' , function(){
      // alert('hello');
      // updateforms
      $('.createforms').css('display', 'none');
      var id = $(this).attr('data-id');
      // alert(id);
  
      $.ajax({
        url : "{{route('admin.pagesdelete')}}",
        type : "GET",
        data : {update : id},
        success : function(response){
          // console.log(response);
           if(response.status == "success"){
            $('#updateid').val(response.data.id);
            $('#update_menu_name').val(response.data.menu_id);
            $('#update_submenu').val(response.data.submenu_id);
            $('#update_page_slug').val(response.data.slug);

            

            $('#update_page_title').val(response.data.title);
            $('#update_page_content').val(response.data.content);
            $('#update_page_video_1').val(response.data.video_link);
            
            $('#update_page_title_2').val(response.data.page_title_2);
            $('#update_page_content_2').val(response.data.page_content_2);
            $('#update_page_title_3').val(response.data.page_title_3);
            $('#update_page_content_3').val(response.data.page_content_3);

            $('#update_page_title_4').val(response.data.page_title_4);
            $('#update_page_content_4').val(response.data.page_content_4);
            $('#update_page_title_5').val(response.data.page_title_5);
            $('#update_page_content_5').val(response.data.page_content_5);


            $('#update_banner1_title').val(response.data.banner1_title);
            $('#update_banner1_content').val(response.data.banner1_content);

            $('#update_banner2_title').val(response.data.banner2_title);
            $('#update_banner2_content').val(response.data.banner2_content);

            $('#update_marquee_content').val(response.data.marquee_content);

           




            // $('#pincode').val(response.data.pincode);
            // $('#Name').val(response.data.name);
             
             $('.updateforms').css('display' , 'block');
  
           }
        }
      });
  
    });
      
    // $('#update')
    $('#update').on('click', function(e) {
  
      // alert('hello');
      e.preventDefault();
      var formdata = $('#titlechange').serialize();
  
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
          url: "{{route('admin.update-page')}}",
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

    // New Upload Form

    $('#createform').on('submit', function(e) {
        e.preventDefault(); 
        var formData = new FormData(this);
        Swal.fire({
            title: "Please wait...",
        })
        Swal.showLoading();

        $.ajax({
            url: "{{route('admin.pagessave')}}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status==true){
                            Swal.fire({
                                icon: 'success',
                                text: response.msg,
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                            }).then(() => {
                                    
                                    location.reload();
                                });
                        }else if(response.status==false){
                            Swal.fire({
                                icon: 'error',
                                text: response.msg,
                                showConfirmButton: false,
                            });
                        }else {
                            alert('Something Went Wrong! Please try again');
                        }
                
            },

            
           
        });
    });

    
    //New Upload Form
  
  
      $('#save1').on('click', function(e) {
      e.preventDefault();
  
      var formdata = $('#createform1').serialize();
  
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
          url: "{{route('admin.pagessave')}}",
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
  

{{--  --}}


@endsection