<?php 
$title = "Pagamentos";
session_start();
require "../class/Payments.php";
require "../help/helps.php";
require "../management/services_payments/addPayments.php";
require "../management/services_payments/shopPayments.php";
require "../layout/header.php";

$products = new Payments();
$products = $products->getKartProducts();
?>

  	<div class="bg-dark text-white retractable title-menu">
  		<img src="../assets/image/pg.png" class="float-left" width="45">
  		<h3 class="ml-5"> Pagamentos</h3>
  	</div>
  	<div class="retractable body-menu ">
	  	<div class="container-fluid border rounded-top  shadow-lg">
            <div class="row p-4">
            	<div class="col d-flex">
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
                        <button type="submit" class="btn btn-primary"><strong>Adicionar no carrinho</strong></button>
                    </form>
                </div> 
            </div>
            <div class="row bg-white pl-4 pr-4 pb-4 pt-2">
            	<div class="col">
					<?php if (!empty($shop)): ?>
						<div class="table-resposive">  
							<table class="table table-striped table-hover text-center">
								<thead class="thead-dark">
									<tr>
										<th>#</th>
										<th>Produto</th>
										<th>Qtd Disponível</th>
										<th>Qtd Compra</th>
										<th>Preço</th>
										<th>Preço Total</th>
										<th>Ações</th>							
									</tr>
								</thead>
								<tbody>
							<?php $i = 0; ?>
									<form method="POST" id="form">
						<?php foreach($shop as $key => $value): ?>
									<tr>
										<td><?= $value['id'];?></td>
										<td><?= $value['name'];?></td>
										<td><?= $value['quantity'];?></td>
										<td>
											<div class="inputquantity">
												<input type="number" readonly=“true” value="1" min="1" max="<?= $value['quantity'];?>" id="<?= $value['id'];?>" name="<?= $value['id'];?>" class="quantity text-center">
												<button type="button" class="btn btn-primary more">+</button>
												<button type="button" class="btn btn-secondary less">-</button>
											</div>
										</td>
										<td>R$ <?= format_currency_brl($value['sale_price']);?></td>
										<td>
											R$ <span class="total mask-money" data-price="<?=$value['sale_price'];?>"></span>
										</td>
										<td>
											<a href="../management/services_payments/deletePayments.php?id=<?=$value['id']?>" data-id="<?=$value['id']?>" class="delProd">
												<img src="../assets/image/lixo.png" width="25" title="Excluir" class="mr-2">
											</a>
										</td>
						</tr>
							<?php $i++; ?>
						<?php endforeach; ?>
									<tr class="text-dark" style="background-color:greenyellow;">
										<td colspan="5"><strong>Total:</strong></td>
										<td colspan="2"><strong>R$ <span class="grandTotal mask-money"></span></strong></td>
									</tr>
						<?php else: ?>
							<div class="container text-center mt-4"> 
								<h2>O seu carrinho está fazio vazio</h2>
								<h5 class="text-secondary">Adicione produtos através do seletor acima para realizar uma compra</h5>
							</div>
						<?php endif; ?>
									</form>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			<?php if (!empty($shop)): ?>
				<div class="row pl-4 pb-4 bg-white">
					<div class="col">
						<button type="submit" form="form" class="btn btn-primary checkout"><strong>Finalizar Compra</strong></button>
					</div>			
				</div>
			<?php endif; ?>
			</div>
	   	</div>
<?php require "../layout/footer.php" ?>