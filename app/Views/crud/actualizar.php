<?php
//nos retorna datos de la vista y accedemos al arreglo  0 en la posicion id persona para obtener el id es cero por que solo tenemos un dato
$idNom   = $datos[0]['id_persona'];
$nombre  = $datos[0]['nombre'];
$materno = $datos[0]['materno'];
$paterno = $datos[0]['paterno'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</head>
<body>


	<div class="container">
		<h1>actualizar</h1>
		<div class="row">
			<div class="col-sm-12">
				<?php //label for coloco el nombre mismo id del input y cuando se le da clic al nombre el cusror se para en el input ?>
                  <form action="<?php echo base_url() . route_to('actualizarCrud') ?>" method="POST">
                  	<input type="text" id="idnombre" name="idnombre" hidden="" value="<?php echo $idNom; ?>">
                  	<label for="nombre">nombre</label><br>
                  	<input type="text" name="nombre" id="nombre"  value="<?php echo $nombre; ?>" class="form-control"><br>
                  		<label for="appat">ap paterno</label><br>
                  	<input type="text" name="appat" id="appat"  value="<?php echo $materno; ?>" class="form-control"><br>
                  		<label for="apmate">ap materno</label><br>
                  	<input type="text" name="apmate" id="apmate"  value="<?php echo $paterno; ?>" class="form-control"><br>
                  	<button class="btn-primary">actualizar</button>


                  </form>

			</div>
		</div>

	</div>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>