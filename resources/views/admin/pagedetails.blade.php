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
                                        aria-selected="false">Banner</a>

                                </li>
                                <li class="nav-item">

                                    <a class="nav-link tab_click class_check" id="about-tab1" data-toggle="tab"
                                        href="#about" role="tab" aria-controls="about"
                                        aria-selected="false">About Us</a>

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
                                                  <h5 class="card-title">Banner Form</h5>
                                          
                                                  <!-- Vertical Form -->
                                                  <form class="row g-3" id="updatefrom" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                          
                                                    <input type="hidden" name="updateid" id="updateid" >
                                          
                                                    <div id="dynamic-fields">

                                                        @if(!empty($images) && is_array($images))
                                                        @foreach($images as $key => $image)
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label for="inputName4" class="form-label">Title 1<span class="validation">*</span></label>
                                                                    <input type="text" name="title1[]" value="{{ $titles1[$key] ?? 'Default Subtitle' }}" class="form-control citizen" required>
                                                                    <span class="error"></span>
                                                                </div>
                                                    
                                                                <div class="col-3">
                                                                    <label for="inputName4" class="form-label">Title 2<span class="validation">*</span></label>
                                                                    <input type="text" name="title2[]" value="{{ $titles2[$key] ?? 'Default Subtitle' }}" class="form-control citizen" required>
                                                                    <span class="error"></span>
                                                                </div>
                                                    
                                                                <div class="col-3">
                                                                    <label for="inputName4" class="form-label">Image<span class="validation">*</span></label>
                                                                    <input type="file" name="image[]" class="form-control citizen" required>
                                                                    <span class="error"></span>
                                                                </div>
                                                    
                                                                <div class="col-3">
                                                                    <img src="{{ asset('uploads/' . $image) }}" alt="" height="150">
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <p>No images found.</p>
                                                    @endif
                                                    


                                                    </div>
                                          
                                                      <div class="col-12 p-2">
                                                        <div class="text-left">
                                                            <button type="button" id="add-more" class="btn btn-warning btn-sm">Add More</button>
                                                          <button type="submit" class="btn btn-primary btn-sm" id="update">Update</button>
                                                          {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
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
                                              <form class="row g-3" id="aboutpage" method="POST" enctype="multipart/form-data">
                                                @csrf
                                      
                                                <div id="dynamic-fields">

                                                    {{-- @if(!empty($page->about_image1)) --}}
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="inputName4" class="form-label">Title<span class="validation">*</span></label>
                                                                <input type="text" name="title" value="{{$page->about_title}}" class="form-control citizen" required>
                                                                <span class="error"></span>
                                                            </div>

                                                            <div class="col-3">
                                                                <label for="inputName4" class="form-label">Image<span class="validation">*</span></label>
                                                                <input type="file" name="file1" class="form-control citizen" required>
                                                                <span class="error"></span>
                                                            </div>

                                                            <div class="col-3">
                                                                <label for="inputName4" class="form-label">Image<span class="validation"></span></label>
                                                                <input type="file" name="file2" class="form-control citizen">
                                                                <span class="error"></span>
                                                            </div>
                                                
                                                            
                                                            <div class="col-12">
                                                                <label for="" class="form-label">Description <span class="validation">*</span></label>
                                                                <textarea name="description" id="" rows="3" class="form-control">{!! $page->about_content !!}</textarea>
                                                                <span id="description-error"></span>
                                                            </div>

                                                            <div class="col-3 px-2">
                                                                    <img src="{{asset(''.$page->about_image1)}}" alt="" height="100">
                                                                </div>

                                                                <div class="col-3 px-2">
                                                                    <img src="{{asset(''.$page->about_image2)}}" alt="" height="100">
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


    <input type="hidden" id="pageinputid" name="pageinput" value="{{$id}}">
    

</div>


<script>

    $(document).ready(function(){


        $('#add-more').on('click', function() {
        var newFieldSet = `
        <div class="row dynamic-row">
            <div class="col-4">
                <label for="inputName4" class="form-label">Title 1<span class="validation">*</span></label>
                <input type="text" name="title1[]" class="form-control citizen" required>
                <span class="error"></span>
            </div>

            <div class="col-4">
                <label for="inputName4" class="form-label">Title 2<span class="validation">*</span></label>
                <input type="text" name="title2[]" class="form-control citizen" required>
                <span class="error"></span>
            </div>

            <div class="col-4">
                <label for="inputName4" class="form-label">Image<span class="validation">*</span></label>
                <input type="file" name="image[]" class="form-control citizen" required>
                <span class="error"></span>
            </div>
        </div>
        `;
        $('#dynamic-fields').append(newFieldSet); // Add new fields to the form
    });

    
    $('#updatefrom').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData();
        
        var id = $('#pageinputid').val();
        formData.append('id', id);

        $('input[name="title1[]"]').each(function(index) {
            formData.append('title1[]', $(this).val());
        });

        $('input[name="title2[]"]').each(function(index) {
            formData.append('title2[]', $(this).val());
        });

        $('input[name="image[]"]').each(function(index) {
            if ($(this)[0].files.length > 0) {
                formData.append('image[]', $(this)[0].files[0]);
            }
        });

        

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
                    url: "{{route('admin.banner-save')}}", // Your route URL
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status === "success") {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Form submitted successfully!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                window.location.reload(); // Reload page on success
                            });
                        } else if (response.status === "error") {
                            $.each(response.message, function(field, message) {
                                $('#' + field).addClass('is-invalid');
                                $('#' + field + '-error').text(message).addClass('text-danger');
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'There was a problem submitting the form.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });

    // about

    $('#aboutpage').on('submit' , function(e){

        e.preventDefault();

        var formData = new FormData(this);
        var id = $('#pageinputid').val();
        formData.append('id', id);

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
                    url: "{{route('admin.about-save')}}", // Your route URL
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status === "success") {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Form submitted successfully!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                window.location.reload(); // Reload page on success
                            });
                        } else if (response.status === "error") {
                            $.each(response.message, function(field, message) {
                                $('#' + field).addClass('is-invalid');
                                $('#' + field + '-error').text(message).addClass('text-danger');
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'There was a problem submitting the form.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                        console.error(xhr.responseText);
                    }
                });
            }
        });

    });
    
    
        });
    
    </script>

 @endsection