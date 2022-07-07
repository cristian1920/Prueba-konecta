<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="max-width: 932px!important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Productos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="Cerrarmodal1()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="recipient-name" class="col-form-label">Nombre de producto: *</label>
                            <input type="text" class="form-control registrarr" id="Nombre">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Referencia: *</label>
                            <input type="text" class="form-control registrarr" id="Referencia" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Precio: *</label>
                            <input type="number" class="form-control registrarr" id="Precio" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="recipient-name" class="col-form-label">Peso: *</label>
                            <input type="number" class="form-control registrarr"  id="Peso" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Categoría: *</label>
                            <input type="text" class="form-control registrarr" id="Categoria" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Stock: *</label>
                            <input type="number" class="form-control registrarr" id="Stock" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  onclick="Cerrarmodal1()"data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="Registrar()">Registrar</button>
            </div>
        </div>
    </div>
</div>