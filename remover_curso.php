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
        if($_POST['id']!= null ){
        $id = trim($_POST['id']);
        $sql_certificado = "DELETE FROM aluno_certificado WHERE curso_id = '$id'";
        $delete_cert = mysql_query($sql_certificado)or die (mysql_error($conexao));
        $sql_curso = "DELETE FROM curso WHERE id = '$id' ";
        $delete_curso = mysql_query($sql_curso)or die (mysql_error($conexao));
        ?>
        <script>
            swal({
                title: "Curso Removido!",
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
                title: "Curso não removido!",
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