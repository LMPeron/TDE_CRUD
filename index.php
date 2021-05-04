<!doctype html>
<html lang="pt-br">

<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <title>Produtos</title>
</head>

<body>

      <?php
      require_once('ProductDAO.php');
      require_once('ProductController.php');
      require_once('Product.php');

      $productDAO = new ProductDAO();
      $productList[] = $productDAO->findAll();

      $startForm = true;
      ?>

      <div class="col">
            <div class="row justify-content-center">
                  <div class="col-12">
                        <div class="row justify-content-center">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saveForm"> Cadastrar Produto</button>
                        </div>
                  </div>

                  <div class="col-8">
                        <div calss="row">
                              <table class="table">
                                    <thead>
                                          <tr>
                                                <th scope="id">#</th>
                                                <th scope="name">Nome</th>
                                                <th scope="category">Categoria</th>
                                                <th scope="price">Preço</th>
                                                <th></th>
                                                <th></th>

                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php

                                          foreach ($productList as $product) {
                                                foreach ($product as $value) {
                                          ?>
                                                      <tr>
                                                            <th scope="id"> <?php echo $value->getId(); ?> </th>
                                                            <th scope="name"> <?php echo $value->getName(); ?> </th>
                                                            <th scope="category"><?php echo $value->getCategory(); ?></th>
                                                            <th scope="price"><?php echo $value->getPrice(); ?></th>
                                                            <th id="deleteButton"> <a href="index.php?deletar=<?php echo $value->getId(); ?>" class="btn btn-info">Deletar</a> </th>
                                                            <th id="editButton"> <button id="editButton" data-toggle="modal" data-target="#editForm" data-id="<?php echo $value->getId(); ?>" data-name="<?php echo $value->getName(); ?>" data-price="<?php echo $value->getPrice(); ?>" data-category="<?php echo $value->getCategory(); ?>" class="btn btn-info">Editar</button> </th>
                                                      </tr>
                                          <?php
                                                }
                                          } ?>
                                    </tbody>
                              </table>

                        </div>

                  </div>


                  <div class="modal fade" id="saveForm" role="dialog">
                        <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                    <div class="modal-header">
                                          <h4 class="modal-title">Cadastrar Produto</h4>
                                    </div>
                                    <div class="modal-body">
                                          <div class="row justify-content-center">
                                                <form method="POST" action="ProductController.php">
                                                      <div class="form-group">
                                                            <label>Produto</label>
                                                            <input type="text" name="name" class="form-control" placeholder="Nome do Produto">
                                                      </div>

                                                      <div class="form-group">
                                                            <label>Categoria</label>
                                                            <input type="text" name="category" class="form-control" placeholder="Categoria do Produto">
                                                      </div>

                                                      <div class="form-group">
                                                            <label>Valor</label>
                                                            <input type="number" name="price" class="form-control" placeholder="Valor do produto">
                                                      </div>

                                                      <div class="form-group">
                                                            <button type="submit" class="btn btn-success" name="novo">Salvar</button>
                                                      </div>
                                                </form>
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    </div>
                              </div>
                        </div>
                  </div>

                  <div class="modal fade" id="editForm" role="dialog">
                        <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                    <div class="modal-header">
                                          <h4 class="modal-title">Editar Produto</h4>
                                    </div>
                                    <div class="modal-body">
                                          <div class="row justify-content-center">
                                                <form method="POST" action="ProductController.php">
                                                      <input type="hidden" id="id" name="id">

                                                      <div class="form-group">
                                                            <label>Produto</label>
                                                            <input type="text" id="name" name="name" class="form-control" placeholder="Nome do Produto">
                                                      </div>

                                                      <div class="form-group">
                                                            <label>Categoria</label>
                                                            <input type="text" id="category" name="category" class="form-control" placeholder="Categoria do Produto">
                                                      </div>

                                                      <div class="form-group">
                                                            <label>Valor</label>
                                                            <input type="number" id="price" name="price" class="form-control" placeholder="Valor do produto">
                                                      </div>

                                                      <div class="form-group">
                                                            <button type="submit" class="btn btn-success" name="editar">Salvar</button>
                                                      </div>
                                                </form>
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    </div>
                              </div>
                        </div>
                  </div>

            </div>



            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script>
                  $('#editForm').on('show.bs.modal', function(event) {
                        var button = $(event.relatedTarget) // Button that triggered the modal
                        console.log(button)
                        var id = button.data('id'); // Extract info from data-* attributes
                        var name = button.data('name')
                        var price = button.data('price')
                        var category = button.data('category')

                        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                        var modal = $(this)
                        modal.find('.modal-title').text('Editar Produto ' + id)
                        modal.find('.modal-body #id').val(id)
                        modal.find('.modal-body #name').val(name)
                        modal.find('.modal-body #price').val(price)
                        modal.find('.modal-body #category').val(category)
                  })
            </script>
</body>

</html>