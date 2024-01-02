<?php
    $_SESSION['mensaje'] = "";
?>

<html>
    <head>
        <title>Sistema de votaciones</title>
        <meta charset="utf6">
    </head>
    <body>
        <p><strong>FORMULARIO DE VOTACI&Oacute;N:</strong></p>
        <p><?php echo $_SESSION['mensaje']; ?></p>
        <form action="../index.php" method="POST" id="form">
            <table>
            <tr>
                <td>Nombre y Apellido</td>
                <td><input type="text" name="name" id="name" oninput="validateName()" style="width: 200px;" required></td>
            </tr>
            <tr>
                <td>Alias</td>
                <td><input type="text" name="alias" id="alias" onblur="validateAlias()" style="width: 200px;" required></td>
            </tr>
            <tr>
                <td>RUT</td>
                <td><input type="text" name="rut" id="rut" onblur="validateRut()" style="width: 200px;" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" id="email" onblur="validateEmail()" style="width: 200px;" required></td>
            </tr>
            <tr>
                <td>Regi&oacute;n</td>
                <td>
                    <select name="region_id" id="region_id" style="width: 200px;" name="region_id" required>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Comuna</td>
                <td>
                    <select name="commune_id" id="commune_id" style="width: 200px;" required>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Candidato</td>
                <td>
                    <select name="candidate_id" id="candidate_id" style="width: 200px;" required>
                    </select>
                </td>
            </tr>
            <tr>
                <td>C&oacute;mo se enter&oacute; de Nosotros</td>
                <td>
                    <input type="checkbox" name="options[]" onclick="validateCheckbox()" id="web" value="Web">
                    <label for="web">Web</label>
                    <input type="checkbox" name="options[]" onclick="validateCheckbox()" id="tv" value="TV">
                    <label for="web">TV</label>
                    <input type="checkbox" name="options[]" onclick="validateCheckbox()" id="reels" value="Redes Sociales">
                    <label for="web">Redes Sociales</label>
                    <input type="checkbox" name="options[]" onclick="validateCheckbox()" id="amigo" value="Amigo">
                    <label for="web">Amigo</label>
                </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
                <td colspan="1" align="left">
                    <input type="submit" value="Votar">
                </td>
            </tr>
            </table>
        </form>
    </body>
</html>

<script src="../js/library/jquery-3.3.1.min.js"></script>
<script src="../js/controller_load_data.js"></script>
<script src="../js/validations.js"></script>

<script>
    $(document).ready(function(){
        listRegions();
        listCandidates();
    });

    $("#region_id").change(function(){
        var region_id = $("#region_id").val();
        listCommunes(region_id);
    })
</script>
