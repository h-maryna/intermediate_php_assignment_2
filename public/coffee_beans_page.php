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
$title = 'coffee_beans_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Coffee we offer';
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
      <table>
        <caption><div id="free">Free shipping over 49$</div></caption>
      
        <tr class="round">
          <th>Coffee Beans</th>
          <th>Coffee variety</th>
          <th>Description</th>
          <th>Price per lb</th>
        </tr>
      
        <tr>
          <th><img src="images/order1.jpg" 
                   width="100" 
                   height="75" 
                   alt="Bolivia Colonial Caranavi(South America)" /></th>
          <a href="#"><td>Bolivia Colonial Caranavi(South America)</td></a>
          <td>Slightly Spicy, Full Body, Good Balance</td>
          <td>$25.00</td>
        </tr>
      
        <tr>
          <th><img src="images/order2.jpg" 
                   width="100" 
                   height="75" 
                   alt="Mexican “Oaxaca” (North America)" /></th>
          <td>Mexican “Oaxaca” (North America)</td>
          <td>Full Bodied, Sweet, Nutty Elixir (Medium-Dark Roast)</td>
          <td>$18.00</td>
        </tr>
      
        <tr>
          <th><img src="images/order3.jpg" 
                   width="100" 
                   height="75" 
                   alt="Café Femenino Peru (South America)" /></th>
          <td>Café Femenino Peru (South America)</td>
          <td>Quality Coffee, Equality in Life. Grown by a women's coffee
              co-op in Per</td>
          <td>$20.00</td>
        </tr>
      
        <tr>
          <th><img src="images/order4.jpg" 
                   width="100" 
                   height="75" 
                   alt="Ethiopian Sidamo (Africa)" /></th>
          <td>Ethiopian Sidamo (Africa)</td>
          <td>Fruity flavour, medium body. The “fine red wine” of coffee</td>
          <td>$24.00</td>
        </tr>
      
        <tr>
          <th><img src="images/order5.jpg" 
                   width="100" 
                   height="75" 
                   alt="Rwanda “Ikawa-Nini”(Indonesia)" /></th>
          <td>Rwanda “Ikawa-Nini”(Indonesia)</td>
          <td>Dark, heady and heavy on the tongue</td>
          <td>$20.00</td>
        </tr>
      
        <tr class="round">
          <th><img src="images/order6.jpg" 
                   width="100" 
                   height="75" 
                   alt="Sumatra “Café Femenino” (Medium-Full)(Indonesia)" /></th>
          <td>Sumatra “Café Femenino” (Medium-Full)(Indonesia)</td>
          <td>Full Body. Delicate sweetness. Complex and Fruity Aroma</td>
          <td>$15.00</td>
        </tr>
     
      <!-- Bottom level row -->
      </table>
    
      <h2>Fresh Roasted Coffee Beans</h2><a href="#" class="go_top">Go to the top</a>  
        <p>Your arabica coffee beans are roasted within hours of placing your order and
         shipped to you immediately. It's as fresh as you can get, without roasting 
         them yourself at home. When you order, your coffee beans are roasted to a 
         medium roast, dark roast or espresso roast depending on your option, then 
         ground (or not) to how you choose on the product page. This ensures you get
         the freshest, best roasted coffee possible, and not coffee that has been 
         sitting on store shelves for weeks or even months. We bag the fresh coffee 
         beans in a valve bag that releases the CO2 while preventing air from 
         entering - guaranteeing your coffee remains fresh and at peak flavour for 
         as long as possible.</p>
      <h2>Whole Bean Coffee</h2><a href="#" class="go_top">Go to the top</a>
        <p>All of our coffee begins as whole coffee beans, and we can ship it to you
         unground, or you can tell us grind it however you want at no extra charge. 
         Buying the coffee as whole bean allows you to grind it yourself, which keeps
         it fresh until you're ready to brew. One of the most important things you 
         can do to keep your coffee tasting fresh is buy it whole bean, and then 
         grind it just before you're ready to brew. It keeps the aroma locked up, 
         and prevents the coffee from oxidizing so that you can enjoy more of the 
         true, bold taste. Because of this you won't find the cheapest coffee here, 
         but with the high quality you will find one of the best coffee values in 
         Canada. This coffee can be used to make cold brew coffee as well, or you can
         buy pre-made pour-and-serve cold brew.<p>
      <h2>Bulk Coffee Beans</h2><a href="#" class="go_top">Go to the top</a>
        <p>Coffees here are broken down into the 1-lb (16 oz, 454 g, 0.45 kg) valve-seal
        bags, making it easy to store multiple coffees without worrying about it going
        stale. If you want to order 1kg (2.2-lb) or 1.36kg (3-lb), simply order 
        multiple 1-lb bags. We also have 5-lb (2.27kg) bags available under our 
        wholesale coffee section. For restaurants and hotels, you can find coffee 
        fraction packs in a variety of sizes.<p>
     </main>
     
<?php 
/**
 * include file which will be used as a template for each page as a  footer
 */
    include __DIR__ . '/../inc/footer.inc.php';

?>
    </div>
  </body>

</html>