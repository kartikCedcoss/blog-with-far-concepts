<?php
use Phalcon\Mvc\Controller;




class UserController extends Controller
{

    public function indexAction()
    {
        if($this->session->has('username')){
        $userid = $this->session->get('userid');
        $this->view->blogs = Blogs::find("userid = $userid"); 
        }
        else{
            $this->response->redirect('../login');
        }
    }
   public function editblogAction(){
       $editid = $_POST['btnedit'];
       $this->view->blogs = Blogs::find("blogid = $editid");
       //return $editid; 
   }
   public function updateblogAction(){
       $updateid = $_POST['updateid'];
       $title = $_POST['title'];
       $desc = $_POST['details'];
       $blogs = Blogs::findFirstByblogid($updateid);
       $blogs->title = $title;
       $blogs->details = $desc;
       $success = $blogs->save();
       if($success){
        $this->response->redirect('../user');
       }
   }

}
