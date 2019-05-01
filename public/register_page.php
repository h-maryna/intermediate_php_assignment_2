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
$title = 'register_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Registartion Form';


// empty errors array
// serves as flag... we
// can test at any time to see
// if we have errors
$errors = [];

$v = new Validator();
// Set flag that form has not been
// submitted successfully.  This will
// be used as a conditional to determine
// what to display in the view.
$success = false;

// If the request is POST (a form submission)
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  // Our required fields
  $required = ['first_name', 'last_name', 'age', 'street', 'city', 'postal_code', 'province', 'country', 'phone', 'email', 'password', 'conf_passw'];

  // Make sure there is a POST value for each
  // required field
  foreach($required  as $key => $value) {
    $v->required($value);
    $v->string('first_name');
    $v->string('last_name');
    $v->string('city');
    $v->string('street');
    $v->string('country');
    $v->integer('age');
    $v->postal_code('postal_code');
    $v->password('password');

    if('POST' == filter_input(INPUT_SERVER, 'REQUEST_METHOD')){
       if($_SESSION['token'] != filter_input(INPUT_POST, 'token')){
           die('CSRF token mismatch');
           }
        }
  }
  

  $errors = $v->errors();

  
  
  // If there are no errors after processing all POST
   if(!$errors) {
        try {

      // create query
      $query = "INSERT INTO
             customer
             (first_name, last_name, age, street, city, postal_code, province, country, phone, email, password, conf_passw)
             VALUES
             (:first_name, :last_name, :age, :street, :city, :postal_code, :province, :country, :phone, :email, :password, :conf_passw)";
      
      // prepare query
      $stmt = $dbh->prepare($query);

      $params = array(
        ':first_name' => $_POST['first_name'],
        ':last_name' => $_POST['last_name'],
        ':age' => $_POST['age'],
        ':street' => $_POST['street'],
        ':city' => $_POST['city'],
        ':postal_code' => $_POST['postal_code'],
        ':province' => $_POST['province'],
        ':country' => $_POST['country'],
        ':phone' => $_POST['phone'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password'],
        ':conf_passw' => $_POST['conf_passw']//password_hash($_POST['password'], PASSWORD_DEFAULT)
      );

      // execute query
      $stmt->execute($params);

      $customer_id = $dbh->lastInsertId();
      //header('Location: redirect_form.php');
      header('Location: redirect_form.php?customer_id=' . $customer_id);
      //exit;
/*
      // Create query to select a customer according its id
    $query = "SELECT first_name, last_name, age, street, city, postal_code, province, country, phone, email FROM customer 
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
    $success = true; */
        } catch(Exception $e) {
          die($e->getMessage());
        }
    
  } // end if

} // END IF POST

/**
 * include file which will be used as a template for each page as a header
 */
include __DIR__ . '/../inc/header.inc.php';
?>
    <title><?=$title?></title>
    <main><!--Main page -->
      <h1><?=$h1?></h1>
  <?php include __DIR__ . '/../lib/errors.inc.php'; ?>
  


<?php if(!$success) : ?>

<form method="post" action="register_page.php" novalidate>
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
  <p><label for="conf_passw">Confirm password</label><br />
    <input type="password" name="conf_passw" /></p>
  <p><button>Login</button></p>
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