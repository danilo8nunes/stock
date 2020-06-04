<?php 
$title = "Pagamentos";
session_start();
require "../class/products.php";
require "../class/Payments.php";
require "../help/helps.php";
require "../management/services_products/getProducts.php";
require "../management/services_payments/addPayments.php";
require "../layout/header.php";
?>

  	<div class="bg-dark text-white retractable title-menu">
  		<img src="../assets/image/pg.png" class="float-left" width="45">
  		<h3 class="ml-5"> Pagamentos</h3>
  	</div>
  	<div class="retractable body-menu ">
	  	<div class="container-fluid border rounded-top  shadow-lg">
            <div class="row">
            	<div class="col d-flex p-4">
            		<img src="../assets/image/shop.png" width="40">
            		<h4 class="mt-2 ml-2"> Carrinho</h4>
            	</div>
        	</div>
            <div class="row bg-white p-4">
                <div class="col">
                    <form method="GET" class="form-inline">
		    	    	<span>Produto:</span>
                            <select class="form-control ml-2 mr-2" name="id_prod" id="addShop">
                                <?php if (!empty($products)): ?>
                                    
                                    <?php foreach($products as $key => $value): ?>
								        <option value="<?=$value['id'];?>"><?=$value['name'];?></option>
									<?php endforeach; ?>
                        
                                <?php else: ?>
							        <option>Nenhum Produto Cadastrado</option>
							
						        <?php endif; ?>
                            </select>
                        <button type="submit" class="btn btn-success"><strong>Adicionar no carrinho</strong></button>
                    </form>
                </div> 
            </div>
            <div class="row bg-white p-4 pt-2">
            	<div class="col">
					<?php if (!empty($shop)): ?>
						<div class="table-resposive">  
							<table class="table table-striped table-hover text-center">
								<thead class="thead-dark">
									<tr>
										<th>#</th>
										<th>Produto</th>
										<th>Qtd Disponível</th>
										<th>Qtd</th>
										<th>Preço</th>
										<th>Preço Total</th>
										<th>Ações</th>							
									</tr>
								</thead>
						<?php foreach($shop as $key => $value): ?>
								<tbody>
									<tr>
										<td><?= $value['id'];?></td>
										<td><?= $value['name'];?></td>
										<td><?= $value['quantity'];?></td>
										<td><input type="number" value="1" min="0" max="<?= $value['quantity'];?>"></td>
										<td>R$ <?= format_currency_brl($value['sale_price']);?></td>
										<td>R$ <?= format_currency_brl($value['sale_price']);?></td>
										<td>
										<a href="#" data-href="#?id=<?=$value['id']?>" data-toggle="modal" data-target="#confirm-delete">
											<img src="../assets/image/lixo.png" width="25" title="Excluir" class="mr-2">
										</a>
									</td>
							<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan='5'>Nenhum Produto Cadastrado</td>
							</td>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
            	</div>
            </div> 
    	</div>
    </div>
<?php require "../layout/footer.php" ?>