<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Saludo al Usuario -->
    <div class="row mb-4">
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Bienvenido <?php echo $_SESSION['nombre']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        
    <!-- Nueva Venta Vendedor -->
    <!-- Mostrar solo para Vendedores -->
    <?php if ($_SESSION['rol'] == 2) { ?>
        <a class="col-xl-3 col-md-6 mb-4" href="nueva_venta.php">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nueva Venta</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Crear</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cash-register fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    <?php } ?>

        <!-- Mostrar solo para Administradores -->
        <?php if ($_SESSION['rol'] == 1) { ?>
            <!-- Usuarios Card -->
            <a class="col-xl-3 col-md-6 mb-4" href="lista_usuarios.php">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Usuarios</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['usuarios']; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Clientes Card -->
            <a class="col-xl-3 col-md-6 mb-4" href="lista_cliente.php">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Clientes</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['clientes']; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        <?php } ?>

        <!-- Productos Card (Visible para todos) -->
        <a class="col-xl-3 col-md-6 mb-4" href="lista_productos.php">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Productos</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $data['productos']; ?></div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <!-- Ventas Card (Dependiendo del Rol) -->
        <?php if ($_SESSION['rol'] == 1) { ?>
            <!-- Administrador: Ver todas las ventas -->
            <a class="col-xl-3 col-md-6 mb-4" href="ventas.php">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Ventas Totales</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    // Consultar el total de ventas realizadas por todos los vendedores en el mes actual
                                    require "../conexion.php";
                                    $query_ventas = mysqli_query($conexion, "
                                        SELECT COUNT(DISTINCT f.nofactura) AS total_ventas
                                        FROM factura f
                                        WHERE MONTH(f.fecha) = MONTH(CURRENT_DATE) AND YEAR(f.fecha) = YEAR(CURRENT_DATE)
                                    ");
                                    $result = mysqli_fetch_array($query_ventas);
                                    $total_ventas = isset($result['total_ventas']) ? $result['total_ventas'] : 0;
                                    echo $total_ventas;
                                    mysqli_close($conexion);
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        <?php } else if ($_SESSION['rol'] == 2) { ?>
            
            <!-- Vendedor: Ver solo las ventas del vendedor en el mes actual -->
                <a class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Mis Ventas</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                <?php
                                                require "../conexion.php";
                                                $usuario = $_SESSION['nombre'];
                                                $id_vendedor = null;
            
                                                if (!empty($usuario)) {
                                                    $query = mysqli_query($conexion, "SELECT idusuario FROM usuario WHERE nombre = '$usuario'");
                                                    if ($query && mysqli_num_rows($query) > 0) {
                                                        $row = mysqli_fetch_assoc($query);
                                                        $id_vendedor = $row['idusuario'];
                                                    }
                                                }
            
                                                if (!empty($id_vendedor)) {
                                                    $query_ventas = mysqli_query($conexion, "
                                                        SELECT COUNT(DISTINCT f.nofactura) AS total_ventas
                                                        FROM factura f
                                                        WHERE f.usuario = $id_vendedor
                                                        AND MONTH(f.fecha) = MONTH(CURRENT_DATE)
                                                        AND YEAR(f.fecha) = YEAR(CURRENT_DATE)
                                                    ");
                                                    if ($query_ventas) {
                                                        $result = mysqli_fetch_array($query_ventas);
                                                        $total_ventas = isset($result['total_ventas']) ? $result['total_ventas'] : 0;
                                                        echo $total_ventas;
                                                    } else {
                                                        echo "0";
                                                    }
                                                } else {
                                                    echo "ID no encontrado";
                                                }
            
                                                mysqli_close($conexion);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>

    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include_once "includes/footer.php"; ?>