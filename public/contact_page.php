<?php 
/**
 * WDD4
 * Intermrdiate PHP
 * Assignment 2
 * Instructor Steve George
 * Maryna Haidashevska
 */


require __DIR__ . '/../lib/functions.php';
require __DIR__ . '/../config/connect.php';
require __DIR__ . '/../config/config.php';
require __DIR__ . '/classes/Validator.php';

/**
  * assigning a new variable for title
  */
$title = 'contact_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Visit Coffee Time';

/**
 * include file which will be used as a template for each page as a header
 */
include __DIR__ . '/../inc/header.inc.php';
?>
    <title><?=$title?></title>
    <main><!--Main page -->
      <h1><?=$h1?></h1>
      <p> and sip a complimentary tea or coffee while you 
       browse our selection of unique tea and coffee offerings, including a 
       wide range of elegant Asian and European glassware, teapots and accessories</p>  
      
      
      <h2>Location</h2>
      <div class="slogan">
          <img src="images/slogan.JPG" alt="All you need is a coffee" style="width:100%">
      </div>
        <p>Coffee Time is located on the east side of</p> 
        <p>Portage Avenue at:</p>
        <p>123 Portage Avenue E</p> 
        <p>Winnipeg, MB Canada R3M 2K7</p>
        <p>Phone 204-123-4567<p>
        <p>Email info@coffeetime.com</p>
      <h2>Store Hours</h2>
        <p>We are open 7am-6pm Monday - Friday and 10am-5pm on Saturday</p>
        <p>We would like to thank you for choosing to buy from us. 
        And we hope you can find a few minutes to provide your
        feedback - it means a lot to us.</p>
      <a href="#" class="go_top">Go to the top</a>  
   

</body>
  
  <?php 
  /**
   * include file which will be used as a template for each page as a footer
   */
   include __DIR__ . '/../inc/footer.inc.php';

  ?>    
</html>