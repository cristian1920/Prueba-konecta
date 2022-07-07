<div class="modal fade" id="EditarInformacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="max-width: 932px!important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="Cerrarmodal()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form>
            <div class="row">
                        <div class="form-group col-md-4">
                            <input type="hidden" id="EID">
                            <label for="recipient-name" class="col-form-label">Nombre de producto: *</label>
                            <input type="text" class="form-control registrar" id="EditNombre">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Referencia: *</label>
                            <input type="text" class="form-control registrar" id="EditReferencia" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Precio: *</label>
                            <input type="number" class="form-control registrar" id="EditPrecio" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="recipient-name" class="col-form-label">Peso: *</label>
                            <input type="number" class="form-control registrar"  id="EditPeso" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Categoría: *</label>
                            <input type="text" class="form-control registrar" id="EditCategoria" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Stock: *</label>
                            <input type="number" class="form-control registrar" id="EditStock" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="Cerrarmodal()" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="EditarInformacionBD()">Actualizar</button>
            </div>
        </div>
    </div>
</div>