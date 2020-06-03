<?php 

$title = "Estoque";

require "../class/entries.php";
require "../help/helps.php";
require "../management/services_stock/getStock.php";
require "../management/services_stock/addStock.php";
require "../layout/header.php";
?>
  	
  	<div class="bg-dark text-white retractable title-menu">
  		<img src="../assets/image/stok.png" class="float-left" width="45">
  		<h3 class="ml-5"> Estoque</h3>
  	</div>

  	<div class="retractable body-menu ">
		<div class="container-fluid bg-dark text-white mb-5 submenu-title">
		  <h5 class="p-2">Entrada de Mercadorias</h5>
		</div>
  		<div class="container-fluid ">
  			<a class="btn btn-dark btn-add" data-toggle="modal" href="#modalAdd">
  				<img src="../assets/image/mais.png" width="25" class="mr-2">
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
							                <span class="input-group-text text-white">
							                	<img src="../assets/image/box2.png" width="35">
							                </span>
							    		</div>
										<select class="form-control" name="id_prod">
											<?php
												if ($products == array()){			
													echo "<option>Nem produto encontrado</option>";		
											
												} else {
													foreach ($products as $key => $value) {
														echo "<option value='".$value['id']."'>".$value['name']."</option>";
													}
												}
											?>										
										</select>
									</div>
									<h6 class="ml-2 mt-3">Preço de compra:</h6>
		                        	<div class="input-group">
	                 	          		<div class="input-group-prepend">
							                <span class="input-group-text text-white">
							                	<img src="../assets/image/real.png" width="35">
							                </span>
							    		</div>
									    <input type="text" class="form-control form-add mask-money" autocomplete="off" name="purchase_price" placeholder="Valor de Compra">
									</div>
									<h6 class="ml-2 mt-3">Quantidade:</h6>
		                        	<div class="input-group">
	                 	          		<div class="input-group-prepend">
							                <span class="input-group-text text-white">
							                	<img src="../assets/image/amount.png" width="35">
							                </span>
							    		</div>
									    <input type="number" class="form-control form-add" autocomplete="off" name="quantity" placeholder="Quantidade" value="0" min="0">
									</div>
									<h6 class="ml-2 mt-3">Data:</h6>
		                        	<div class="input-group">
	                 	          		<div class="input-group-prepend">
							                <span class="input-group-text text-white">
							                	<img src="../assets/image/date.png" width="35">
							                </span>
							    		</div>
									    <input type="text" class="form-control form-add mask-date" autocomplete="off" name="date" value="<?php echo date('d/m/Y'); ?>">
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
  							<button type="submit" class="btn btn-dark">
  								<img src="../assets/image/search2.png" width="17">
  							</button>
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
						<?php if (!empty($appetizer)): ?>
							<?php foreach($appetizer as $value): ?>
								<tr>
									<td> <?= $value['id_prod']; ?> </td>
									<td> <?= $value['name']; ?> </td>
									<td> <?= $value['quantity']; ?> </td>
									<td> <?= format_currency_brl($value['purchase_price']); ?> </td>
									<td> <?= format_currency_date_br($value['date']); ?> </td>
									<td>
										<a href='#'>
											<img src='../assets/image/edit.png' width='25' title='Editar' class='mr-2'>
										</a>
										<a href="#" data-href="../management/services_stock/deleteStock.php?id=<?=$value['id'];?>&id_prod=<?=$value['id_prod'];?>&quantity=<?=$value['quantity'];?>" data-toggle="modal" data-target="#confirm-delete">
											<img src="../assets/image/lixo.png" width="25" title="Excluir" class="mr-2">
										</a>
									</td>
								</tr>
							<?php endforeach; ?>
							<?php else: ?>
								<tr>
									<td colspan='6'>Nenhuma Entrada Registrada</td>
								</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="modal fade mt-5" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    		<div class="modal-dialog">
        		<div class="modal-content">
 		           	<div class="modal-header bg-primary text-white">
						<h5>Excluir Entrada</h5>
            		</div>
            		<div class="modal-body">
            	    	Deseja realmente excluir a entrada selecionada?
  	    			</div>
    	        	<div class="modal-footer">
                		<button type="button" class="btn btn-outline-primary" data-dismiss="modal"><strong>Cancelar</strong></button>
                		<a class="btn btn-danger btn-ok"><strong> Excluir </strong></a>
      		      	</div>
      		  	</div>
   			</div>
		</div>
		<div class="container-fluid bg-dark text-white mt-5 submenu-title">
		  <h5 class="p-2">Saída de Mercadorias</h5>
		</div>
	</div>
<?php require "../layout/footer.php"; ?>