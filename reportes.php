<?php 
include_once "includes/header.php"; 
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            <h4 class="text-center">Reporte de Ventas y Productos</h4>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="reportTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad Vendida</th>
                                <th>Precio Total</th>
                                <th>Stock Actual</th>
                                <th>Vendedor</th>
                                <th>Cliente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Datos de ventas (esto se debería cargar dinámicamente desde la base de datos) -->
                            <?php
                            // Aquí deberías tener la lógica para traer los datos desde tu base de datos.
                            // Supongamos que tienes un array de ventas (o consultas SQL)

                            $ventas = [
                                ["producto" => "Producto A", "cantidad" => 10, "precio_total" => 100, "stock" => 50, "vendedor" => "Vendedor 1", "cliente" => "Cliente A"],
                                ["producto" => "Producto B", "cantidad" => 5, "precio_total" => 50, "stock" => 20, "vendedor" => "Vendedor 2", "cliente" => "Cliente B"]
                            ];

                            foreach ($ventas as $venta) {
                                echo "<tr>
                                        <td>{$venta['producto']}</td>
                                        <td>{$venta['cantidad']}</td>
                                        <td>{$venta['precio_total']}</td>
                                        <td>{$venta['stock']}</td>
                                        <td>{$venta['vendedor']}</td>
                                        <td>{$venta['cliente']}</td>
                                      </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Gráfico de productos más vendidos -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="text-center">Productos Más Vendidos</h5>
                    <canvas id="productosVendidosChart"></canvas>
                </div>
            </div>

            <!-- Gráfico de vendedores -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="text-center">Mejores Vendedores</h5>
                    <canvas id="mejoresVendedoresChart"></canvas>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include_once "includes/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {
    $('#reportTable').DataTable();

    // Datos para los gráficos
    const productosVendidosData = {
        labels: ["Producto A", "Producto B", "Producto C"],
        datasets: [{
            label: 'Cantidad Vendida',
            data: [100, 50, 70],
            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
            borderWidth: 1
        }]
    };

    const mejoresVendedoresData = {
        labels: ["Vendedor 1", "Vendedor 2", "Vendedor 3"],
        datasets: [{
            label: 'Ventas Realizadas',
            data: [200, 150, 100],
            backgroundColor: ['#f6c23e', '#e74a3b', '#858796'],
            borderWidth: 1
        }]
    };

    // Crear gráfico de productos más vendidos
    var ctx = document.getElementById('productosVendidosChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: productosVendidosData
    });

    // Crear gráfico de mejores vendedores
    var ctxVendedores = document.getElementById('mejoresVendedoresChart').getContext('2d');
    new Chart(ctxVendedores, {
        type: 'bar',
        data: mejoresVendedoresData
    });
});
</script>