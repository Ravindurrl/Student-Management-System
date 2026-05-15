<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Students</title>

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

  .container { max-width: 900px; margin: 36px auto; padding: 0 16px; }

  .top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    gap: 12px;
  }

  .top-bar h2 {
    font-size: 20px;
    color: #1e293b;
    white-space: nowrap;
  }

  .search-form {
    display: flex;
    gap: 8px;
    flex: 1;
    max-width: 360px;
  }

  .search-form input {
    flex: 1;
    padding: 9px 12px;
    border: 1.5px solid #e2e8f0;
    border-radius: 6px;
    font-size: 14px;
    outline: none;
  }

  .search-form input:focus {
    border-color: #1e40af;
  }

  .btn {
    padding: 9px 18px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    cursor: pointer;
    border: none;
    display: inline-block;
  }

  .btn-blue { background: #1e40af; color: #fff; }
  .btn-blue:hover { background: #1e3a8a; }

  .btn-gray { background: #e5e7eb; color: #374151; }
  .btn-gray:hover { background: #d1d5db; }

  .btn-red { background: #fee2e2; color: #b91c1c; }
  .btn-red:hover { background: #fecaca; }

  .alert {
    padding: 12px 16px;
    border-radius: 6px;
    margin-bottom: 18px;
    font-size: 14px;
    background: #dcfce7;
    color: #166534;
    border: 1px solid #bbf7d0;
  }

  .card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 1px 4px rgba(0,0,0,.08);
    overflow: hidden;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  thead {
    background: #f8fafc;
  }

  th {
    padding: 12px 16px;
    text-align: left;
    font-size: 12px;
    font-weight: 600;
    color: #64748b;
    text-transform: uppercase;
    border-bottom: 1px solid #e2e8f0;
  }

  td {
    padding: 14px 16px;
    font-size: 14px;
    border-bottom: 1px solid #f1f5f9;
  }

  tr:hover td {
    background: #f8fafc;
  }

  .name { font-weight: 500; }
  .email { font-size: 12px; color: #64748b; }

  .badge {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 12px;
    background: #eff6ff;
    color: #1e40af;
  }

  .actions {
    display: flex;
    gap: 6px;
  }

  .empty {
    text-align: center;
    padding: 48px;
    color: #94a3b8;
  }

  .pagination {
    margin-top: 16px;
    display: flex;
    justify-content: center;
  }
</style>
</head>

<body>

<div class="navbar">Student Management System</div>

<div class="container">

  <div class="top-bar">
    <h2>All Students</h2>

    <form class="search-form" method="GET" action="<?php echo e(route('students.index')); ?>">
      <input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Search name or email...">
      <button type="submit" class="btn btn-blue">Search</button>
    </form>

    <a href="<?php echo e(route('students.create')); ?>" class="btn btn-blue">+ Add Student</a>
  </div>

  <?php if(session('success')): ?>
    <div class="alert">✓ <?php echo e(session('success')); ?></div>
  <?php endif; ?>

  <div class="card">

    <?php if($students->isEmpty()): ?>
      <div class="empty">
        No students found.
      </div>
    <?php else: ?>

    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Student</th>
          <th>Phone</th>
          <th>Course</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td style="color:#94a3b8">
            <?php echo e($students->firstItem() + $i); ?>

          </td>

          <td>
            <div class="name">
              <?php echo e($student->first_name); ?> <?php echo e($student->last_name); ?>

            </div>
            <div class="email"><?php echo e($student->email); ?></div>
          </td>

          <td><?php echo e($student->phone); ?></td>

          <td>
            <span class="badge"><?php echo e($student->course); ?></span>
          </td>

          <td>
            <div class="actions">
              <a href="<?php echo e(route('students.edit', $student->id)); ?>" class="btn btn-gray">Edit</a>

              <form action="<?php echo e(route('students.destroy', $student->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="btn btn-red" onclick="return confirm('Delete this student?')">
                  Delete
                </button>
              </form>
            </div>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>

    <?php endif; ?>
  </div>



  <div class="pagination">
    <?php echo e($students->appends(request()->query())->links()); ?>

  </div>

</div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\student-management\resources\views/students/index.blade.php ENDPATH**/ ?>