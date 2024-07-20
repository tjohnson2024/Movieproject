<?php
// Retrieve the username from the URL parameter
$username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '';

require_once '/home/runner/cosc-4806-4/app/views/templates/header.php';
?>

<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Reminders</h1>
                <p>
                    <a href="/reminders/create" class="btn btn-primary">Create a new reminder</a>
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h2>All Reminders</h2>

            <ul class="list-group">
                <?php foreach ($data['reminders'] as $reminder): ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-8">
                                <form action="/delete_and_update/update" method="post">
                                    <input type="hidden" name="id" value="<?php echo $reminder['id']; ?>">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="reminders" value="<?php echo htmlspecialchars($reminder['reminders']); ?>">
                                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4 text-end">
                                <form action="/delete_and_update/delete" method="post" style="display: inline;">
                                    <input type="hidden" name="id" value="<?php echo $reminder['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this reminder?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>

</div>

<?php require_once '/home/runner/cosc-4806-4/app/views/templates/footer.php'; ?>
