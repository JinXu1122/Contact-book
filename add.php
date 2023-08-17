<?php
  require "functions.php";

  if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action == 'add') {
      $data = sanitize($_POST);
      $errors = validate($data);

      if (count($errors) === 0) {
        $id = createContact($data);

        if ($id) {
          header("Location: contact.php?id=$id");
        }
      }

      extract($_POST);
    }
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
          <div class="col-8">
            <h1 class="display-4 mb-3">Add Contact</h1>
            <form method="post" class="bg-light p-4 border border-1">
              <input type="hidden" name="action" value="add">
              <?php require "inputs.php"; ?>
              <button type="submit" class="btn btn-primary">Add Contact</button>
            </form>
          </div>
        </section>
      </div>
    </div>
  </main>
</body>
</html>