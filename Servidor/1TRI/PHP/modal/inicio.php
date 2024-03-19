<?php
$incidenciasSinEmpezar = 1;

$listadoCitas = array(
    array('id_cliente' => 1, 'horaProgramada' => '09:00 AM'),
    array('id_cliente' => 2, 'horaProgramada' => '10:30 AM')
);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if ($incidenciasSinEmpezar) { ?>
        <div class="modal fade" id="citas" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Tienes citas pendientes</h4>
                    </div>
                    <div class="modal-body">
                        <p>En los próximos 10 minutos tienes las siguientes citas: </p>
                        <br>

                        <table class="table gs-7 gy-7 gx-7">
                            <thead>
                                <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                    <th>Cliente</th>
                                    <th>Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listadoCitas as $cita) { ?>
                                    <tr>
                                        <td>
                                            a
                                        </td>
                                        <td>
                                            <?= $cita['horaProgramada'] ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <br>
                        <center><a href=''>Ver Incidencia</a></center>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


    <script>
        var citasEn10Min = "<?= count($listadoCitas) ?>";

        console.log(citasEn10Min);

        // Espera a que se cargue el DOM antes de acceder al elemento modal
        document.addEventListener('DOMContentLoaded', function () {
            if (parseInt(citasEn10Min) === 1) {
                var id_usuario = "<?= $idusuario ?>";
                document.getElementById("citas").style.zIndex = "1050";
                $('#citas').modal('show');
            }
        });
    </script>
</body>

</html>