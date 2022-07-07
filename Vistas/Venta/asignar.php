<!-- Agregar Nuevos Registros -->
<?php
require_once('../../Clases/Venta/Class.Venta.php');

$ResultadoSelect = new Reserva();
$Select = $ResultadoSelect->ValoresOption();
// $Select2 = $ResultadoSelect->ValoresOption2();

?>
<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="asignar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="max-width: 932px!important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vender Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="Cerrarmodal1()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="message-text" class="col-form-label">Producto: *</label>
                            <select class="form-control" id="selectproducto" aria-label="Default select example">
                                <option>Seleccione el Cliente</option>
                                <?php foreach ($Select as $dato3) { ?>
                                    <!-- <option id="PorPregunta" hidden value=""></option> -->
                                    <option value="<?php echo $dato3->ID; ?>"><?php echo $dato3->ID . ' - ' . utf8_encode($dato3->Nombreproducto); ?></option>
                                <?php  }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="message-text" class="col-form-label">Cantidad: *</label>
                            <input type="number" class="form-control registrar" id="Cantidad" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="Cerrarmodal1()" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="AgregarReserva()">Registrar</button>
            </div>
        </div>
    </div>
</div>