<?php $this->layout('layout') ?>
<form  method="POST" action="/posts" >
        <table class="table table-responsive users-table">

            <tbody>
                <tr>
                    <td>
                      
                        <input class="form-control" name="name" type="text" placeholder="admin" data-validate="required" required>
                    </td>
                  
                    <td>
                        <input class="form-control" name="email" type="email"  data-validate="required"  placeholder="example@example.ru" required>
                    </td>
                    <td>

                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" placeholder="description" data-validate="required" required rows="3"></textarea>
                    </td>

                    <td>

                        <button type="submit" name="createProduct" class="btn btn-success create-button">Создать</button>
                    </td>
					<td>
                <a href="/" class="btn btn-success create-button">Страница пользователя</a> 
                </td> 
                    
                </tr>
            </tbody>
        </table>

    </form>