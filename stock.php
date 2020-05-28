<?php 
require "class.php";
require "get.stock.php";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shribk-to-fit=no">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <title>Stok | Estoque</title>
</head>
<body>
	<div id="mySidebar" class="sidebar bg-dark">
  		<a href="index.php" class="logo"><h1 class="ml-3">Stock</h1></a>
  		<a href="index.php" class="item-menu"><img src="image/home.png" width="33"> Home</a>
  		<a href="products.php" class="item-menu"><img src="image/prod.png" width="35"> Produtos</a>
  		<a href="stock.php" class="item-menu"><img src="image/stok.png" width="35"> Estoque</a>
  		<a href="#" class="item-menu"><img src="image/pg.png" width="35"> Pagamentos</a>
  		<a href="https://google.com" class="item-menu"><img src="image/out.png" width="35"> Sair</a>
	</div>
	
	<div id="main" class="bg-dark menu retractable">
  		<button class="openbtn btn-dark" onclick="">&#9776;</button>
  	</div>
  	
  	<div class="bg-dark text-white retractable title-menu"><img src="image/stok.png" class="float-left" width="45">
  		<h3 class="ml-5"> Estoque</h3>
  	</div>

  	<div class="retractable body-menu ">
		<div class="container-fluid bg-dark text-white mb-5 submenu-title">
		  <h5 class="p-2">Entrada de Mercadorias</h5>
		</div>

  		<div class="container-fluid ">
 			
  			<a class="btn btn-dark btn-add" data-toggle="modal" href="#modalAdd"><img src="image/mais.png" width="25" class="mr-2">
  				<span><strong>Nova Entrada</strong></span>
  			</a>
  			<div class="modal fade mt-5" id="modalAdd" >
       			<div class="modal-dialog ">
           			<div class="modal-content p-2">
                 		<div class="modal-header">
                   			<h5 class="modal-title">Cadastro de Entrada</h5>
                   			<button type="button" class="close" data-dismiss="modal">X</button>
               			</div>
                		<div class="modal-body">
               				<div class="form-group">
	               				<form method="POST">
									<h6 class="ml-2">Produto:</h6>  
									<div class="input-group">
	                 	          		<div class="input-group-prepend">
							                <span class="input-group-text text-white"><img src="image/box2.png" width="35"></span></span>
							    		</div>
										<select class="form-control" name="product">
											<?php
												if ($products == array()){			
													echo "<option>Nem produto encontrado</option>";		
											
												} else {
													foreach ($products as $key => $value) {
														echo "<option>".$value['name']."</option>";
													}
												}
											?>										
										</select>
									</div>
									<h6 class="ml-2 mt-3">Preço de compra:</h6>
		                        	<div class="input-group">
	                 	          		<div class="input-group-prepend">
							                <span class="input-group-text text-white"><img src="image/real.png" width="35"></span></span>
							    		</div>
									    <input type="text" class="form-control form-add" autocomplete="off" name="saleprice" placeholder="Valor de Compra">
									</div>
									<h6 class="ml-2 mt-3">Quantidade:</h6>
		                        	<div class="input-group">
	                 	          		<div class="input-group-prepend">
							                <span class="input-group-text text-white"><img src="image/amount.png" width="35"></span></span>
							    		</div>
									    <input type="number" class="form-control form-add" autocomplete="off" name="amount" placeholder="Valor de Revenda" value="0">
									</div>
									<h6 class="ml-2 mt-3">Data:</h6>
		                        	<div class="input-group">
	                 	          		<div class="input-group-prepend">
							                <span class="input-group-text text-white"><img src="image/date.png" width="35"></span></span>
							    		</div>
									    <input type="text" class="form-control form-add" autocomplete="off" name="date" value="<?php echo date('d/m/Y'); ?>">
		                    		</div>
		                    		<button class="btn btn-block btn-dark mt-4 btn-modal"><strong>Cadastrar</strong></button>
	                   			</form>
               				</div>
               			</div>
            		</div>
        		</div>
			</div>
  		</div>
  		<div class="container-fluid mt-4">
  			<div class="row">
  				<div class="col-lg d-flex align-items-center">
  					<span>Mostrar</span>
  					<input type="number" name="show-products" min="1" max="15" value="5" class="ml-2 mr-2 text-center form-control form-number">
  					<span>Registros</span>
  				</div>
  				<div class="col-lg">
					<div class="container-fluid d-flex justify-content-end p-0" style="min-width: 330px" >
						<form method="GET" class="form-inline">
							<span>Pesquisar:</span>
							<input type="text" name="search" class="form-control ml-2 mr-2">
  							<button type="submit" class="btn btn-dark"><img src="image/search2.png" width="17"></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid mt-4 mb-4">
			
			<div class="table-resposive">  
				<table class="table table-striped table-hover text-center">
					<thead class="thead-dark">
						<tr>
							<th>#</th>
							<th>Produto</th>
							<th>Quatidade</th>
							<th>Preço de compra</th>
							<th>Data</th>
							<th>Ações</th>							
						</tr>
					</thead>
					<tbody>
						<?php
//							if ($products == array()){			
								echo "<tr><td colspan='6'>Nenhuma Entrada Registrada</td></td>";					
							
/*							} else {
								foreach ($products as $key => $value) {
								echo "<tr>";
								echo "<td>".$value['id']."</td>";
								echo "<td>".$value['name']."</td>";
								echo "<td>".$value['amount']."</td>";
								echo "<td>".$value['sale_price']."</td>";
								echo "<td><a href='#'><img src='image/edit.png' width='25' title='Editar' class='mr-2'></a>
								<a href='delete.php?id=".$value['id']."'><img src='image/lixo.png' width='25' title='Excluir' class='mr-2'></a></td>";
								}
							}
*/
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="container-fluid bg-dark text-white mt-5 submenu-title">
		  <h5 class="p-2">Saída de Mercadorias</h5>
		</div>
	</div>
    <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/js/sidebar.js"></script>
</body>
</html>
