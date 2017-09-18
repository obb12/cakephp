<?php
   namespace App\Controller;

   use App\Controller\AppController;
   use Cake\ORM\TableRegistry;

   class ProductsController extends AppController
   {
       public function index()
           {
               $products = TableRegistry::get('Products');

           }

           public function showcart()
           {

               $shoppingcart = [];
               $total = 0;
               if (!empty($this->request->session()->read('cart'))) {
                   foreach ($this->request->session()->read('cart') as $key => $value) {
                       $query = TableRegistry::get('Products')->find();
                       $result = $query
   ->where(['id' => $value['id']])
   ->first();
   $total += $result->price;
                       $shoppingcart[] = ['id' => $value['id'],'name' => $result->name,'price' => $result->price];
                   }
               }
               $this->set('total', $total);

               $this->set('cart', $shoppingcart);


           }
           public function add()
           {
               # code...
           }
           public function store()
           {

               $products = TableRegistry::get('Products');
               $product =  $products->newEntity();
               $query = $this->request->data;
               $product->name = $query['name'];
               $product->description = $query['description'];
               $product->price = $query['price'];
               $product->created = date("Y-m-d H:i:s");
               $product->modified = date("Y-m-d H:i:s");
               $data = 'voit sulkea tämän sivun tiedot on tallenettu';
               if ($products->save($product)) {
                   # code...


               }
               $this->set('data', $data);


           }
           public function show()
           {
               $query = TableRegistry::get('Products')->find();
               $result = $query
->where(['id' => $this->request->getQuery('id', '')])
->first();
$this->set('result',  $result);

           }
           public function cart()
           {

                       $this->autoRender = false;
                       if ($this->request->session()->check('cart')) {
                           $array = $this->request->session()->read('cart');
                           $array[] = ['id' => $this->request->getData('id')];
                          $this->request->session()->write('cart',$array);
                        }else {
                            $array = [];
                            $array[] = ['id' => $this->request->getData('id')];

                           $this->request->session()->write('cart',$array);

                       }


                      $response = $this->response->withType('application/json')

                           ->withStringBody($this->request->getData('id'));
                       return $response;

                       exit();


           }
           public function search()
               {
                   $products = TableRegistry::get('Products');
                   $query = $products
    ->find()
    ->select(['id', 'name','price'])
    ->where(['name LIKE' => '%'.$this->request->getQuery('search', '') .'%'])

->orWhere(['id' => $this->request->getQuery('search', '')])
    ->order([$this->request->getQuery('orderby', 'id') => $this->request->getQuery('order', 'DESC')]) ;
    $results = $query->all();
    $this->set('query', $results);

               }
   }
