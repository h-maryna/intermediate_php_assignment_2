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
$title = 'contact_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Visit Coffee Time';

/**
 * include file which will be used as a template for each page as a header
 */
include __DIR__ . '/../../inc/header.inc.php';

require 'functions.php';
include 'connect.php';

// empty errors array
// serves as flag... we
// can test at any time to see
// if we have errors
$errors = [];

// Set flag that form has not been
// submitted successfully.  This will
// be used as a conditional to determine
// what to display in the view.
$success = false;

// If the request is POST (a form submission)
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  // Our required fields
  $required = ['first_name', 'last_name', 'street', 'city', 'postal_code', 'province', 'country', 'phone', 'email', 'password'];

  // Make sure there is a POST value for each
  // required field
  foreach($required  as $key => $value) {

    if(empty($_POST[$value])) {
      // Set an error message in the errors
      // array if there is no POST value for
      // a field
      $errors[$value] = $value . ' is a required field';
    }

    if(strlen($_POST['first_name']) < 3) {
      $errors['first_name'] = 'First name must have at least 3 characters';
    }
    
    if(strlen($_POST['last_name']) < 4) {
      $errors['last_name'] = 'Last name must have at least 4 characters';
    }

    if(strlen($_POST['country']) < 2) {
      $errors['country'] = 'Country must have at least 2 characters';
    }

    if((strlen($_POST['postal_code']) < 5) && (strlen($_POST['postal_code']) >6)){
      $errors['postal_code'] = 'Postal code must have 6 characters';
    }

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Please provide a valid email address';
    }

  }

  
  // If there are no errors after processing all POST
   if(!$errors) {
        try {

      // create query
      $query = "INSERT INTO
             customer
             (first_name, last_name, street, city, postal_code, province, country, phone, email, password)
             VALUES
             (:first_name, :last_name, :street, :city, :postal_code, :province, :country, :phone, :email, :password)";
      
      // prepare query
      $stmt = $dbh->prepare($query);

      $params = array(
        ':first_name' => $_POST['first_name'],
        ':last_name' => $_POST['last_name'],
        ':street' => $_POST['street'],
        ':city' => $_POST['city'],
        ':postal_code' => $_POST['postal_code'],
        ':province' => $_POST['province'],
        ':country' => $_POST['country'],
        ':phone' => $_POST['phone'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password']
      );

      // execute query
      $stmt->execute($params);

      $customer_id = $dbh->lastInsertId();

      //header('Location: inserting_data.php?customer_id=' . $customer_id);
      //exit;
      // Create query to select a customer according its id
      $query = "SELECT first_name, last_name, street, city, postal_code, province, country, phone, email FROM customer 
            WHERE customer_id = :customer_id";

      // prepare the query
      $stmt = $dbh->prepare($query);

      // Prepare params array
      $params = array(
        ':customer_id' => $customer_id
    );

    // execute the query
    $stmt->execute($params);

    // get the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $success = true;
        } catch(Exception $e) {
          die($e->getMessage());
        }
    
  } // end if
} // END IF POST


?>
    <title><?=$title?></title>
    <main><!--Main page -->
      <h1><?=$h1?></h1>
      <p> and sip a complimentary tea or coffee while you 
       browse our selection of unique tea and coffee offerings, including a 
       wide range of elegant Asian and European glassware, teapots and accessories</p>  
      
      
      <h2>Location</h2>
      <div class="slogan">
          <img src="images/slogan.JPG" alt="All you need is a coffe" style="width:100%">
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
   
      <h1>Registration</h1>
  <?php include 'errors.inc.php'; ?>
  <?php if($errors) : ?>

  <h1>We found errors</h1>
    <div class="errors">
      <p>Please go back and correct the following errors:</p>
      <ul>
      <?php foreach($errors as $value) : ?>
        <li><?=e($value)?></li>
      <?php endforeach; ?>
      </ul>
    </div>

  <?php endif; ?>


<?php if(!$success) : ?>

<form method="post" action="contact_page.php" novalidate>
<fieldset>
  <legend>Registration Form</legend>
  <p><label for="first_name">First Name</label><br />
    <input type="text" name="first_name" 
    value="<?=clean('first_name')?>" /></p>
  <p><label for="last_name">Last Name</label><br />
    <input type="text" name="last_name"
    value="<?=clean('last_name')?>" /></p>
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
    <input type="password" name="password" 
    value="<?=clean('password')?>" /></p>
  <p><label for="password">Confirm assword</label><br />
    <input type="password" name="password" 
    value="<?=clean('password')?>" /></p>
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
   include __DIR__ . '/../../inc/footer.inc.php';

  ?>    
</html>