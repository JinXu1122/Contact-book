<?php
  require "functions.php";

  // If not id is set or no contact is found, redirect to index.php
  if (isset($_GET['id'])) {
    $contact = getContact($_GET['id']);
  }
  else {
    header("Location: index.php");
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<?php require "head.php"; ?>
<body>
  <main id="app" class="container my-5 bg-white">
    <div class="row justify-content-center">
      <div class="col-8 p-5">
        <?php require "header.php"; ?>
        <section class="row">
          <div class="col-12">
            <h1 class="display-4 mb-3"><?php echo "{$contact['first_name']} {$contact['last_name']}" ?></h1>
            <hr>
            <p>email<br>
              <a href="mailto:john.smith@email.com"  class="text-decoration-none"><?php echo $contact['email']; ?></a>
            </p>
            <p>phone<br>
              <?php echo formatPhone($contact['phone']); ?>
            </p>
            <hr>
            <p>birthday<br>
              <?php echo $contact['birthday']; ?>
            </p>
          </div>
        </section>
      </div>
    </div>
  </main>
</body>
</html>