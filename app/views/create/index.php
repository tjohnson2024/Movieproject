<?php require_once '/home/runner/cosc-4806-4/app/views/templates/headerPublic.php' ?>
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center">Create an Account</h1> <!-- Center the text -->
            </div>
        </div>
    </div>

    <div class="row justify-content-center"> <!-- Center the form -->
        <div class="col-lg-6">
            <form action="/create/verify" method="post">
                <fieldset>
                    <input type="hidden" name="action" value="create"> <!-- Hidden input field for action -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input required type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input required type="password" class="form-control" name="password">
                    </div>
                    <!-- Add more registration fields here if needed -->
                    <br>
                    <button type="submit" class="btn btn-primary btn-block">Register</button> <!-- Make the button full width -->
                </fieldset>
            </form>
        </div>
    </div>
</main>
<?php require_once '/home/runner/cosc-4806-4/app/views/templates/footer.php' ?>
