<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $banco = "teste_potestatem";
        $conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
        mysql_select_db($banco) or die(mysql_error());
        ?>
    </body>
</html>
