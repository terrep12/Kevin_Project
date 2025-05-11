<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            <!-- Datos del Cliente -->
            <div class="form-group">
                <h4 class="text-center">Datos del Cliente</h4>
                <a href="#" class="btn btn-primary btn_new_cliente mb-3"><i class="fas fa-user-plus"></i> Nuevo Cliente</a>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <form method="post" name="form_new_cliente_venta" id="form_new_cliente_venta">
                        <input type="hidden" name="action" value="addCliente">
                        <input type="hidden" id="idcliente" name="idcliente" value="1" required>
                        <div class="row">
                            <div class="col-md-6 col-lg-3 mb-3">
                                <label>DNI</label>
                                <input type="number" name="dni_cliente" id="dni_cliente" class="form-control">
                            </div>
                            <div class="col-md-6 col-lg-3 mb-3">
                                <label>Nombre</label>
                                <input type="text" name="nom_cliente" id="nom_cliente" class="form-control" disabled required>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-3">
                                <label>Teléfono</label>
                                <input type="number" name="tel_cliente" id="tel_cliente" class="form-control" disabled required>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-3">
                                <label>Dirección</label>
                                <input type="text" name="dir_cliente" id="dir_cliente" class="form-control" disabled required>
                            </div>
                        </div>
                        <div id="div_registro_cliente" style="display: none;" class="text-center mt-3">
                            <button type="submit" class="btn btn-success">Guardar Cliente</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Datos Venta -->
            <h4 class="text-center">Datos Venta</h4>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fas fa-user"></i> Vendedor</label>
                        <p style="font-size: 16px; text-transform: uppercase; color: blue;"><?php echo $_SESSION['nombre']; ?></p>
                    </div>
                </div>
                <div class="col-md-6 text-md-right">
                    <label>Acciones</label>
                    <div class="form-group">
                        <a href="#" class="btn btn-danger mb-1" id="btn_anular_venta">Anular</a>
                        <a href="#" class="btn btn-primary mb-1" id="btn_facturar_venta"><i class="fas fa-save"></i> Generar Venta</a>
                    </div>
                </div>
            </div>

            <!-- Tabla Productos -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th width="250px">Código</th> <!-- Tamaño del bloque -->
                                    <th>Descripción</th>
                                    <th>Stock</th>
                                    <th width="100px">Cantidad</th>
                                    <th class="textright">Precio</th>
                                    <th class="textright">Precio Total</th>
                                    <th>Acciones</th>
                                </tr>
                               <tr>
                                    <td><input type="number" name="txt_cod_producto" id="txt_cod_producto" class="form-control" min="1" step="1" pattern="\d*"></td>
                                    <td id="txt_descripcion">-</td>
                                    <td id="txt_existencia">-</td>
                                    <td><input type="number" name="txt_cant_producto" id="txt_cant_producto" class="form-control" value="0" min="1" step="1" pattern="\d*" disabled></td>
                                    <td id="txt_precio" class="textright">0.00</td>
                                    <td id="txt_precio_total" class="textright">0.00</td>
                                    <td><a href="#" id="add_product_venta" class="btn btn-dark btn-sm" style="display: none;">Agregar</a></td>
                                </tr>
                                
                                <style>
                                input[type=number]::-webkit-outer-spin-button,
                                input[type=number]::-webkit-inner-spin-button {
                                    -webkit-appearance: none;
                                    margin: 0;
                                }
                                
                                input[type=number] {
                                    -moz-appearance: textfield;
                                }
                                </style>

                                <tr>
                                    <th>Código</th>
                                    <th colspan="2">Descripción</th>
                                    <th>Cantidad</th>
                                    <th class="textright">Precio</th>
                                    <th class="textright">Precio Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="detalle_venta">
                                <!-- Contenido AJAX -->
                            </tbody>
                            <tfoot id="detalle_totales">
                                <!-- Contenido AJAX -->
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include_once "includes/footer.php"; ?>