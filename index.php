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
                    <input/>
                </td>
                <td>No. Documento:</td>
                <td>
                    <input/>
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
                    <input/>
                </td>
                <td>Ruc:</td>
                <td>
                    <input/>
                </td>
            </tr>
            <tr>
                <td>Dirección:</td>
                <td>
                    <input/>
                </td>
                <td>Teléfonos:</td>
                <td>
                    <input/>
                </td>
            </tr>
            <tr>
                <td>Concepto:</td>
                <td>
                    <input/>
                </td>
                <td>Fecha:</td>
                <td>
                    <input/>
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
                    <input />
                </td>
            </tr>
            <tr>
                <td>Valor:</td>
                <td>
                    <input />
                </td>
            </tr>
            <tr>
                <td>Usuario:</td>
                <td>
                    <input />
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

            $("table tbody").find('input[type=text]').filter(':visible:first').focus();
        });
        function addRow() {
            var total = $("#table tbody tr").length + 1;
            var Baris = '<tr>';
            Baris += '<td>';
            Baris += '<input id="tipo_'+total+'" name="tipo_'+total+'"/>';
            Baris += '</td>';
            Baris += '<td>';
            Baris += '<input id="banco_'+total+'" name="banco_'+total+'"/>';
            Baris += '</td>';
            Baris += '<td>';
            Baris += '<input id="documento_'+total+'" name="documento_'+total+'"/>';
            Baris += '</td>';
            Baris += '<td>';
            Baris += '<input id="factura_'+total+'" name="factura_'+total+'"/>';
            Baris += '</td>';
            Baris += '<td>';
            Baris += '<input id="fecha_'+total+'" name="fecha_'+total+'"/>';
            Baris += '</td>';
            Baris += '<td>';
            Baris += '<input id="valor_'+total+'" name="valor_'+total+'"/>';
            Baris += '</td>';
            Baris += '</tr>';
            $("#table tbody").append(Baris);
            $("#table tbody tr").each(function() {
                $(this).find('td:nth-child(2) input').focus();
            });
        }
    </script>
</body>
</html>