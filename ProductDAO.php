<?php
require_once('Product.php');

class ProductDAO {

      static public $db;
      
      function __construct() {
            $this->configureDataBase('product', "password", "leonardo");

      }

      function configureDataBase($dataBase, $pass, $user) {
            self::$db = new PDO('mysql:host=localhost;dbname=' . $dataBase, $user, $pass );
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }


      function save($product) {
            if (isset($product)) {
                  $query = self::$db->prepare('INSERT INTO product (name, price, category) VALUES (?, ?, ?)');
                  $query->execute([$product->getName(), $product->getPrice(), $product->getCategory()]);
            }

      }

      function update($product) {
            if (isset($product)) {
                  $query = self::$db->prepare('UPDATE product SET name=?, price=?, category=? WHERE id=?');
                  $query->execute([$product->getName(), $product->getPrice(), $product->getCategory(), $product->getId()]);
            }
      }

      function findById($productId) {
            if (isset($productId)) {
                  $query = self::$db->prepare('SELECT * FROM product WHERE id=?');
                  return $query->execute([$productId]);
            }
      }

      function findAll() {
            $results = self::$db->query('SELECT * FROM product');
            $allProducts = [];
            foreach($results as $result) {
                  $product = new Product((int) $result['price'], (string) $result['category'], (string) $result['name']);
                  $product->setId((int) $result['id']);
                  $allProducts[] = $product;
            }
            return $allProducts;
      }

      function delete($id) {
            $query = self::$db->prepare('DELETE FROM product WHERE id=?');
            $query->execute([$id]);
      }

}