<?php 
$title = "Produtos";
session_start();
require "../class/products.php";
require "../management/services_products/getProducts.php";
require "../management/services_products/addProducts.php";
require "../help/helps.php";

require "../layout/header.php";
?>

  	<div class="bg-dark text-white retractable title-menu"><img src="../assets/image/pg.png" class="float-left" width="45">
  		<h3 class="ml-5"> Pagamentos</h3>
  	</div>
  	<div class="retractable body-menu ">
	  	<div class="container-fluid d-flex border  rounded-top p-3 shadow-lg">
            <img src="../assets/image/shop.png" width="40">
            <h4 class="mt-2 ml-2"> Carrinho</h4>
        </div>
        <div class="container-fluid d-flex bg-white border  border-top-0  p-3 shadow-lg">
            <div class="row">
                <div class="col">
                    <form method="POST" class="form-inline">
		    	    	<span>Produto:</span>
                            <select class="form-control ml-2 mr-2" name="id_prod" width="100" id="addShop">
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
        </div> 
    </div>

<?php require "../layout/footer.php" ?>