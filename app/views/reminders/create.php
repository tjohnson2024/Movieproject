<?php require_once '/home/runner/cosc-4806-4/app/views/templates/header.php'; ?>

<div class="container">
  <div class="page-header" id="banner">
    <div class="row">
      <div class="col-lg-12">
        <h1>Create a New Reminder</h1>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <form action="/store/verify" method="POST">


        <div class="form-group">
          <label for="reminder">Reminder Text</label>
          <textarea class="form-control" id="reminder" name="reminder" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" style="position:relative; top:20px; width: 100%;">Create Reminder</button>
      </form>
    </div>
  </div>

</div>

<?php require_once '/home/runner/cosc-4806-4/app/views/templates/footer.php'; ?>
