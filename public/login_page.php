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
$title = 'login_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Please log in into your account';


if(filter_input(INPUT_GET, 'logout')){
  //$_SESSION =[];
  session_destroy();
  
  //start new session after logged in
  session_start();

  setFlash('success', 'You have successfully logged out');
  // redirect to the same page
  header('Location: login_page.php');

  die;
}

$v = new Validator();

if('POST' == filter_input(INPUT_SERVER, 'REQUEST_METHOD')){
	// normally we had pull our hashed password from the DB
  $v->required('first_name');
  $v->required('email');
  $v->required('password'); 

  if(!$v->errors()){
  $query = "SELECT * FROM customer WHERE email = :email";
  $stmt = $dbh->prepare($query);

  $params = array(
    ':email' => filter_input(INPUT_POST, 'email')
  );

  $stmt->execute($params);
  $customer = $stmt->fetch(PDO::FETCH_ASSOC);
  // only test password if we find a customer with the provided email
  
  

  if($customer){ 
  	// compare form password to stored password
  	//  if they match
  	  $form_password = filter_input(INPUT_POST, 'password');
      $stored_password = password_hash($customer['password'], PASSWORD_DEFAULT);
      
      if(password_verify($form_password, $stored_password)){
        // Set session logged_in to 1
        session_regenerate_id();
        $_SESSION['logged_in'] = 1;
        setFlash('success', filter_input(INPUT_POST, 'first_name') . ', you have successfully logged in');
        // redirect customer to profile
        header('Location: profile_page.php');
        // die
        die;
        }  
  	  }// else / end if
       setFlash('error', 'There were a problem with your credentials');
  	} // end if no errors
}// end of post

$errors = $v->errors();



/**
 * include file which will be used as a template for each page as a header
 */

include __DIR__ . '/../inc/header.inc.php';

?>
<?php include __DIR__ . '/../inc/flash.inc.php'; ?>
  <title><?=$title?></title>
  <main>
    <h1><?=$h1?></h1>

<?php include __DIR__ . '/../lib/errors.inc.php'; ?>

<form method="post" action="<?=filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_STRING)?>">
  <input type="hidden" name="token" value="<?=getToken()?>" />
  <p><label for="first_name">First Name</label><br />
    <input type="text" name="first_name" 
    value="<?=clean('first_name')?>" placeholder="Please enter your first name" /></p>
  <p><label for="last_name">Last Name</label><br />
    <input type="text" name="last_name"
    value="<?=clean('last_name')?>" placeholder="Please enter your last name" /></p>
  <p><label for="email">Email</label><br />
	  <input type="text" name="email" 
    value="<?=clean('email')?>" placeholder="Please enter your email"/></p>
  <p><label for="password">Password</label><br />
	   <input type="password" name="password" placeholder="Your password" /><br />
	<p><button>Login</button></p>
</form>



</body>
  
  <?php 
  /**
   * include file which will be used as a template for each page as a footer
   */
   include __DIR__ . '/../inc/footer.inc.php';

  ?>    
</html>