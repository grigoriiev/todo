
<?php $this->layout('layout');
?>
<body class="container-fluid">

    <table class="table table-responsive users-table">
        <thead>
            <tr>
                <td>
                   имя пользователя
                </td>
                <td>
                  e-mail
                </td>
                <td>
                    текст задачи
                </td>
                <td>
                статусу
                </td>
                 <td>
                <a href="/" class="btn btn-success create-button">Страница пользователя</a> 
                </td> 
            </tr>
        </thead>

    </table>

<?php if ($posts ): ?>
 <?php foreach($posts as $post):?>

    <form method="POST" action="/admin/updatePost/<?=$post["id"]?>" >
        <table class="table table-responsive users-table">

            <tbody>
                <tr>
                    <td>
                        <input class="form-control" name="name" type="text" placeholder="admin" data-validate="required"  value="<?= $post["name"];?>" required>
                    </td>
                    <td>
                        <input class="form-control" name="email" type="email"  data-validate="required"  placeholder="example@example.ru" value="<?= $post["email"];?>" required>
                    </td>
                    <td>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" placeholder="description" data-validate="required" required rows="3"> <?= $post["description"];?></textarea>
                    </td>
                    <td>
                    <?= $post["status"];?>
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status" >
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success create-button">Изменить</button> 
                    </td>
                   
                </tr>
            </tbody>
        </table>

    </form>
    <?php endforeach; ?>
<?php endif; ?>
<?= paginator($paginator); ?>
    <script>
    </script>
</body>

</html>