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
$title = 'redirect_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Form submittion';


  $query = "SELECT first_name, last_name, street, city, postal_code, province, country, phone, email FROM customer 
            WHERE customer_id = :customer_id";

      // prepare the query
      $stmt = $dbh->prepare($query);
      $customer_id = $dbh->lastInsertId();
      // Prepare params array
      $params = array(
        ':customer_id' => $_POST['customer_id']
    );
    // execute the query
    $stmt->execute($params);

    // get the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $success = true;


include __DIR__ . '/../inc/header.inc.php';
?>
    <title><?=$title?></title>
    <main><!--Main page -->
      <h1><?=$h1?></h1>

<?php if(!$success) : ?>
<form method="post" action="contact_page.php" novalidate>
  <input type="hidden" name="token" value="<?=getToken()?>" />
<fieldset>
  <legend>Registration Form</legend>
  <p><label for="first_name">First Name</label><br />
    <input type="text" name="first_name" 
    value="<?=clean('first_name')?>" /></p>
  <p><label for="last_name">Last Name</label><br />
    <input type="text" name="last_name"
    value="<?=clean('last_name')?>" /></p>
  <p><label for="age">Age</label><br />
    <input type="text" name="age"
    value="<?=clean('age')?>" /></p>
  <p><label for="street">Street</label><br />
    <input type="text" name="street" 
    value="<?=clean('street')?>" /></p>
  <p><label for="city">City</label><br />
    <input type="text" name="city" 
    value="<?=clean('city')?>" /></p>
  <p><label for="postal_code">Postal Code</label><br />
    <input type="text" name="postal_code"
    value="<?=clean('postal_code')?>" /></p>
  <p><label for="province">Province</label><br />
    <input type="text" name="province"
    value="<?=clean('province')?>" /></p>
  <p><label for="country">Country</label><br />
    <input type="text" name="country"
    value="<?=clean('country')?>" /></p>
  <p><label for="phone">Phone</label><br />
    <input type="text" name="phone"
    value="<?=clean('phone')?>" /></p>
  <p><label for="email">Email</label><br />
    <input type="text" name="email" 
    value="<?=clean('email')?>" /></p>
  <p><label for="password">Password</label><br />
    <input type="password" name="password" /></p>
  <p><label for="conf_passw">Confirm assword</label><br />
    <input type="password" name="conf_passw" /></p>
  <p><button>Submit</button></p>
</fieldset>
</form>

<?php else : ?>

<h2>Thank you for your registration on our web site!</h2>

  <ul><!-- Loop through $_POST to output user -->
  <?php foreach($result as $key => $value): ?>
    <!-- Test each value to see if it's an array, and
      if it's NOT an array, we can print it out -->
    <?php if(!is_array($value)) : ?>
      <li><strong><?=e($key)?></strong>: <?=e($value)?></li>
      </li>

    <?php endif; ?>
  <?php endforeach; ?>
    </ul>
  </ul>
<?php endif; ?>

<pre>

  <?php // print_r($_SERVER) ?>

</pre>
</body>
  
  <?php 
  /**
   * include file which will be used as a template for each page as a footer
   */
   include __DIR__ . '/../inc/footer.inc.php';

  ?>    
</html>