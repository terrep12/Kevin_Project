<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center py-2" href="index.php">
		<div class="sidebar-brand-icon">
			<img src="img/logo.jpg" class="img-thumbnail" style="width: 40px; height: 40px;">
		</div>
		<div class="sidebar-brand-text mx-2" style="font-size: 16px;">
			<?php echo $nombre_empresa; ?>
		</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading" style="font-size: 13px;">
		Interface
	</div>

	<!-- Nav Items -->
	<li class="nav-item">
		<a class="nav-link py-2" href="index.php">
			<i class="fas fa-home fa-sm"></i>
			<span>Inicio</span>
		</a>
	</li>

	<!-- Nueva Venta (Renombrado de Egreso de mercanc¨ªas) -->
	<li class="nav-item">
		<a class="nav-link py-2" href="nueva_venta.php">
			<i class="fas fa-cash-register fa-sm"></i>
			<span>Nueva venta</span>
		</a>
	</li>

	<!-- Collapse Ventas (Solo visible para Administradores) -->
	<?php if ($_SESSION['rol'] == 1) { ?>
	<li class="nav-item">
		<a class="nav-link collapsed py-2" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			<i class="fas fa-cash-register fa-sm"></i>
			<span>Ventas</span>
		</a>
		<div id="collapseTwo" class="collapse" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="nueva_venta.php">Nueva venta</a>
				<a class="collapse-item" href="ventas.php">Ventas</a>
			</div>
		</div>
	</li>
	<?php } ?>

	<!-- Collapse Productos (Solo visible para Administradores) -->
	<?php if ($_SESSION['rol'] == 1) { ?>
	<li class="nav-item">
		<a class="nav-link collapsed py-2" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
			<i class="fas fa-boxes fa-sm"></i>
			<span>Productos</span>
		</a>
		<div id="collapseUtilities" class="collapse" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="registro_producto.php">Nuevo Producto</a>
				<a class="collapse-item" href="lista_productos.php">Productos</a>
			</div>
		</div>
	</li>
	<?php } ?>

	<!-- Ver Productos (Acceso para empleados) -->
	<?php if ($_SESSION['rol'] != 1) { ?>
	<li class="nav-item">
		<a class="nav-link py-2" href="lista_productos.php">
			<i class="fas fa-boxes fa-sm"></i>
			<span>Ver Productos</span>
		</a>
	</li>
	<?php } ?>

	<!-- Collapse Clientes -->
	<li class="nav-item">
		<a class="nav-link collapsed py-2" href="#" data-toggle="collapse" data-target="#collapseClientes" aria-expanded="false" aria-controls="collapseClientes">
			<i class="fas fa-users fa-sm"></i>
			<span>Clientes</span>
		</a>
		<div id="collapseClientes" class="collapse" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="registro_cliente.php">Nuevo Cliente</a>
				<a class="collapse-item" href="lista_cliente.php">Clientes</a>
			</div>
		</div>
	</li>

	<!-- Collapse Proveedor (Solo visible para Administradores) -->
	<?php if ($_SESSION['rol'] == 1) { ?>
	<li class="nav-item">
		<a class="nav-link collapsed py-2" href="#" data-toggle="collapse" data-target="#collapseProveedor" aria-expanded="false" aria-controls="collapseProveedor">
			<i class="fas fa-hospital fa-sm"></i>
			<span>Proveedor</span>
		</a>
		<div id="collapseProveedor" class="collapse" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="registro_proveedor.php">Nuevo Proveedor</a>
				<a class="collapse-item" href="lista_proveedor.php">Proveedores</a>
			</div>
		</div>
	</li>
	<?php } ?>

	<!-- Collapse Usuarios (Solo visible para Administradores) -->
	<?php if ($_SESSION['rol'] == 1) { ?>
	<li class="nav-item">
		<a class="nav-link collapsed py-2" href="#" data-toggle="collapse" data-target="#collapseUsuarios" aria-expanded="false" aria-controls="collapseUsuarios">
			<i class="fas fa-user fa-sm"></i>
			<span>Usuarios</span>
		</a>
		<div id="collapseUsuarios" class="collapse" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="registro_usuario.php">Nuevo Usuario</a>
				<a class="collapse-item" href="lista_usuarios.php">Usuarios</a>
			</div>
		</div>
	</li>
	<?php } ?>

	<!-- Collapse Usuarios (Solo visible para Administradores) -->
	<?php if ($_SESSION['rol'] == 1) { ?>
	<li class="nav-item">
		<a class="nav-link py-2" href="reportes.php">
			<i class="fas fa-table fa-sm"></i>
			<span>Reportes</span>
		</a>
	</li>
	<?php } ?>

	<!-- Configuraci¨®n -->
	<li class="nav-item">
		<a class="nav-link py-2" href="configuracion.php">
			<i class="fas fa-cog fa-sm"></i>
			<span>Configuracion</span>
		</a>
	</li>

</ul>
