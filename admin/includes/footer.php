                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Arsalan Ahmed Developer 2021</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                $("#message").delay(1500).fadeOut(2000);
                $(".error").delay(1000).fadeOut(2000);
                jQuery.validator.addMethod("lettersonly", function(value, element) {
              return this.optional(element) || /^[a-z ]+$/i.test(value);
            }, "Full name contain only alphabets"); 

          $("#form").validate({
           
            rules: {
            
              fullname:{
                lettersonly:true,
                required:true,
              },
              email: {
                required: true,
                email: true
              },
              password: {
                required: true,
                minlength: 4
              },
              number:{
                required:true,
              },
            },
            messages: {
             number:{
                required: "Please enter phone number",
             }, 
             fullname:{
                required: "Please enter your full name",
             },
              password: {
                required: "Please enter your password",
                minlength: "Your password must be at least 4 characters long"
              },
              email: "Please enter a valid email address"
              , 
              confirm_password:{
                required: "Please confirm your password",
              }
            },
           
            submitHandler: function(form) {
              form.submit();
            }
          });

            });
        </script>
    </body>
</html>
