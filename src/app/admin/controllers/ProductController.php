<?php
namespace Multi\Back\Controllers;
use Phalcon\Http\Request;
use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Http\Response\Cookies;
use MongoDB\BSON\ObjectID;
class ProductController extends Controller
{

    public function addproductAction(){
        if(isset($_POST['submit'])){
            $postdata = $this->request->getPost();
            // print_r($postdata);
            // die;
            $title = $postdata['product_title'];
            $discription = $postdata['product_detail'];
            $price = $postdata['price'];
            $data = array(
                'title'=>$title,
                'discription'=>$discription,
                'price'=>$price
            );
            $data = $this->mongo->products->insertOne($data);
        }
    }
    public function displayAction(){
        $product = $this->mongo->products->find();
        $this->view->product = $product;
    }
    public function editproductAction(){

        $postdata = $this->request->getPost();
        $id = $postdata['id'];
       
        $product = $this->mongo->products->find();
        foreach($product as $key => $value){
            if($value->_id == $id){
                 $this->view->prod = $value;
            }
        }
    }
    public function updateAction(){

        if(isset($_POST['submit'])){
            $postdata = $this->request->getPost();
            $id = $postdata['id'];
            $data = array(
                'title'=>$postdata['title'],
                'discription'=>$postdata['discription'],
                'price'=>$postdata['price'],
            );
            $this->mongo->products->updateOne(["_id" => new ObjectID($id)], ['$set' => $data]);
            header('Location:http://localhost:8080/display');
        }
    }
    public function deleteproductAction(){
        $postdata = $this->request->getPost();
        $id = $postdata['id'];
        $product = $this->mongo->products->find();
        foreach($product as $key => $value){
            if($value->_id == $id){
                // $this->veiw->data = $value;
                $this->mongo->products->deleteOne(array("_id" => new ObjectId("$id")));
                header('Location:http://localhost:8080/display');
                
            }
        }
    }

}
