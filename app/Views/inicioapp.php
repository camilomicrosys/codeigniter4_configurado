<?php ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

		<?php echo $mensaje; ?>
	<h1>has iniciado sesion</h1>
	<a href="<?php echo base_url() . route_to('cerrarSesion') ?>">Salir</a>






<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

let mensaje='<?php echo $mensaje; ?>'

if(mensaje=='1'){
  swal(':D','Ingreso exitoso','success');
}
</script>

</body>
</html>
