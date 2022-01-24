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
		<h1>crud codeigniter</h1>
		<div class="row">
			<div class="col-sm-12">
				<?php //label for coloco el nombre mismo id del input y cuando se le da clic al nombre el cusror se para en el input ?>
        <form action="<?php echo base_url() . route_to('crearCrud') ?>" method="POST">
         <label for="nombre">nombre</label><br>
         <input type="text" name="nombre" id="nombre" class="form-control"><br>
         <label for="appat">ap paterno</label><br>
         <input type="text" name="appat" id="appat" class="form-control"><br>
         <label for="apmate">ap materno</label><br>
         <input type="text" name="apmate" id="apmate" class="form-control"><br>
         <button class="btn-primary">guardar</button>


       </form>

     </div>
   </div>
   <div class="row">

     <div class="col-sm-12">
      <div class="table table-responsive">

       <table class="table-bordered" class="table-hover" >
        <tr>
         <th>Nombre</th>
         <th>Apellido Ma</th>
         <th>Apellido pa</th>
         <th>Editar</th>
         <th>Eliminar</th>
       </tr>
       <?php foreach ($nombres as $nombre) {?>
        <tr>

         <td><?php echo $nombre->nombre ?>	</td>
         <td><?php echo $nombre->materno ?></td>
         <td><?php echo $nombre->paterno ?></td>
         <td><a href="<?php echo base_url() . '/obtener-datos/editar/' . $nombre->id_persona ?> " class="btn-warning btn-sm">Editar</a></td>
         <td><a href="<?php echo base_url() . '/eliminar-crud/' . $nombre->id_persona ?>" class="btn-danger btn-sm">Eliminar</a></td>


       </tr>
     <?php }?>
   </table>
 </div>

</div>
</div>

</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

 let mensaje='<?php echo $mensaje; ?>';

 if(mensaje=='1'){

  swal(':D','agregado exitoso','success');

}else if(mensaje=='0'){

 swal(':(','no agregado','error');
}else if(mensaje=='2'){
  swal(':)','actualizado correcto','success');
}else if(mensaje=='3'){
  swal(':(','no actualizado','error');
}else if(mensaje=='4'){
 swal(':)','Eliminado','success');
}else if(mensaje=='5'){
 swal(':(','error','error');
}
</script>
</body>
</html>
