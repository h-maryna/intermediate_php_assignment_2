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
$title = 'about_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Hello from Coffee Time';


/**
 * include file which will be used as a template for each page as a header
 */

include __DIR__ . '/../inc/header.inc.php';
?>
      <title><?=$title?></title>
      <main>
        <h1><?=$h1?></h1>
          <p>Coffee Time is a Winnipeg-based company registered in the province of 
          Manitoba. Meg Rayan is president of Coffee Time, and her husband, Bob Krichkov,
          is partner and owner.</p>
          <p>Our parents immigrated from Brazil. They usually told us story how they 
          liked to smell real coffee in Brazil. And when we married, we decided to 
          open a coffee shop.</p>


          <p id="hello_img"><img src="images/hello_couple.jpg" alt="Couple of owners" style="width:100%" />
        <h2>Our Equipment</h2>
          <a href="#" class="go_top">Go to the top</a>  
          <p>We used a high quality equipment for making taste of our product delicious</p>
          <p id="machine"><img src="images/mashine.jpg" alt="Coffee Maker" style="width:100%" />
          
        <h2>Our Mission</h2> 
          <a href="#" class="go_top">Go to the top</a>
          <p>The mission of our company is to make everybody happy and satisfied</p>
          <p id="example1"><img src="images/coffee_heart.jpg" alt="Cup with coffee formed heart" style="width:100%" />
       </main>
  
  <?php 
  /**
   * include file which will be used as a template for each page as a footer
   */
   include __DIR__ . '/../inc/footer.inc.php';

  ?>    
     
    