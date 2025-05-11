<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Configuración</h1>
	</div>

	<div class="row">
		<!-- Información Personal -->
		<div class="col-lg-6">
			<div class="card shadow">
				<div class="card-header bg-primary text-white">
					Información Personal
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Nombre: <strong><?php echo $_SESSION['nombre']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>Correo: <strong><?php echo $_SESSION['email']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>Rol: <strong><?php echo $_SESSION['rol_name']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>Usuario: <strong><?php echo $_SESSION['user']; ?></strong></label>
					</div>

					<!-- Cambiar Contraseña -->
					<div class="mt-4">
						<h6 class="text-primary font-weight-bold">Cambiar Contraseña</h6>
						<form action="" method="post" id="frmChangePass">
							<div class="form-group">
								<label>Contraseña Actual</label>
								<input type="password" name="actual" id="actual" class="form-control" placeholder="Clave Actual" required>
							</div>
							<div class="form-group">
								<label>Nueva Contraseña</label>
								<input type="password" name="nueva" id="nueva" class="form-control" placeholder="Nueva Clave" required>
							</div>
							<div class="form-group">
								<label>Confirmar Contraseña</label>
								<input type="password" name="confirmar" id="confirmar" class="form-control" placeholder="Confirmar Clave" required>
							</div>
							<div class="alertChangePass" style="display: none;"></div>
							<button type="submit" class="btn btn-primary btnChangePass">Cambiar Contraseña</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Datos de la Empresa -->
		<div class="col-lg-6">
			<div class="card shadow">
				<div class="card-header bg-primary text-white">
					Datos de la Empresa
				</div>
				<div class="card-body">
					<?php if ($_SESSION['rol'] == 1) { ?>
						<form action="empresa.php" method="post" id="frmEmpresa">
							<div class="form-group">
								<label>RUC</label>
								<input type="number" name="txtDni" id="txtDni" class="form-control" value="<?php echo $dni; ?>" required>
							</div>
							<div class="form-group">
								<label>Nombre</label>
								<input type="text" name="txtNombre" id="txtNombre" class="form-control" value="<?php echo $nombre_empresa; ?>" required>
							</div>
							<div class="form-group">
								<label>Razón Social</label>
								<input type="text" name="txtRSocial" id="txtRSocial" class="form-control" value="<?php echo $razonSocial; ?>">
							</div>
							<div class="form-group">
								<label>Teléfono</label>
								<input type="number" name="txtTelEmpresa" id="txtTelEmpresa" class="form-control" value="<?php echo $telEmpresa; ?>" required>
							</div>
							<div class="form-group">
								<label>Correo Electrónico</label>
								<input type="email" name="txtEmailEmpresa" id="txtEmailEmpresa" class="form-control" value="<?php echo $emailEmpresa; ?>" required>
							</div>
							<div class="form-group">
								<label>Dirección</label>
								<input type="text" name="txtDirEmpresa" id="txtDirEmpresa" class="form-control" value="<?php echo $dirEmpresa; ?>" required>
							</div>
							<div class="form-group">
								<label>IGV (%)</label>
								<input type="text" name="txtIgv" id="txtIgv" class="form-control" value="<?php echo $igv; ?>" required>
							</div>
							<?php echo isset($alert) ? $alert : ''; ?>
							<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar Datos</button>
						</form>
					<?php } else { ?>
						<div class="p-2">
							<div class="form-group"><strong>RUC:</strong> <h6><?php echo $dni; ?></h6></div>
							<div class="form-group"><strong>Nombre:</strong> <h6><?php echo $nombre_empresa; ?></h6></div>
							<div class="form-group"><strong>Razón Social:</strong> <h6><?php echo $razonSocial; ?></h6></div>
							<div class="form-group"><strong>Teléfono:</strong> <h6><?php echo $telEmpresa; ?></h6></div>
							<div class="form-group"><strong>Correo Electrónico:</strong> <h6><?php echo $emailEmpresa; ?></h6></div>
							<div class="form-group"><strong>Dirección:</strong> <h6><?php echo $dirEmpresa; ?></h6></div>
							<div class="form-group"><strong>IGV (%):</strong> <h6><?php echo $igv; ?></h6></div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

<?php include_once "includes/footer.php"; ?>