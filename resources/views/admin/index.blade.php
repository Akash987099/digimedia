
@extends('admin.layout.master')

@section('user-contant')


<style>
.main-footer {
    visibility: hidden;
}.all_orderborder{
    border-right:1px solid rgb(228 235 242);
}
</style>

<body>

    <div class="loader"></div>
    <div id="app">

        <div class="main-wrapper main-wrapper-1 supreme-container">
            <div class="navbar-bg">

            </div>

                        <!-- Main Content -->

            <div class="main-content">

                

                <section class="section" >

                    <div class="section-body">
            
                        <div class="row">
            
            
            
                            <div class="col-12">
            
                                <div class="card">
            
                                    <div class="card-header supreme-container">
            
                                        <h4>All Members List</h4>
                                        
                                    </div>
            
                                    <hr>
                                   
                                    <div class="tab-pane fade show active px-2" id="contact3" role="tabpanel"
                                    aria-labelledby="contact-tab3">
            
                                    <div class="table-responsive">
            
                                        <table class="table table-striped xys" id="datatable">
                                            <thead>
                                            <tr>
            
                                                <th>Sr No.</th>
                                                <th>Company Name</th>
                                                <th>Applicant Name</th>
                                                <th>Establishment Year</th>
                                                <th>Member Category</th>
                                                <th>Contact Details</th>
                                                {{-- <th>Email</th> --}}
                                                {{-- <th>Website</th> --}}
                                              
                                                {{-- <th>GST</th> --}}
                                                <th>Status</th>
                                                <th style="width:12% !important;">Action</th>
                                                {{-- <th style="width:8% !important;">Document</th> --}}
            
                                            </tr>
                                            </thead>
                                            <tbody class="alltbody">
                                                
                                            </tbody>
            
                                        </table>
            
                                    </div>
            
                                </div>
            
                                <br>
                                
                                </div>
            
                            </div>
            
                        </div>
            
                    </div>
            
                </section>
            
            </div>
    <!-- recharge model  -->


    <script src="../../unpkg.com/sweetalert%402.1.2/dist/sweetalert.min.js"></script>
   <style>

  .modal-backdrop.show {

   opacity: 0 !important;

   z-index:0;

  }
  </style>
  

 @endsection