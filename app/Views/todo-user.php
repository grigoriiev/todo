<?php $this->layout('layout') ?>
<form method="POST" action="/login" enctype="multipart/form-data">
        <table class="table table-responsive users-table">

            <tbody>
                <tr>
                    <td>
                        <input class="form-control" name="login" type="text" placeholder="admin" data-validate="required"  value="" required>
                    </td>
                    <td>
                        <input class="form-control" name="password" type="password"  data-validate="required"  placeholder="example@example.ru" value="" required>
                    </td>
                   
                    <td>
                        <button type="submit" class="btn btn-success create-button">Авторизация</button> 
                    </td>
					<td>
                        <a href="/logout" class="btn btn-success create-button">logout</a> 
                    </td>
                   
                </tr>
            </tbody>
        </table>

    </form>
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
                <a href="/createPost" class="btn btn-success create-button">Страница создания поста</a> 
                </td> 
				
            </tr>
        </thead>

    </table>
   
 

   
    
    <?php if ($posts ): ?>
 <?php foreach($posts as $post):?>
        <table class="table table-responsive users-table">

            <tbody>
                <tr>
                    <td>
                       <?= $post["name"];?>
                    </td>

                    <td>
                    <?= $post["email"];?>
                    </td>
                    <td>
                    <?= $post["description"];?>
                    </td>
                     <td> 
					 <?= $post["status"];?>
					 </td>
                </tr>
            </tbody>
        </table>

<?php endforeach; ?>
<?php endif; ?>

    
  
    <?= paginator($paginator); ?>
    
    <script>
    </script>
</body>

</html>