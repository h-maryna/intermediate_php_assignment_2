<?php 

/**
  * assigning a new variable for title
  */
$title = 'index_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Our Atmosphere';

/**
 * include file which will be used as a template for each page as a header
 */
include __DIR__ . '/../../inc/header.inc.php';
require 'functions.php';
require 'connect.php';

?>
    <title><?=$title?></title>  
    <main>
      <div id="mobile_img"><img src="images/mobile_image.jpg" style="width:100%" alt="cup with hot coffee and cookies" /></div>
      <div id="inside"><img src="images/design_inside_465.jpg" 
                            alt="Coffee Shop Inside" 
                            width="465"
                            height="310"/>
      </div>      
      <div id="outside"><img src="images/design_outside_465.jpg" 
                             alt="Coffee Shop Outside"
                             width="465"
                            height="310"/>
      </div>
      
      
        <div id="cta" class="shaking">Come for the coffee, stay for the cookies. 
          123 Portage Avenue E
        </div>
      <div id="home_page">
      <h1><?=$h1?></h1>
        <p>In our coffee shop everybody is treated like a family member. 
        Here you can find a dark corner to stay alone with your thoughts
        or, on the contrary, meet new friends, and of course 
        you will always be offered a cup of freshly roasted coffee with our 
        delishious baked goods.</p>
     
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2570.206450323106!2d-97.1376933486819!3d49.89492727930149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52ea715b2c44c293%3A0xa62adcaf49a46bd5!2s123+Portage+Ave+E%2C+Winnipeg%2C+MB!5e0!3m2!1sen!2sca!4v1544223487033" 
              style="border:0"
              allowfullscreen>
      </iframe>
      <h2>Location</h2>
        
      <p>Coffee Time is located on the east side of Portage Avenue at:</p>
      <p>123 Portage Avenue E</p>
      <p>Winnipeg, MB Canada R3M 2K7</p>
      <p>Phone 204-123-4567<p>
      <p>Email info@coffeetime.com</p>
      <a href="#" class="go_top">Go to the top</a>  

      <h2>Store Hours</h2>
        <p class="content">We are open</p>
        <p class="content">Monday - Friday 7am–7pm</p>
        <p class="content">Saturday - Sunday 10am–6pm</p>
        <p class="content">Open most holidays</p>
      </div>
      <div class="row">
        <div class="column">
          <img src="images/owner.jpg" alt="Women Owner" style="width:100%">
        </div>
        <div class="column">
          <img src="images/owner_man.jpg" alt="Man Owner" style="width:100%">
        </div>
        <div class="column">
          <img src="images/two_owners.jpg" alt="Two Owners" style="width:100%">
        </div>
      </div>
    </main>
    
  <?php 
  
   /**
   * include file which will be used as a template for each page as a footer
   */
    include __DIR__ . '/../../inc/footer.inc.php';

  ?>
    </div>
  </body>

</html>