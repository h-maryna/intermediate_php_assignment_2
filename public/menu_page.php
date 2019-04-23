<?php 
/**
 * WDD4
 * Intro PHP
 * Assignment 2
 * Instructor Steve George
 * Maryna Haidashevska
 */
 /**
  * assigning a new variable for title
  */
$title = 'menu_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Coffee Time Menu';

/**
 * include file which will be used as a template for each page as a header
 */
include __DIR__ . '/../inc/header.inc.php';
require 'functions.php';
require 'connect.php';

?>
    <title><?=$title?></title>
    <main>
      <h1><?=$h1?></h1>
      <fieldset id="menu">
      <legend>We open daily 7am to 7 pm</legend>
        <div id="content">
      <h2>Espresso</h2>
        <p>Espresso/Americano $2.50</p>
        <p>Macchiato $2.50</p>
        <p>Latte $3.5</p>
        <p>Cappuccino $3.50</p>
        <p>Mocha $4.00</p>
        <p>Extra Shot $1.00</p>
      <h2>Coffee</h2>
        <p>Vacuum Pot $5.00</p>
      <h2>Bakery</h2>
        <p class="cursive">Baked fresh daily</p>
        <p>Bagels $3.25</p>
        <p class="cursive">Plain, onion, three cheese, blueberry, 
         or cinnamon raisin, with plain or flavoured cream cheese.
        </p>
        <p>Muffins $2.50</p>
        <p class="cursive">Bran, banana nut, oe lemon poppyseed</p>
        <p>Croissant $3.00</p>
        <p class="cursive">Plain, cheese, srtawberry, raspberry</p> 
      <h2>Specialty Drinks</h2>
        <p>Tea Latte $3.00</p>
        <p class="cursive">Green jasmine, or Earl Grey teawith steamed milk</p>
        <p>Hot Chocolate $3.50</p>
        <p class="cursive">Organic dark chocolate, streamed milk, and whipped cream</p>
        <p>Raspberry Mocha $4.50</p>
        <p class="cursive">Espresso, premium chocolate, steamed milk, hazelnut, raspberry syrup</p>
        <p>White Chocolate Mocha $4.50</p>
        <p class="cursive">Espresso, glated white chocolate, steamed milk</p>
        <p>Mexican Hot Chocolate $3.50</p>
        <p class="cursive">Organic dark chocolate with cinnamon and a dash of chile</p>
      <h2>Extras</h2>
        <p>Flavoured Syrup $1.00</p>
        <p>Steamed Milk $0.50</p>
        <p>Almond/ Coconut Milk $1.00</p>
        </div>
      </fieldset>  
        
        <div class="row">
        <div class="column">
          <img src="images/menu1.jpg" alt="Laptop with coffee" style="width:100%">
        </div>
        <div class="column">
          <img src="images/menu2.jpg" alt="Coffee with croissants" style="width:100%">
        </div>
        <div class="column">
          <img src="images/menu3.jpg" alt="Coffee making" style="width:100%">
        </div>
        </div>
    </main>
    
<?php 
   /**
   * include file which will be used as a template for each page as a footer
   */
    include __DIR__ . '/../inc/header.inc.php';

?>
    </div>
  </body>

</html>