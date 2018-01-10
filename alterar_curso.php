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
        $link = "http://localhost/TestePotestatem/index.php";
        $href = "http://localhost/TestePotestatem/pesquisar.php";
        if($_POST['nome']!= null ){
        $id = trim($_POST['id']);
        $nome = trim($_POST['nome']);
        $inativo = trim($_POST['inativo']);
        $sql = "UPDATE curso SET id=$id, nome='$nome' ,inativo=$inativo WHERE id = $id ";
        $update = mysql_query($sql)or die (mysql_error($conexao));
        ?>
        <script>
            swal({
                title: "Alteração realizada!",
                text: "Deseja continuar?",
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
        </script>
        <?php
        }else{ ?>
                   <script>
            swal({
                title: "Alteração não realizada!",
                text: "Deseja continuar?",
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