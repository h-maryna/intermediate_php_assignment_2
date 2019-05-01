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

// conditions for cheking if used looged in
if(empty($_SESSION['logged_in'])){
  setFlash('error', "You must be logged in to visit this page");
  header('Location: login_page.php');
  die;
}

$id = intval($_SESSION['logged_in']);
 // Create query to select a customer according its id
  $query = "SELECT first_name, last_name, street, city, postal_code, province, country, phone, email FROM customer 
            WHERE customer_id = :customer_id";

      // prepare the query
      $stmt = $dbh->prepare($query);
      $customer_id = $dbh->lastInsertId();
      // Prepare params array
      $params = array(
        ':customer_id' => $id
    );
    // execute the query
    $stmt->execute($params);

    // get the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

include __DIR__ . '/../inc/header.inc.php';
?>
    <title><?=$title?></title>
    <main><!--Main page -->
      <h1><?=$h1?></h1>

<?php if($result) : ?>

<h2><?=$result['first_name']?> , this is your profile!</h2>

  <ul><!-- Loop through $_POST to output user -->
  <?php foreach($result as $key => $value): ?>
    <!-- Test each value to see if it's an array, and
      if it's NOT an array, we can print it out -->
      <li><strong><?=$key?></strong>: <?=$value?></li>
  <?php endforeach; ?>
    </ul>

    <p><a href="register_page.php">Add another user</a></p>
  <?php else : ?>
    <h2>There were some problem adding a new user</h2>
<?php endif; ?>

</body>
  
  <?php 
  /**
   * include file which will be used as a template for each page as a footer
   */
   include __DIR__ . '/../inc/footer.inc.php';

  ?>    
</html>