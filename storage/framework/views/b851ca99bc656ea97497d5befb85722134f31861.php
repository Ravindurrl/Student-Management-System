<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Student</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body { font-family: sans-serif; background: #f3f4f6; color: #111; }

  .navbar {
    background: #1e40af;
    color: #fff;
    padding: 14px 32px;
    font-size: 18px;
    font-weight: 600;
  }

  .container {
    max-width: 520px;
    margin: 40px auto;
    padding: 0 16px;
  }

  .back {
    display: inline-block;
    font-size: 14px;
    color: #64748b;
    text-decoration: none;
    margin-bottom: 20px;
  }
  .back:hover { color: #1e40af; }

  .card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 1px 4px rgba(0,0,0,.08);
    padding: 32px;
  }
  .card h2 { font-size: 20px; margin-bottom: 24px; color: #1e293b; }

  .row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }

  .form-group { margin-bottom: 16px; }
  label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 6px;
  }
  .req { color: #ef4444; }

  input {
    width: 100%;
    padding: 10px 12px;
    border: 1.5px solid #e2e8f0;
    border-radius: 6px;
    font-size: 14px;
    font-family: sans-serif;
    outline: none;
    transition: border-color .2s;
  }
  input:focus { border-color: #1e40af; }
  input.err { border-color: #ef4444; }

  .error { font-size: 12px; color: #ef4444; margin-top: 4px; }
  .hint  { font-size: 12px; color: #94a3b8; margin-top: 4px; }

  hr { border: none; border-top: 1px solid #f1f5f9; margin: 20px 0; }

  .actions { display: flex; gap: 10px; }

  .btn {
    padding: 10px 20px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    border: none;
    text-decoration: none;
    display: inline-block;
    text-align: center;
  }
  .btn-blue { flex: 1; background: #1e40af; color: #fff; }
  .btn-blue:hover { background: #1e3a8a; }
  .btn-outline { background: #fff; color: #374151; border: 1.5px solid #e2e8f0; }
  .btn-outline:hover { background: #f9fafb; }
</style>
</head>
<body>

<div class="navbar"> Student Management System </div>

<div class="container">

  <a href="<?php echo e(route('students.index')); ?>" class="back">← Back to list</a>

  <div class="card">
    <h2>Add New Student</h2>

    <form action="<?php echo e(route('students.store')); ?>" method="POST">
      <?php echo csrf_field(); ?>

      <div class="row">
        <div class="form-group">
          <label>First Name <span class="req">*</span></label>
          <input type="text" name="first_name" value="<?php echo e(old('first_name')); ?>"
                 placeholder="Racindu" class="<?php echo e($errors->has('first_name') ? 'err' : ''); ?>">
          <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group">
          <label>Last Name <span class="req">*</span></label>
          <input type="text" name="last_name" value="<?php echo e(old('last_name')); ?>"
                 placeholder="Hettiarachchi" class="<?php echo e($errors->has('last_name') ? 'err' : ''); ?>">
          <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
      </div>

      <div class="form-group">
        <label>Email <span class="req">*</span></label>
        <input type="email" name="email" value="<?php echo e(old('email')); ?>"
               placeholder="test@123gmail.com" class="<?php echo e($errors->has('email') ? 'err' : ''); ?>">
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <div class="form-group">
  <label>Phone <span class="req">*</span></label>

  <input type="tel"
         name="phone"
         value="<?php echo e(old('phone')); ?>"
         placeholder="0123456789"
         maxlength="10"
         oninput="this.value=this.value.replace(/[^0-9]/g,'')"
         class="<?php echo e($errors->has('phone') ? 'err' : ''); ?>">

  <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="error"><?php echo e($message); ?></div>
  <?php else: ?>
    <div class="hint">Must be 10 digits and start with 07</div>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

      <div class="form-group">
        <label>Course <span class="req">*</span></label>
        <input type="text" name="course" value="<?php echo e(old('course')); ?>"
               placeholder="e.g. Computer Science" class="<?php echo e($errors->has('course') ? 'err' : ''); ?>">
        <?php $__errorArgs = ['course'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <hr>

      <div class="actions">
        <a href="<?php echo e(route('students.index')); ?>" class="btn btn-outline">Cancel</a>
        <button type="submit" class="btn btn-blue">Save Student</button>
      </div>

    </form>
  </div>

</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\student-management\resources\views/students/create.blade.php ENDPATH**/ ?>