<?php 
  include 'include/header.php';
  include 'include/navbar.php';
 ?>

 <!-- Contact Us -->
    <section class="contact-us section-space">
        <div class="container">
          <div class="wrapper  d-flex justify-content-center">
         
            <div class="row ">
              <div class="col-lg-3">
                    
                  </div>
                <div class="col-lg-6 col-md-7 col-12 ">
                  <div class="row contact-form-area m-top-30 ">
                    <!-- Contact Form -->
                          <h4 class="text-center">Vehicle Sign Out</h4>
                          <form class="form" method="post" action="handlers/sign_out.php" enctype="multipart/form-data" autocomplete="off">
                             
                              <div class="row">
                                  <div class="col-lg-12 col-md-12 col-12">
                                      <div class="form-group">
                                          <div class="icon"><i class="fa fa-user"></i></div>
                                          <input type="text" value="" id="id_no" name="id" placeholder="Enter Visitor Identication Number" autocomplete="off">
                                      </div>
                                  </div>
                                  
                              </div>
                      <div class="col-12 col-md-12 col-lg-12">
                          <div class="form-group button">
                              <button type="submit" name="sign_out" class="bizwheel-btn theme-2">Sign Out Vehicle</button>
                          </div>
                      </div>
                      </form>

                  </div>
                </div>
                  <div class="col-lg-3">
                    
                  </div>
                    <!--/ End contact Form -->
                </div>
                
                </div>
            </div>
           </div>
        </div>
    </section>
    <!--/ End Contact Us -->




 <?php 

include 'include/footer.php'; 

include 'include/scripts.php'; 
include 'include/pop_up.php'; 
  ?>
<script type="text/javascript">
  //$(document).ready(function() {
      $('#id_no').keyup(function() {
      var check = $(this).val();
      
      if (check.length >= 6 ) {
         
          $('.auth_details').css('display','block');
      }else{
            $('.auth_details').css('display','none');
      }
  });
//  });
  
</script>