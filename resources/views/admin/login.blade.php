<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Rappidx is India's best logistics solutions & cheapest courier company in India for e-commerce business Rappidx offers the best shipping rates with multiple courier partners & integrates easily with all e-commerce platforms." />
    <meta name="description" content="Rappidx is India's best logistics solutions & cheapest courier company in India for e-commerce business Rappidx offers the best shipping rates with multiple courier partners & integrates easily with all e-commerce platforms." />
    <meta name="author" content="Singhaniya" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


    {{-- <link rel="icon" href="{{ asset('asset/images/favicon.jpg')}}" type="image/gif" sizes="16x16"> --}}
    
    <!-- Meta tags -->
    <!-- font-awesome icons -->
     <link href="{{asset('asset/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!--stylesheets-->
    <link href="{{asset('asset/css/style.css')}}" rel='stylesheet' type='text/css' media="all">
   
    <!--//style sheet end here-->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">

    <style>
        button[type=submit]{
            background: #4682B4;
        }
        body{
            text-align: center;display: flex;
             /* background-color:#4682B4; */
             /* background-image: url({{asset('back.jpg')}}) */
             align-items: center;
        }
    </style>

</head>

<body style="background-image: url({{asset('back1.jpg')}})">
 
    <!-- <h1 class="error">Allied Login Form</h1> --><br><br>
    <div class="w3layouts-two-grids" style="border-radius:20px">
        <div class="mid-class">

            <div class="img-right-side" style="border-top-left-radius: 20px;border-bottom-left-radius: 28px;">

                <h3><a href="" style="color:black">Welcome to Admin</a>
            </h3>
                
                <img src="{{asset('unnamed.png')}}" class="img-fluid" alt="">
                <h2>  </h2> 
            
            </div>
            
<div class="txt-left-side" style="background-color:#2C31A4;border-top-right-radius: 28px;border-bottom-right-radius: 28px;">

<h2> Sign In </h2>
<form method="post"  class="signin-form">
  @csrf
    <div class="form-left-to-w3l">
        <span class="fa fa-envelope-o" aria-hidden="true"></span>
        <input type="email" name="email" id="email" placeholder="Enter Email" required>

        <div class="clear"></div>
    </div>
    <div class="form-left-to-w3l ">
        <span class="fa fa-lock" aria-hidden="true"></span>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <div class="clear"></div>
    </div>
    <!-- <div class="main-two-w3ls"> -->
        <!-- <div class="left-side-forget">
            <input type="checkbox" class="checked">
            <span class="remenber-me">Remember me </span>
        </div> -->
        <div class="right-side-forget">
            <!-- <a href="#" class="for">Forgot password...?</a> -->
            <strong><a href="" class="for" style="color:#60baaf">Forgot password...?</a></strong>
        </div>
    <!-- </div> -->
    <div class="btnn">
        <button type="submit" name="loginchekc" id="signin">Sign In </button>
    </div>
</form>

{{-- <div class="w3layouts_more-buttn">
    <h3>Don't Have an account..? <a href="Signup.php"> Sign Up</a></h3>
</div> --}}





            </div>
        </div>
    </div>
    <!-- <footer class="copyrigh-wthree">
        <p>
            © 2019 Allied Login Form. All Rights Reserved | Design by
            <a href="http://www.W3Layouts.com" target="_blank">W3Layouts</a>
        </p>
    </footer> -->
</body>

</html>


<script src="asset/js/main.js"></script>

  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/popper.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.css">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400&display=swap">

  <script>

      $(document).ready(function(){
		

		$('#signin').on('click', function(e) {
    e.preventDefault();

    var formdata = $('.signin-form').serialize();

    $.ajax({
        url: "{{route('adminLogins')}}",
        type: "POST",
        data: formdata,
        success: function(response) {
            console.log(response);

			if(response.status == "success"){

				Swal.fire({
                title: 'Success!',
                text: 'You have successfully logged in.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{route('admin.index')}}";
                }
            });

			}

			if(response.status == "error"){

Swal.fire({
// title: 'Ooops....',
text: 'Invalid Login credentials',
icon: 'error',
confirmButtonText: 'OK'
}).then((result) => {
if (result.isConfirmed) {
	window.location.reload();
}
});

}
            
        },
        error: function(xhr, status, error) {

            console.error(xhr.responseText);

            Swal.fire({
                title: 'Error!',
                text: 'There was a problem with your login.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
});


	  });

  </script>