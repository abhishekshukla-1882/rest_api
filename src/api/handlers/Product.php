<?php
namespace Api\Handlers;
use Phalcon\Di\Injectable;
use Phalcon\Url;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
class Product extends Injectable{
    // function get($select = "", $limit= 10,$page =1){
    //     $products = array(
    //         array("select"=>$select,"where"=>$where,"limit"=>$limit,"page"=>$page),
    //         array("name"=>"Product 2", "price"=>40),
    //     );
    //     return json_encode($products);

    // }
    public function search($name=''){
        // print_r($name);
        // echo "<br>";
        if(strpos($name,'%20')==true){
            $n = explode('%20',$name);
            foreach ($n as $str) {
                $strarr[] = array('$or' => array(array("title" => array('$regex' => $str)), array("variations[0].name" => array('$regex' => $str))));
            }
           
            // print_r($strarr);
            // die;
            $product = $this->mongo->products->find(['$or'=>$strarr]);
         
            // print_r($product);
            // die;
            $prod = array();
            foreach($product as $key=>$value){
                $prod[] = (array)$value;
            }
            
            $response = $this->response->SetJsonContent($prod);
            return $response;
           
        }
        else {
            $products = $this->mongo->products->find(['title' => array('$regex' => $name)]);
            // print_r($products);
            // die;
            $prod = array();
            foreach($products as $key=>$value){
                $prod[] = (array)$value;
            }
            
            $response = $this->response->SetJsonContent($prod);
            return $response;
        }
    }
    public function get(){

        $product = $this->mongo->products->find();
        // echo "jhjhjh";
        $arr = array();
        // print_r($product);
        // die;
        foreach($product as $key => $value){
            $arr[] = (array)$value;
            // print_r($arr);
            
        }
        $response = $this->response->SetJsonContent($arr);
        return $response;
        die;

    }
    public function responses($no_of_res){
        $no = (int)$no_of_res;
        $product = $this->mongo->products->find([],['limit'=>$no]);
        $arr = array();
        foreach($product as $key => $value){
            $arr[] = (array)$value;
        }
        $response = $this->response->SetJsonContent($arr);
        return $response;
    }

    
    public function pages($no){
        $no = (int)$no;
        $product = $this->mongo->products->find([],['limit'=>(1*$no)]);
        $arr = array();
        foreach($product as $key=>$value){
            $arr[] = (array)$value;
        }
        $response = $this->response->SetJsonContent($arr);
        print_r($this->get('url'));
        // return $response;


    } 
    public function login(){
        $key = "example_key";
        $payload = array(
            "iss" => "http://example.org",
            "aud" => "http://example.com",
            "iat" => 1356999524,
            "nbf" => 1357000000,
            "role" => "admin"
        );
        $jwt = JWT::encode($payload, $key, 'HS256');
        echo $jwt;
        die;
    }
    
}




// if (strpos($keyword, "%20") == true) {
//     $newstr = explode("%20", $keyword);
//     foreach ($newstr as $str) {
//         $strarr[] = array('$or' => array(array("name" => array('$regex' => $str)), array("variations[0].name" => array('$regex' => $str))));
//     }
//     $products = $this->mongo->products->find(['$or' => $strarr]);
// } else {
//     $products = $this->mongo->products->find(['name' => array('$regex' => $keyword)]);
// }