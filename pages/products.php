<?php 
require "../class/products.php";
require "../management/services_products/getProducts.php";
require "../management/services_products/addProducts.php";
require "../help/helps.php";
$title = "Produtos";
require "../layout/header.php";
?>

  	<div class="bg-dark text-white retractable title-menu"><img src="../assets/image/prod.png" class="float-left" width="45">
  		<h3 class="ml-5"> Produtos</h3>
  	</div>
  	<div class="retractable body-menu ">
	  	<div class="container-fluid ">
			<?php echo $addAlert;?>
			<a class="btn btn-dark btn-add" data-toggle="modal" href="#modalAdd"><img src="../assets/image/mais.png" width="25" class="mr-2">
  				<span><strong>Inserir Produto</strong></span>
  			</a>
  			<div class="modal fade mt-5" id="modalAdd" >
       			<div class="modal-dialog ">
           			<div class="modal-content p-2">
                 		<div class="modal-header">
                   			<h5 class="modal-title">Inserir Produto</h5>
                   			<button type="button" class="close" data-dismiss="modal">X</button>
               			</div>
                		<div class="modal-body">
               				<div class="form-group">
	               				<form method="POST">
	              					<h6 class="ml-2">Produto:</h6>
		    	      				<div class="input-group">
	               	          			<div class="input-group-prepend">
						                	<span class="input-group-text"><img src="../assets/image/identify.png" width="35"></span>
						    			</div>
						    		    <input type="text" class="form-control form-add" autocomplete="off" name="name" placeholder="Identificação do Produto">
		                       		</div>
		                      		<h6 class="ml-2 mt-3">Preço de venda:</h6>
		                        	<div class="input-group">
	                 	          		<div class="input-group-prepend">
							                <span class="input-group-text text-white"><img src="../assets/image/real.png" width="35"></span></span>
							    		</div>
									    <input type="text" class="form-control form-add" autocomplete="off" name="price" placeholder="Valor de Revenda">
		                    		</div>
		                    		<button class="btn btn-block btn-dark mt-4 btn-modal"><strong>Finalizar</strong></button>
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
  							<button type="submit" class="btn btn-dark"><img src="../assets/image/search2.png" width="17"></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid mt-4">
			<div class="table-resposive">  
				<table class="table table-striped table-hover text-center">
					<thead class="thead-dark">
						<tr>
							<th>#</th>
							<th>Produto</th>
							<th>Quatidade</th>
							<th>Preço de venda</th>
							<th>Ações</th>							
						</tr>
					</thead>
					<tbody>
						<?php
							if ($products == array()){			
								echo "<tr><td colspan='5'>Nenhum Produto Cadastrado</td></td>";					
							
							} else {
								foreach ($products as $key => $value) {
									echo "<tr>";
									echo "<td>".$value['id']."</td>";
									echo "<td>".$value['name']."</td>";
									echo "<td>".$value['quantity']."</td>";
									echo "<td>".format($value['sale_price'])."</td>";
									echo "<td>
											<a href='#'>
												<img src='../assets/image/edit.png' width='25' title='Editar' class='mr-2'>
											</a>
											<a href='../management/services_products/deleteProducts.php?id=".$value['id']."'>
												<img src='../assets/image/lixo.png' width='25' title='Excluir' class='mr-2'>
											</a>
										</td>";
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php require "../layout/footer.php" ?>