<div class="modal fade" id="Eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="max-width: 932px!important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="Cerrarmodal()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form>
            <h2 class="text-center">Nombre de producto: </h2>
            <h3 class="text-center" id="Eliminarnombre"></h3>
                    <input type="hidden" id="Eliminarid">
                </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="Cerrarmodal()" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="EliminarInformacionBD()">Eliminar</button>
            </div>
        </div>
    </div>
</div>