<html>
    <head>
        <meta charset="UTF-8">
        <script src="js/sweetalert.min.js"></script> 
        <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
        <title></title>
    </head>
    <body>
        <?php
        include "conexaobd.php";
        if($_POST['nome']!= null ){
        $nome = trim($_POST['nome']);
        $inativo = trim($_POST['inativo']);
        $sql = mysql_query("INSERT INTO curso (nome,inativo) VAlUES ('$nome','$inativo')");
        $link = "http://localhost/TestePotestatem/index.php";
        $href = "http://localhost/TestePotestatem/index.php";
        echo 'cadastrado';
        }else{ ?>
                   <script>
            swal({
                title: "Cadastro não realizado!",
                text: "Campos com * são obrigatórios. Deseja continuar?",
                type: "success",
                showCancelButton: true, confirmButtonColor: "#09840f", confirmButtonText: "Sim",
                cancelButtonText: "Não, voltar!",
                closeOnConfirm: false, 
                closeOnCancel: false
            },
                function (opcao) {
                    if (opcao) {
                        location.href = <?php echo "'$href'"?>;
                    } else {
                        location.href = <?php echo "'$link'"?>;
                    }
                });
        </script> <?php
        }
?>

    </body>
</html>