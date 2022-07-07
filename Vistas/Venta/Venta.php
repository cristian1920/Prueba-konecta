<?php
include('../Principal/principal.php');
// require_once("../../Controladores/Clientes/clientes.controller.php");
require_once("../../Controladores/Ventas/Ventas.controller.php");
?>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="../../assets/images/icon/income.png" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-muted m-t-10 m-b-0">Producto con Mas stock</h6>
                        <h2 class="m-t-0"><?php if (isset($mayorstock)) {
                                                   echo $mayorstock[0]->Nombreproducto .' : '. $mayorstock[0]->Stock;
                                            } else {
                                                echo 0;
                                            } ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="../../assets/images/icon/expense.png" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-muted m-t-10 m-b-0">Producto Mas vendido</h6>
                        <h2 class="m-t-0"><?php if (isset($masvendido)) {
                                                echo $masvendido[0]->Nombreproducto .' : '. $masvendido[0]->mayor;
                                            } else {
                                                echo 0;
                                            } ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="../../assets/images/icon/assets.png" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-muted m-t-10 m-b-0">Fecha actual</h6>
                        <h2 class="m-t-0"><?php 
                                                    $fechaactual = date("d/m/Y");
                                                    echo $fechaactual;
                                             
                                             ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Historico</h4>
                <h6 class="card-subtitle">Exportar datos en Excel, PDF & Print</h6>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                            <th>#</th>
                                <th>Nombre producto</th>
                                <th>Referencia</th>
                                <th>Precio</th>
                                <th>Peso</th>
                                <th>Categoría</th>
                                <th>Stock</th>
                                <th>Cantidad</th>
                                <th>Fecha creación</th>
                           
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>#</th>
                                <th>Nombre producto</th>
                                <th>Referencia</th>
                                <th>Precio</th>
                                <th>Peso</th>
                                <th>Categoría</th>
                                <th>Stock</th>
                                <th>Cantidad</th>
                                <th>Fecha creación</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($historico as $dato) {
                                $Fechacreacion=$dato->Fechacreacion;
                                $idventa=$dato->idcompra;
                            ?>
                                <tr>
                                    <th><?php echo $i++; ?></th>
                                    <th><?php echo $dato->Nombreproducto; ?></th>
                                    <th><?php echo $dato->Referencia; ?></th>
                                    <th><?php echo $dato->Precio; ?></th>
                                    <th><?php echo $dato->Peso; ?></th>
                                    <th><?php echo $dato->Categoria; ?></th>
                                    <th><?php echo $dato->Stock; ?></th>
                                    <th><?php echo $dato->cantidad; ?></th>
                                    <th><?php echo $dato->Fechacreacion; ?></th>
                                </tr>
                            <?php
                            $datea=date("Y-m-d");
                            // $datea='2022-05-23';
                            } ?>
                        </tbody>
                    </table>
                    <div class="dataTables_paginate paging_simple_numbers">
                    </div>
                    <tr>
                        <td colspan="2">
                            <button type="button" class="btn btn-success btn-rounded" data-toggle="modal" data-target="#asignar">Vender</button>
                        </td>
                    </tr>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include('./asignar.php');
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