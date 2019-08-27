<?php
namespace App\Controllers\Admin;

use App\Controllers\Controller as MainController;

class HomeController extends MainController
{
 


    public function index(){
	
	

	
       $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $perPage = 3;
       
        $post = $this->database->getPaginatedFrom('posts',  $page, $perPage);
        $paginator = paginate(
            $this->database->getCount('posts'),
            $page,
            $perPage,
            "/admin?page=(:num)"
        );
       echo $this->view->render('admin/todo-admin',[
        'posts'   =>  $post,
        'paginator'    =>  $paginator,
        
    ]);
    }

    public function updatePost($id)
    {
		
       
       if(is_string($_POST["status"])){

        $status="done";
       }else if(is_null($_POST["status"])){
        $status="not performed";
       }
      
        $data = [
            "name" =>  $_POST["name"],
            "email" =>  $_POST['email'],
            "description" =>  $_POST['description'],
            "status" =>  $status
        ];
        $this->database->update('posts',$data,$id);


    
        return back();
    }


  


  




   

}