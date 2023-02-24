<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibos</title>

    <script src="./assets/js/jquery-3.6.3.min.js"></script>
</head>
<body>
    <form method="POST" action="">
        <table>
            <tr>
                <td>No. Recibo:</td>
                <td>
                    <input id="recibo"/>
                </td>
                <td>No. Documento:</td>
                <td>
                    <input id="documento"/>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <hr/>
                </td>
            </tr>
            <tr>
                <td>Cliente:</td>
                <td>
                    <input id="cliente"/>
                </td>
                <td>Ruc:</td>
                <td>
                    <input id="ruc"/>
                </td>
            </tr>
            <tr>
                <td>Dirección:</td>
                <td>
                    <input id="direccion"/>
                </td>
                <td>Teléfonos:</td>
                <td>
                    <input id="telefonos"/>
                </td>
            </tr>
            <tr>
                <td>Concepto:</td>
                <td>
                    <input id="concepto"/>
                </td>
                <td>Fecha:</td>
                <td>
                    <input id="fecha"/>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <hr/>
                </td>
            </tr>
        </table>
        <table id="table">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Banco</th>
                    <th>N. Documento</th>
                    <th>Factura</th>
                    <th>Fecha Emisión</th>
                    <th>Valor</th>
                    <th>
                        <button id="add">Agregar</button>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input id="tipo_0" name="tipo_0"/>
                    </td>
                    <td>
                        <input id="banco_0" name="banco_0"/>
                    </td>
                    <td>
                        <input id="documento_0" name="documento_0"/>
                    </td>
                    <td>
                        <input id="factura_0" name="factura_0"/>
                    </td>
                    <td>
                        <input id="fecha_0" name="fecha_0"/>
                    </td>
                    <td>
                        <input id="valor_0" name="valor_0"/>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr/>
        <table>
            <tr>
                <td>SON:</td>
                <td>
                    <input id="son"/>
                </td>
            </tr>
            <tr>
                <td>Valor:</td>
                <td>
                    <input id="valor"/>
                </td>
            </tr>
            <tr>
                <td>Pendiente:</td>
                <td>
                    <input id="pendiente"/>
                </td>
            </tr>
            <tr>
                <td>Usuario:</td>
                <td>
                    <input id="usuario"/>
                </td>
            </tr>
        </table>

        <button id="crear">Crear</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#add').click(function(e) {
                e.preventDefault();
                addRow();
            });

            $('#crear').click(function(e) {
                e.preventDefault();
                create();
            });

            $("table tbody").find('input[type=text]').filter(':visible:first').focus();
        });

        function addRow() {
            var rows_num = $("#table tbody tr").length;
            var new_row = '<tr>';
            new_row += '<td>';
            new_row += '<input id="tipo_'+(rows_num)+'" name="tipo_'+(rows_num)+'"/>';
            new_row += '</td>';
            new_row += '<td>';
            new_row += '<input id="banco_'+(rows_num)+'" name="banco_'+(rows_num)+'"/>';
            new_row += '</td>';
            new_row += '<td>';
            new_row += '<input id="documento_'+(rows_num)+'" name="documento_'+(rows_num)+'"/>';
            new_row += '</td>';
            new_row += '<td>';
            new_row += '<input id="factura_'+(rows_num)+'" name="factura_'+(rows_num)+'"/>';
            new_row += '</td>';
            new_row += '<td>';
            new_row += '<input id="fecha_'+(rows_num)+'" name="fecha_'+(rows_num)+'"/>';
            new_row += '</td>';
            new_row += '<td>';
            new_row += '<input id="valor_'+(rows_num)+'" name="valor_'+(rows_num)+'"/>';
            new_row += '</td>';
            new_row += '</tr>';
            $("#table tbody").append(new_row);
            $("#table tbody tr").each(function() {
                $(this).find('td:nth-child(2) input').focus();
            });
        }

        function create() {
            var rows_num = $('#table tbody tr').length;

            let json = "{";
            json += `"recibo":"${$('#recibo').val()}",`;
            json += `"documento":"${$('#documento').val()}",`;
            json += `"cliente":"${$('#cliente').val()}",`;
            json += `"ruc":"${$('#ruc').val()}",`;
            json += `"direccion":"${$('#direccion').val()}",`;
            json += `"telefonos":"${$('#telefonos').val()}",`;
            json += `"concepto":"${$('#concepto').val()}",`;
            json += `"fecha":"${$('#fecha').val()}",`;
            json += `"pagos":[`;
                for(var i=0; i<rows_num; i++){
                    json += "{";
                    json += `"tipo":"${$('#tipo_'+(i)).val()}",`;
                    json += `"banco":"${$('#banco_'+(i)).val()}",`;
                    json += `"documento":"${$('#documento_'+(i)).val()}",`;
                    json += `"factura":"${$('#factura_'+(i)).val()}",`;
                    json += `"fecha":"${$('#fecha_'+(i)).val()}",`;
                    json += `"valor":"${$('#valor_'+(i)).val()}"`;
                    json += "}";
                    if(i < (rows_num - 1)){
                        json += `,`;
                    }
                }
            json += `],`;
            json += `"son":"${$('#son').val()}",`;
            json += `"valor":"${$('#valor').val()}",`;
            json += `"pendiente":"${$('#pendiente').val()}",`;
            json += `"usuario":"${$('#usuario').val()}"`;
            json += "}";

            window.location.href = 'recibo.php?data='+json;
        }
    </script>
</body>
</html>