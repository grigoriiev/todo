<?php
namespace App\Controllers;

use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;

class HomeController extends Controller
{
    public   function login(){
 
 $data = [
    "login" =>  $_POST["login"],
    "password" =>  $_POST['password']
];
       $admin=$this->database->findAdmin('admin', $data);
       if($admin){
           $_SESSION["user"]=$admin;
        return redirect("/admin");

       }else{
       
        return back();
       }


     }

public function logout (){
	
	unset($_SESSION["user"]);
	
	return back();
}



    public function index()
    {
       $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $perPage = 3;
        
        $post = $this->database->getPaginatedFrom('posts',  $page, $perPage);
        $paginator = paginate(
            $this->database->getCount('posts'),
            $page,
            $perPage,
            "/?page=(:num)"
        );
       echo $this->view->render('todo-user',[
        'posts'   =>  $post,
        'paginator'    =>  $paginator,
        
    ]);
    }
	public function create()
    {
       
       echo $this->view->render('create');
	   
    }
	
	
	
	
	    public function store()
    {
		
     

        $data = [
            "name" =>  $_POST["name"],
            "email" =>  $_POST['email'],
            "description" =>  $_POST['description'],
            "status" =>  "not performed"
        ];
        $this->database->create('posts', $data);
    
        return back();
    }
   

    

}
   


   

