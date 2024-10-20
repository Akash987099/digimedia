@extends('admin.layout.master')

@section('web')

<div class="main-content ">

    <section class="section" style="margin-top:-34px;">

        <div class="section-body">

            <div class="row">



                <div class="col-12">

                    <div class="card">

                        <div class="card-header supreme-container">

                            {{-- <h4>All Settings</h4> --}}

                        </div>

                        <hr>

                        <div class="card-body " style="margin-top:2%;">

                            <ul class="nav nav-pills" id="myTab3" role="tablist" style="margin-left:2% ;">




                                <li class="nav-item">

                                    <a class="nav-link active tab_click class_check btn-sm" id="banner-tab" data-toggle="tab"
                                        href="#banner" role="tab" aria-controls="contact"
                                        aria-selected="false">Profile</a>

                                </li>
                                <li class="nav-item">

                                    <a class="nav-link tab_click class_check" id="about-tab1" data-toggle="tab"
                                        href="#about" role="tab" aria-controls="about"
                                        aria-selected="false">Website Logo</a>

                                </li>

                                {{-- <li class="nav-item">

                                    <a class="nav-link tab_click class_check" id="contact-tab5" data-toggle="tab"
                                        href="#contact5" role="tab" aria-controls="contact"
                                        aria-selected="false">Delivered</a>


                                </li> --}}

                                {{-- <li class="nav-item">

                                    <a class="nav-link tab_click class_check" id="contact-tab6" data-toggle="tab"
                                        href="#contact6" role="tab" aria-controls="contact6" aria-selected="false">Out
                                        For Delivery</a>

                                </li> --}}

                                {{-- <li class="nav-item">

                                    <a class="nav-link tab_click class_check" id="contact-tab7" data-toggle="tab"
                                        href="#contact7" role="tab" aria-controls="contact7"
                                        aria-selected="false">Undelivered</a>

                                </li> --}}

                                {{-- <li class="nav-item">

                                    <a class="nav-link tab_click class_check" id="contact-tab8" data-toggle="tab"
                                        href="#contact8" role="tab" aria-controls="contact8"
                                        aria-selected="false">RTO</a>

                                </li> --}}

                                {{-- <li class="nav-item">

                                    <a class="nav-link tab_click class_check" id="contact-tab9" data-toggle="tab"
                                        href="#contact9" role="tab" aria-controls="contact9"
                                        aria-selected="false">Lost</a>

                                </li> --}}

                                  {{-- <li class="nav-item">
                                    <a class="nav-link class_check" id="contact-tab44" data-toggle="tab" href="#contact44" role="tab" aria-controls="contact4" aria-selected="false">Cancelled</a>
                                </li> --}}

                                {{-- <li class="nav-item">

                                    <a class="nav-link  tab_click class_check" id="home-tab3" data-toggle="tab"
                                        href="#home3" role="tab" aria-controls="home" aria-selected="true">All </a>

                                </li> --}}
                            </ul>

                            <div class="tab-content  " id="myTabContent2">

                                

{{-- banner --}}

                                <div class="tab-pane fade show active my-2" id="banner" role="tabpanel"
                                    aria-labelledby="banner-tab">


                                        <div class="row">
      
    
                                            <div class="col-lg-12">
                                          
                                              <div class="card">
                                                <div class="card-body">
                                                  <h5 class="card-title">Profile Form</h5>
                                          
                                                  <!-- Vertical Form -->
                                                  <form class="row g-3" id="updateprofile" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                          
                                          
                                                    <div id="dynamic-fields">

                                                      
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label for="inputName4" class="form-label">Name<span class="validation">*</span></label>
                                                                    <input type="text" name="name" value="{{Auth::guard('admin')->user()->name}}" class="form-control name" required>
                                                                    <span class="error"></span>
                                                                </div>
                                                    
                                                                <div class="col-3">
                                                                    <label for="inputName4" class="form-label">Email 1<span class="validation">*</span></label>
                                                                    <input type="text" name="" value="{{Auth::guard('admin')->user()->email}}" class="form-control email" readonly>
                                                                    <span class="error"></span>
                                                                </div>

                                                                <div class="col-3">
                                                                    <label for="inputName4" class="form-label">Email 1<span class="validation">*</span></label>
                                                                    <input type="text" name="email1" value="{{Auth::guard('admin')->user()->email1}}" class="form-control email" required>
                                                                    <span class="error"></span>
                                                                </div>

                                                                <div class="col-3">
                                                                    <label for="inputName4" class="form-label">Mobile<span class="validation">*</span></label>
                                                                    <input type="text" name="mobile" value="{{Auth::guard('admin')->user()->mobile}}" class="form-control contact" required>
                                                                    <span class="error"></span>
                                                                </div>

                                                                <div class="col-6">
                                                                    <label for="inputName4" class="form-label">Address<span class="validation">*</span></label>
                                                                    <input type="text" name="address" value="{{Auth::guard('admin')->user()->address}}" class="form-control address" required>
                                                                    <span class="error"></span>
                                                                </div>
                                                    
                                                               
                                                    
                                                                <div class="col-3">
                                                                    <img src="" alt="" height="150">
                                                                </div>
                                                            </div>
                                                      
                                                    


                                                    </div>
                                          
                                                      <div class="col-12 p-2">
                                                        <div class="text-left">
                                                          <button type="submit" class="btn btn-primary btn-sm" id="update">Update</button>
                                                        </div>
                                                      </div>
                                                 
                                                  </form><!-- Vertical Form -->
                                          
                                                </div>
                                              </div>
                                          
                                              
                                          
                                              
                                            </div>
                                          </div>


                                </div>

                                {{-- banner end --}}


                                {{-- About Us --}}

                                <div class="tab-pane fade show my-2" id="about" role="tabpanel"
                                aria-labelledby="about-tab1">


                                    <div class="row">
  

                                        <div class="col-lg-12">
                                      
                                          <div class="card">
                                            <div class="card-body">
                                              <h5 class="card-title">About Us Form</h5>
                                      
                                              <!-- Vertical Form -->
                                              <form class="row g-3" id="logologo" method="POST" enctype="multipart/form-data">
                                                @csrf
                                      
                                                <div id="dynamic-fields">

                                                    <div class="col-3">
                                                        <label for="inputName4" class="form-label">Website Name<span class="validation">*</span></label>
                                                        <input type="text" name="websitename" value="{{Auth::guard('admin')->user()->web_name}}" class="form-control citizen" required>
                                                        <span class="error"></span>
                                                    </div>

                                                    <br>

                                                        <div class="row">
                                                           
                                                            <div class="col-3">
                                                                <label for="inputName4" class="form-label">Header Logo<span class="validation">*</span></label>
                                                                <input type="file" name="headerlogo" class="form-control citizen" required>
                                                                <span class="error"></span>
                                                            </div>

                                                            <div class="col-3">
                                                                <img src="{{asset('' . Auth::guard('admin')->user()->header_logo)}}" alt="" height="150">
                                                            </div>

                                                        </div>

                                                            <div class="row">

                                                            <div class="col-3">
                                                                <label for="inputName4" class="form-label">Footer Logo<span class="validation"></span></label>
                                                                <input type="file" name="footerlogo" class="form-control citizen" required>
                                                                <span class="error"></span>
                                                            </div>

                                                            <div class="col-3">
                                                                <img src="{{asset('' . Auth::guard('admin')->user()->footer_logo)}}" alt="" height="150">
                                                            </div>

                                                
                                                        </div>
                                                        {{-- @endif --}}
                                                 
                                                </div>
                                      
                                                  <div class="col-12 p-2">
                                                    <div class="text-left">
                                                      <button type="submit" class="btn btn-primary btn-sm" id="update">Update</button>
                                                    </div>
                                                  </div>
                                             
                                              </form><!-- Vertical Form -->
                                      
                                            </div>
                                          </div>
                                      
                                          
                                        </div>
                                      </div>
                            </div>

                            {{-- About end --}}


                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


</div>

<script>

$('#updateprofile').on('submit', function(e) {
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
                url: "{{route('admin.update-profile')}}",
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

$('#logologo').on('submit', function(e) {
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
                url: "{{route('admin.update-logo')}}",
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

</script>


 @endsection