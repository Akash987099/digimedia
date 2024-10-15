<footer class="main-footer">
    <div class="footer-left">
    </div>
    <div class="footer-right">
    </div>
  </footer>
  </div>
  </div>
  <!-- recharge model  -->
  <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color:  #f2f2f2 ;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Recharge Your Wallet</b> </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>

        <div class="modal-body ">
          

          <form id="payment-form" action="https://securegw.paytm.in/theia/processTransaction" method="POST" target="_blank">
                   
                   <input type="hidden" id="ORDER_ID" name="ORDER_ID" value="">
                   <input type="hidden" id="CUST_ID" name="CUST_ID" value="1234">
                   <input type="hidden" id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" value="123">
                   <input type="hidden" id="CHANNEL_ID" name="CHANNEL_ID" value="WEB">
                   <input type="hidden" id="MID" name="MID" value="SbGbUZ15376909217929">
                   <div id='checksum'></div>
                   <input type="hidden"  name="CALLBACK_URL" value="
                   http://127.0.0.1:8000/paytm-callback">
                   <input type="hidden"  name="WEBSITE" value="DEFAULT">

            <hr style="border-top:1px solid gray ;" class="my-0">
            <h6>Enter the amount for your recharge</h6>
            <div class="text-center ">
              <div class="row my-4">
                <div class="col-md-3 my-1">
                  <p> <strong>Amount</strong> </p>
                </div>
                <div class="col-md-6">
                  <input type="text" placeholder="₹" class="form-control" style="border-color:#33333373;border-radius:20px" value="1" name="TXN_AMOUNT" id="first-name" placeholder="0.0">

                </div>
                <div class="col-md-3"></div>

              </div>
             <div class="text-center my-3">
                <a href="#" class="btn btn-primary badge button12">500</i></a>
                <a href="#" class="btn btn-primary badge button12">1000</i></a>
                <a href="#" class="btn btn-primary badge button12">2000</i></a>
                <a href="#" class="btn btn-primary badge button12">5000</i></a>
                <a href="#" class="btn btn-primary badge button12">10000</i></a>
              </div> 

              <button type="button"  class="btn btn-info"  id="payment_form_click" style="border-radius:20px">Recharge</button>
            </div>
          </form>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <!-- <button type="button" class="btn btn-primary">Save changes</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $("#nav a").click(function(e) {
      e.preventDefault();
      $(".toggle").hide();
      var toShow = $(this).attr('href');
      $(toShow).show();
    });
  </script>

  <script>
   $(".button12").click(function(){
   $rchr = $(this).text();
   $("#first-name").val($rchr);
  
  });
  </script>

<script>
   $(".rchrg").on("click", function(){
     $rchcoupn = $(this).text();

     $("#first-name").val($rchcoupn);
 });
</script>

<script type="text/javascript">
   
  
 </script>


<!-- <script>
 function handleClick(event) {
alert
if (event.target.tagName !== "BUTTON") {
 return;
}

let buttonValue = event.target.innerText;

document
 .querySelector("#result")
 .innerText = buttonValue;
}

document
.querySelector(".buttons")
.addEventListener("click", handleClick);

</script> -->
  <!-- General JS Scripts -->
  <script src="{{asset('assets/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{asset('assets/bundles/apexcharts/apexcharts.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/index.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->

  <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
  
   <script
       src="https://jqueryscript.net/demo/jQuery-Plugin-For-Simultaneous-Downloads-With-One-Click-multiDownload/jquery.multiDownload.js">
   </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/PrintArea/2.4.1/jquery.PrintArea.min.js"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
 
  <!-- <script src="assets/js/page/chart-amchart.html"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js "></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js "></script> 


<!-- DataTables JS -->
{{-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> --}}

<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>


<script>

$(document).ready(function() {

$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});

$('body').on('click', '.logouttrigger', function() {
if (confirm('Are you sure, you want to logout?')) {
   document.getElementById('logout-form').submit();
   return true;
}
return false;
});

$('.specialchar').on('keypress',function(e){
       var regex=new RegExp("^[a-zA-Z& ]");
       var key=String.fromCharCode(!e.charCode ? e.which :e.charCode);
       if(!regex.test(key  )){
           e.preventDefault();
           return false;
       }
   });

   $('.contactvalid').on('keypress',function(e){
   var regex = new RegExp("^[0-9]$");
   var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
   if(!regex.test(key)){
       e.preventDefault();
       return false;
   }
});

$('.emailvalid').on('keypress', function(e) {
   var regex = new RegExp("^[a-zA-Z0-9&_@. ]");
   var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
   if (!regex.test(key)) {
       e.preventDefault();
       return false;
   }
});



});
  

</script>
  </body>
</html>
