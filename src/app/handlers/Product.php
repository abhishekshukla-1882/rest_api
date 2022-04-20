<?php
namespace Api\Handlers;
use Phalcon\Di\Injectable;
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
            $response = $this->response->SetJsonContent($product);
            return $response;
        }
        else {
            $products = $this->mongo->products->find(['title' => array('$regex' => $name)]);
            print_r($products);
            die;
        }
    }
    public function get(){

        $product = $this->mongo->products->find();
        // echo "jhjhjh";
        foreach($product as $key => $value){
            // echo "<pre>";
            // print_r($value);
            $response = $this->response->SetJsonContent($value);
            return $response;
        }
        die;

    }
    public function responses($no_of_res){
        $product = $this->mongo->products->find([],['limit'=>$no_of_res]);
        echo "<pre>";
        print_r($product);
        die;

        foreach($product as $key => $value){
            echo "<pre>";
            print_r($value);
        }
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