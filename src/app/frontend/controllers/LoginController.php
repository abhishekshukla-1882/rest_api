<?php
namespace Multi\Frontend\Controllers;
use Phalcon\Http\Request;
use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Http\Response\Cookies;

class LoginController extends Controller
{

    public function logoAction(){

        
    }
    public function logoutAction(){

        echo "logout";
    }
    public function addproductAction(){
        
    }
    // public function indexAction()
    // {
    //     // echo '<pre>';
    //     // print_r($this->request->getPost());
    //     // die;
    //     if ($this->request->getPost("addproduct")) {
    //         $key = $this->request->getPost('label');
    //         $value = $this->request->getPost('value');
            
    //         $add_fields = array_combine($key, $value);
    //         // print_r($add_fields);
    //         // die;

    //         $key1 = $this->request->getPost('label1');
    //         $price1 = $this->request->getPost('price1');
    //         $value1 = $this->request->getPost('value1');
    //         $add_variants = array_combine($key1, $value1);
    //         $add_variants['price']=$price1;
    //         // echo $price1;
    //         // print_r($add_variants['price']);
    //         // die;
    //         // $add_variants = $this->request->getPost('');
    //         // print_r($add_fields);
    //         // die;
    //         $data = array(
    //             'name' => $_POST['name'],
    //             'category' => $_POST['category'],
    //             'price' => $_POST['price'],
    //             'stock' => $_POST['stock'],
    //             'added_fields' => $add_fields,
    //             'added_variants' => $add_variants
    //         );
    //         // $data = $this->request->getPost();
    //         // $this->mongo->insertOne($data);
    //         $this->mongo->products->insertOne($data);
    //         // print_r($name);
    //         // die;
    //     }
        
    //     // if ($this->cookies->has('checkbox')) {
    //     //     $this->response->redirect('dashboard');
    //     // } else {
    //     //     if ($this->request->isPost()) {

    //     //         $email = $this->request->getPost('email');
    //     //         $password = $this->request->getPost('password');
    //     //         // print_r($email);
    //     //         // die();

    //     //         if (empty($email) || empty($password)) {
    //     //             $response = new Response();

    //     //             $response->setStatusCode(404, 'Fill the details');
    //     //             //$response->setContent("Sorry, the page doesn't exist");
    //     //             $response->send();
    //     //             //echo 'fill all the details';
    //     //             $this->session->set('login', '*****Fill all the details*****');
    //     //             //die();
    //     //         } else {
    //     //             $user = Users::findFirst(array(
    //     //                 'conditions' => 'email = :email: and password = :password:', 'bind' => array(
    //     //                     'email' => $this->request->getPost("email"),
    //     //                     'password' => $this->request->getPost("password")
    //     //                 )
    //     //             ));
    //     //             print_r($user);
    //     //             //die();
    //     //             if (!isset($user)) {
    //     //                 $response = new Response();

    //     //                 $response->setStatusCode(404, 'Wrong credentials');
    //     //                 //$response->setContent("Sorry, the page doesn't exist");
    //     //                 $response->send();
    //     //                 $this->session->set('login', 'Wrong user');
    //     //                 //die();
    //     //             } else {
    //     //                 if (isset($_POST['checkbox'])) {
    //     //                     $this->cookies->set(
    //     //                         'checkbox',
    //     //                         json_encode(
    //     //                             [
    //     //                                 'email' => $_POST['email'],
    //     //                                 'password' => $_POST['password']
    //     //                             ],
    //     //                             time() + 3600
    //     //                         )
    //     //                     );
    //     //                 }
    //     //                 $response = new Response();
    //     //                 $cookies  = new Cookies();

    //     //                 $response->setCookies($cookies);
    //     //                 $this->session->set('login', $email);
    //     //                 //$this->session->set('login', $password);
    //     //                 $this->response->redirect('dashboard');
    //     //                 //header("location:/dashboard");
    //     //             }
    //     //         }
    //     //     }
    //     // }
    // }
    // public function productAction(){
    //     // if(is)
    //     $data = $this->mongo->products->find();
        
    //     $this->view->product = $data;
    // }
    // public function searchAction(){
    //     // $data = $this->mongo->products->find();
        
    //     // $this->view->product = $data;
    //     $postdata = $_POST ?? array();
    //     // print_r($postdata);
    //     $val = $postdata['search'];
    //     $data = $this->mongo->products->find();
    //     $prod = array();
    //     foreach($data as $key => $value){
    //         if($value->name == $val){
    //             // echo $value->name;
    //             // die;
    //             // $this->view
    //             array_push($prod,$value);
    //         }
    //     }
    //     // echo "<pre>";
    //     // print_r($data);

    //     // die;
    //     $this->view->prod = $prod;
    // }
    // public function editAction(){
    //     if(isset($_POST['submit'])){

    //         $postdata = $_POST ?? array();
            
    //         $data = $this->mongo->products->find();
    //         $id= $postdata['id'];
    //         $name = $postdata['name'];
    //         $category = $postdata['category'];
    //         $price = $postdata['price'];
    //         $stock = $postdata['stock'];
    //         $brand = $postdata['brand'];
    //         $brand_val = $postdata['brand_val'];
    //         $scnd_val_0 = $postdata['scnd_val'][0];
    //         $scnd_val_1 = $postdata['scnd_val'][1];
    //         $scnd_val_2 = $postdata['scnd_val'][0];
    //         $scnd_val_3 = $postdata['scnd_val'][1];
    //         $up_prod = array(
    //             'name'=>$name,
    //             'category'=>$category,
    //             'price'=>$price,
    //             'stock'=>$stock,
    //             "$brand"=>$brand_val,
    //             "$scnd_val_0"=>$scnd_val_1,
    //             "$scnd_val_2"=>$scnd_val_3

    //         );
    //         // foreach($data as $key=>$value){
    //             // if($value->_id == $id){
    //             //     echo "<pre>";
    //             //     print_r($postdata);
    //                 echo "<pre>";
    //                 print_r($up_prod);
    //                 // $res=$this->mongo->products->updateOne(['_id'=>new Mongo\BSON\ObjectID($id)],['$set'=>$up_prod]);
    //                 $this->mongo->products->updateOne(["_id" => new MongoDB\BSON\ObjectID($id)], ['$set' => $up_prod]);
    //                 if($res){
    //                     echo "Product Saved";
    //                     $this->response->redirect($_SERVER."HTTP_REFERER");
    //                 }
    //         //     }
    //         // }
    //         // print_r($data);
    //         die;
    //     }
    //     $postdata =$this->request->getPost();
    //     $id = $postdata['id_container'];
    //     // echo "<pre>";
    //     // print_r($postdata);
    //     // die;
    //     // print_r($id);
    //     // die;
    //     $data = $this->mongo->products->find();
    //     foreach($data as $key=>$value){
    //         if($value->_id == $id){
    //             // echo $value->_id;
    //             // $val = json_decode($value);
    //             // print_r($val);

    //             // die('edit');
    //             $this->view->data = $value;
    //         }
           
    //     }

    // }
    // public function deleteAction(){
    //     $postdata = $this->request->getPost();
    //     print_r($postdata);
    //     // die;
    //     $id = $postdata['id_container'];
    //     $this->mongo->products->deleteOne(array("_id" => new MongoDB\BSON\ObjectId("$id")));
    //     header('Location:http://localhost:8080/login/product');

    // }
    // public function createorderAction(){
    //     if(isset($_POST['submit'])){
    //         $postdata = $this->request->getPost();
    //         // print_r($postdata);
    //         // die;
    //         $name = $postdata['name'];
    //         $quantity = $postdata['quantity'];
    //         $variation = $postdata['variation'];
    //         $date = $postdata['date'];
    //         $product_id = $postdata['product_name'];
    //         // die($variation);
    //         // $name = $postdata['name'];
    //         $order = array(
    //             "name"=>$name,
    //             "quantity"=>$quantity,
    //             "variation"=>$variation,
    //             "date"=>$date,
    //             "product_id"=>$product_id,
    //             'status'=>"pending"
    //         );
    //         $createorder = $this->mongo->order->insertOne($order);
    //         header("Location:http://localhost:8080/login/createorder");
            
    //         // print_r($createorder);
    //         // die;

    //     }
    //     $data = $this->mongo->products->find()->toarray();
    //     $arr = array();
    //     $variants = array();
    //     foreach($data as $value){
    //         array_push($arr, $value);
    //         array_push($variants, $value->added_variants);
    //     }
    //     // echo "<pre>";
    //     // print_r($arr);
    //     // die;
    //     $this->view->data = $arr;
    //     $this->view->variants = $variants;

    // }
    // public function orderlistAction(){
    //     $total = $this->mongo->order->find();
    //     $this->view->order = $total;
    //     // echo "<pre>";
    //     // print_r($total);
    //     // die;
    // }
    // public function getvariationAction(){
    //     $id = $this->request->getPost();
    //     // print_r( $id['id']);
    //     // die;
    //     $data = $this->mongo->products->find();
    //     foreach($data as $value){
    //         // print_r( $value->_id);
    //         // die;
    //         if($value->_id == $id['id']){
    //             // return $value;
    //             //  print_r($value);
    //             echo json_encode(array($value));
    //             die;

    //         }
    //     }
    // }
    // public function updateProductstatusAction(){
    //     $data = $this->request->getPost();
    //     $val = $data['val'];
    //     $id = $data['id'];
    //     // print_r($data);
    //     // echo $data['id'];
    //     // die;
    //     $this->mongo->order->updateOne(
    //         ['_id'=> new MongoDB\BSON\ObjectID($id)], ['$set' => ["status"=>"$val"]],
    //     );
    //     echo "value ";
    //     die;
    //     // $data = $this->mongo->products->find();
    //     // foreach($data as $value){
    //     //     // print_r( $value->_id);
    //     //     // die;
    //     //     if($value->_id == $id['id']){
    //     //         $this->mongo->products->updateOne(

    //     //         )
    //     //         // print_r($value);
    //     //         // die;
    //     //         // return $value;
    //     //         //  print_r($value);
    //     //         // echo json_encode(array($value));
    //     //         // die;

    //     //     }
    //     }
    //     public function first_date_monthAction(){
    //         $startdate = date("m/d/Y", strtotime('first day of this month'));
    //         $orders = $this->mongo->orders->find(["date" => ['$gte' => $startdate, '$lte' => date("m/d/Y")]])->toArray();

    //         $data = $this->mongo->order->find();
    //     }
    
    
    
}
