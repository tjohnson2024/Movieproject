<?php require_once '/home/runner/cosc-4806-4/app/views/templates/headerPublic.php'?>
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row justify-content-center"> <!-- Center the content -->
            <div class="col-lg-8">
                <h1 class="text-center">You are not logged in</h1> <!-- Center the text -->
            </div>
        </div>
    </div>

    <div class="row justify-content-center"> <!-- Center the form -->
        <div class="col-lg-6">
            <form action="/login/verify" method="post">
                <fieldset>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input required type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input required type="password" class="form-control" name="password">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="/create/index" class="btn btn-secondary">Create Account</a>
                </fieldset>
            </form>
        </div>
    </div>
</main>
<?php require_once '/home/runner/cosc-4806-4/app/views/templates/footer.php' ?>
