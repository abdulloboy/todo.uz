<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container">
    <h3 class="col-md-9 text-center">Редактироват таск</h3>
    <div class="row text-center">
        <div class="col-md-9">
            <form enctype="multipart/form-data" method="POST">
                <input value="<?php print_r($task['id']) ?>" class="form-control" type="hidden" name="id" id="user_name" placeholder="User name" required />
                <div class="form-group">
                    <input value="<?php print_r($task['username']) ?>" class="form-control" type="text" name="username" id="user_name" placeholder="User name" required />
                </div>
                <div class="form-group">
                    <input value="<?php print_r($task['email']) ?>" class="form-control" type="email" name="email" id="user_email" placeholder="Email" required />
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="4" cols="30" name="text" id="text" placeholder="Your task" required><?php print_r($task['text']) ?></textarea>
                </div>
                <div class="form-group">
                    <input class="form-check-input" type="checkbox" value="1" id="status" name="status" <?php $task['status'] == '1' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="status">
                        Выполнено
                    </label>
                </div>
                <input class="form-control submit" type="submit" name="submit" value="Add" />
            </form>
        </div>
    </div>
</div>