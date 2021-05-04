<?php
      Class Product {
            private int $id;
            private string $name;
            private string $category;
            private int $price;

            public function __construct(int $price, string $category, string $name) {
                  $this->price = $price;
                  $this->category = $category;
                  $this->name = $name;
            }

            public function getId() {
                  return $this->id;
            }

            public function setId(int $id) {
                  $this->id = $id;
            }

            public function getName() {
                  return $this->name;
            }

            public function setName(string $name) {
                  $this->name = $name;
            }

            public function getCategory() {
                  return $this->category;
            }

            public function setCategory(string $category) {
                  $this->category = $category;
            }

            public function getPrice() {
                  return $this->price;
            }
            
            public function setPrice(int $price) {
                  $this->price = $price;
            } 
      }
