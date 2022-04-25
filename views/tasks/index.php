<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<div class="text-right">
    <a href="add">Создать таск</a>
    <?php if ($admin) { ?>
        <a href="logout">Выход</a>
    <?php } else { ?>
        <a href="login">Авторизовать</a>
    <?php }  ?>
</div>
<h5><?php echo $message ?? '' ?></h5>

<table class="table">
    <thead>
        <tr>
            <th class="col-3" scope="col">
                <?php if (isset($_GET['sort']) && $_GET['sort'] == 'username_desc') { ?>
                    <a href="?sort=username">
                        Имя пользователя
                        <span class="glyphicon glyphicon-arrow-up"></span>
                    </a>
                <?php } elseif (isset($_GET['sort']) && ($_GET['sort'] == 'username')) { ?>
                    <a href="?sort=username_desc">
                        Имя пользователя
                        <span class="glyphicon glyphicon-arrow-down"></span>
                    </a>
                <?php } else { ?>
                    <a href="?sort=username">
                        Имя пользователя
                    </a>
                <?php }  ?>
            </th>
            <th scope="col">
                <?php if (isset($_GET['sort']) && $_GET['sort'] == 'email_desc') { ?>
                    <a href="?sort=email">
                        E-mail
                        <span class="glyphicon glyphicon-arrow-up"></span>
                    </a>
                <?php } elseif (isset($_GET['sort']) && ($_GET['sort'] == 'email')) { ?>
                    <a href="?sort=email_desc">
                        E-mail
                        <span class="glyphicon glyphicon-arrow-down"></span>
                    </a>
                <?php } else { ?>
                    <a href="?sort=email">
                        E-mail
                    </a>
                <?php }  ?>
            </th>
            <th scope="col">
                Текст задачи
            </th>
            <th scope="col">
                <?php if (isset($_GET['sort']) && $_GET['sort'] == 'status_desc') { ?>
                    <a href="?sort=status">
                        Статус
                        <span class="glyphicon glyphicon-arrow-up"></span>
                    </a>
                <?php } elseif (isset($_GET['sort']) && ($_GET['sort'] == 'status')) { ?>
                    <a href="?sort=status_desc">
                        Статус
                        <span class="glyphicon glyphicon-arrow-down"></span>
                    </a>
                <?php } else { ?>
                    <a href="?sort=status">
                        Статус
                    </a>
                <?php }  ?>
            </th>
            <?php if ($admin) { ?>
                <th scope="col">
                    Действие
                </th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>

        <!-- List of tasks -->
        <?php foreach ($tasks as $task) : ?>
            <tr>
                <td><?= $task['username'] ?></td>
                <td><?= $task['email'] ?></td>
                <td><?= $task['text'] ?></td>
                <td>
                    <?php if ($task['status'] == 1) {
                        echo "Выполнено";
                    } else {
                        echo "Невыполнено";
                    }
                    if ($task['edited'] == 1) {
                        echo ". Отредактировано администратором ";
                    }

                    ?>
                </td>
                <?php if ($admin) { ?>
                    <td scope="col">
                        <a href="edit/<?php echo $task['id'] ?>">
                            Редактироват
                        </a>
                    </td>
                <?php } ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="text-center">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php for ($i = 1; $i <= $numberOfPages; $i++) : ?>
                <li class="page-item <?php if ($i == $page) echo 'active' ?> ">
                    <a class="page-link" href='<?php echo "/?page=$i" . (isset($_GET["sort"]) ? "&sort=" . $_GET["sort"] : ""); ?>'>
                        <?php echo $i ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>