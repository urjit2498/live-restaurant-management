<!DOC TYPE html>
<html lang="en">
    <head>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato:400,700');
            lable{
                font-weight: bold;
                font-size:18px;
            }
            .error{
            font-size:20px;
             ;}
          
.h4{
    font-family: 'Lato', sans-serif;
    font-size:30px;
/*   padding-bottom:150px;*/
    //padding-bottom:50px;
    
}
            
/*            #submit{
                width:170px;
                margin-left:750px;
                font-size: 20px;
            }*/
            .form-container{
                border:4px solid black;
                padding:20px 30px;
        
/*                margin-top:20px;
                margin-right:60px;
                margin-bottom:50px*/
            }
            .bg{
                //-bottom:20px;
           background: url("image/2.jpg");
          height:100%;
          width:100%;
          background-repeat: no-repeat;
          /*background-size:cover;*/ 
         padding:90px ;
/*           margin-left:550px;*/
            }
                       </style>
            

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <title>  Admin Login</title>
        <?php
        include '/include/includeCss.php'
        ?>
    </head>
   
    <body >
       

<!--        <div class="preloader">
            <div class="loader">
                <span class="loader__indicator"></span>
                <div class="loader__label"><img src="img/logo.png" alt=""></div>
            </div>
        </div>-->
        <?php
        include './include/includeHeader.php';
        ?>
        <!--<div class="p-front__content">-->

            <!--<div class="p-signin-a">-->
                <!--<div class="image">-->
            <!--<img src="image/2.jpg"  height="60%"width= "100%"alt=""/>-->
        
                 
                <!--                <form action="#" class="p-signin-a__form">-->
                <div class="container-fluid bg">
                    <div class="row">
                    <div class="col-md-4" style="margin-left: 550px;">
                <form name="fadmin" class="form-container" action="AdminController.php"  method="POST"  onsubmit="return validateForm();" >
                
  
  
  <div style="margin-bottom:80px; font-family: 'Francois One', sans-serif;"  >
                    <div class="h4" style="margin:0px;" >
                    <h4 class="p-signin-a__form-heading" style="color:Green; font-size:40px;   "   >Login Page</h4>
                    
                   
                    <div class="form-group">
                          <lable  style="color:navy;font-size:22px;">UserName</lable>
                            <br> <input type="text"  name="txtUserName" id="txtUserName"class="form-control">
                            <br><br> <label class="error" for="name" id="first_error" style="display: none; color:red; ">UserName is required.</label>
                        </div>
                    <div class="form-group">
                          <br>  <lable style=" color:navy;font-size:22px;">Password</lable>
                             <input type="password"  name="txtPassword" id="txtPassword"class="form-control">
                            <!--<label class="error" for="pswd" id="password_error" style="display: none">Password is Required</label>-->
                    </div>
                    <br>
                    
                    
                    
                      
                    
                      <div class="form-group">
                    <input type="submit" name="submit"  value="submit" class="btn-block">
                    </div>
                    </div>
                    </div>  
  </div>
  </div>
                        
                              
                                <!--<br>-->
                                                    
              </form>
                </div>
                <script>
                   function validateForm() {
                   var flag=true;
                if ($("#txtUserName").val() === "") {
                    $("#first_error").show();
                    flag=false;
                }
                 
                    return flag;
                   }
            
               
            
 
                
        
                    </script>


                                <!--<div class="p-signin-a__form-link">Already have an account? <a href="signup.html">Sign Up</a></div>-->
            <!--</div>-->

        <!--</div>-->


        <?php
        include './include/includeFooter.php';
        ?>

        <?php
        include './include/includeJs.php';
        ?>



        <!--<div class="sidebar-mobile-overlay"></div>-->

    </body>
</html>
