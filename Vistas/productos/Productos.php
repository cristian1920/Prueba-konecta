<?php
include('../Principal/principal.php');
require_once("../../Controladores/productos/Productos.controller.php");
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Productos</h4>
                <h6 class="card-subtitle">Exportar datos en Excel, PDF & Print</h6>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre de producto</th>
                                <th>Referencia</th>
                                <th>Precio</th>
                                <th>Peso</th>
                                <th>Categoría</th>
                                <th>Stock</th>
                                <th>Fecha de creación</th>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nombre de producto</th>
                                <th>Referencia</th>
                                <th>Precio</th>
                                <th>Peso</th>
                                <th>Categoría</th>
                                <th>Stock</th>
                                <th>Fecha de creación</th>
                                <td>Acciones</td>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php
                            $i=1;
                                            foreach ($productos as $dato) {
                                            ?>
                                                <tr>
                                                    <th><?php echo $i++; ?></th>
                                                    <th><?php echo $dato->Nombreproducto; ?></th>
                                                    <th><?php echo $dato->Referencia; ?></th>
                                                    <th><?php echo $dato->Precio; ?></th>
                                                    <th><?php echo $dato->Peso; ?></th>
                                                    <th><?php echo $dato->Categoria; ?></th>
                                                    <th><?php echo $dato->Stock; ?></th>
                                                    <th><?php echo $dato->Fechacreacion; ?></th>
                                                    <th>
                                                        <a type="button" class="btn btn-warning" style="color:white" data-toggle="modal" onclick="EditarInformacion('<?php echo $dato->ID; ?>');">Editar</a>
                                                        <a type="button" class="btn btn-danger" style="color:white" data-toggle="modal"   onclick="EliminarInformacion('<?php echo $dato->ID.'-'.$dato->Nombreproducto; ?>');">Eliminar</a>
                                                        <!-- <button type="button" class="btn btn-danger" style="background-color: red; color: white;">Eliminar</button> -->
                                                    </th>
                                                </tr>
                                            <?php 
                                        
                                        include('./Editar.php');
                                        include('./Eliminar.php');
                                        } ?>
                        </tbody>
                    </table>
                    <div class="dataTables_paginate paging_simple_numbers">
                    </div>
                    <tr>
                        <td colspan="2">
                        <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#addnew">Agregar</button>
                        </td>
                    </tr>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include('./registrar.php');
include('../Principal/footer.php');

?>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    });
    </script>