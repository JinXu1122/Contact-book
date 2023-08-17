<header class="row">
  <div class="col-6 my-3">
    <?php if (strpos($_SERVER["PHP_SELF"], "update.php")): ?>
      <a href="contact.php?id=<?php echo $_GET['id'] ?? '' ?>" class="text-decoration-none">&lt; Back</a>
    <?php elseif (strpos($_SERVER["PHP_SELF"], "add.php") || strpos($_SERVER["PHP_SELF"], "contact.php")): ?>
      <a href="index.php" class="text-decoration-none">&lt; Back</a>
    <?php endif; ?>
  </div>
  <div class="col-6 d-flex justify-content-end my-3">
    <?php if (strpos($_SERVER["PHP_SELF"], "index.php")): ?>
      <a href="add.php" class="text-decoration-none">Add</a>
    <?php elseif (strpos($_SERVER["PHP_SELF"], "contact.php")): ?>
      <a href="update.php?id=<?php echo $_GET['id'] ?? '' ?>"  class="text-decoration-none">Update</a>
    <?php endif; ?>
  </div>
</header>