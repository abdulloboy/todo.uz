<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container">
    <h5><?php echo $message ?? '' ?></h5>
    <div class="text-center">
        <div class="col-md-3">
            <form method="POST">
                <div class="form-group">
                    <input class="form-control" type="text" name="login" placeholder="Login" autofocus required />
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password" required />
                </div>
                <input class="form-control" class="submit" type="submit" name="submit" value="Login" />
            </form>
        </div>
    </div>

</div>