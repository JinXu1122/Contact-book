<div class="row">
  <div class="mb-3 col-md-6">
    <label for="first_name" class="form-label d-flex justify-content-between">First Name<small class="text-danger">*required</small></label>
    <input 
      type="text" 
      class="form-control <?php if(isset($errors['first_name'])): ?>is-invalid<?php endif; ?>" 
      id="first_name" 
      name="first_name" 
      placeholder="John" 
      value="<?php echo $first_name ?? ''; ?>">
    <div class="invalid-feedback">
      <?php if(isset($errors['first_name'])): ?>
        <?php echo $errors['first_name']; ?>
      <?php endif; ?>
    </div>
  </div>
  <div class="mb-3 col-md-6">
    <label for="last_name" class="form-label d-flex justify-content-between">Last Name<small class="text-danger">*required</small></label>
    <input 
      type="text" 
      class="form-control <?php if(isset($errors['last_name'])): ?>is-invalid<?php endif; ?>" 
      id="last_name" 
      name="last_name" 
      placeholder="Smith" 
      value="<?php echo $last_name ?? ''; ?>">
    <div class="invalid-feedback">
      <?php if(isset($errors['last_name'])): ?>
        <?php echo $errors['last_name']; ?>
      <?php endif; ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="mb-3">
    <label for="email" class="form-label d-flex justify-content-between">Email<small class="text-danger">*required</small></label>
    <input 
      type="text" 
      class="form-control <?php if(isset($errors['email'])): ?>is-invalid<?php endif; ?>" 
      id="email" 
      name="email" 
      placeholder="john.smith@email.com" 
      value="<?php echo $email ?? ''; ?>">
    <div class="invalid-feedback">
      <?php if(isset($errors['email'])): ?>
        <?php echo $errors['email']; ?>
      <?php endif; ?>  
    </div>
  </div>
</div>
<div class="row">
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input 
      type="text" 
      class="form-control <?php if(isset($errors['phone'])): ?>is-invalid<?php endif; ?>" 
      id="phone" 
      name="phone" 
      placeholder="<?php echo formatPhone('1234567890'); ?>" 
      value="<?php echo formatPhone($phone ?? '') ?? ''; ?>">
    <div class="invalid-feedback">
      <?php if(isset($errors['phone'])): ?>
        <?php echo $errors['phone']; ?>
      <?php endif; ?>  
    </div>
  </div>
  
</div>
<div class="row">
  <div class="mb-3">
    <label for="birthday" class="form-label">Birthday</label>
    <input 
      type="date" 
      class="form-control <?php if(isset($errors['birthday'])): ?>is-invalid<?php endif; ?>" 
      id="birthday" 
      name="birthday" 
      placeholder="1990-01-01" 
      value="<?php echo $birthday ?? ''; ?>">
    <div class="invalid-feedback">
      <?php if(isset($errors['birthday'])): ?>
        <?php echo $errors['birthday']; ?>
      <?php endif; ?>  
    </div>
  </div>
</div>