 <!-- Footer -->
 <footer class="sticky-footer bg-white">
     <div class="container my-auto">
         <div class="copyright text-center my-auto text-white">
             <span>Copyright &copy; luonvuituoi Store 2023</span>
         </div>
     </div>
 </footer>
 <!-- End of Footer -->
 </div>
 </div>

 </body>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
 <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">
 <script src="../Scripts/jquery-3.6.0.js"></script>
 <script src="../Scripts/jquery-3.6.0.min.js"></script>
 <script src="./ckfinder/ckfinder.js"></script>
 <script src="./js/styleAdmin.js"></script>
 <script>
     var s = window.location.href;
     let x = s.includes('Page=');
     if(x){
        var b = s.split('Page=')[1];
     }else{
        var b = 1;
     }
     
     $('.page-active').each((i, e) => {
         b == e.getAttribute('page') ? $(e).addClass('active') : $(e).addClass('non-active')
     })
 </script>

 </html>
 <!-- Code to wire up your DatePicker -->