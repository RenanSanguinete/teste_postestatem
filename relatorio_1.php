<html>
    <head>
        <meta charset="UTF-8">
        <script src="js/sweetalert.min.js"></script> 
        <script src="js/jquery-3.1.1.js"></script>
        <!--<script src="js/modal.js"></script>--> 
        <script src="js/bootstrap.js"></script> 
        <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/style.css"  rel="stylesheet" type="text/css">
        <title></title>
    </head>
    <body>
        <?php
            include "conexaobd.php";
            echo '<h1 class="title-listar-alunos">Relatório 1</h1><br/>';
         
            $busca = "SELECT aluno_id, COUNT(*) AS qtd FROM aluno_certificado GROUP BY aluno_id ORDER BY qtd DESC LIMIT 100";
            $todos = mysql_query($busca);
            $tr = mysql_num_rows($todos);
            $href = "http://localhost/TestePotestatem/index.php";
            if($tr!=0){
            while ($dados = mysql_fetch_array($todos)) {
                $id = $dados["aluno_id"];
                $qtd = $dados["qtd"];
                $busca_aluno = "SELECT nome FROM aluno WHERE id = $id";
                $todos_aluno = mysql_query("$busca_aluno");
                while ($dados_aluno = mysql_fetch_array($todos_aluno)) {
                    $nome_aluno = $dados_aluno["nome"];
                }
                echo '<a class="bloco-lista-alunos">';        
                echo "<div class='col-nome col-md-2'>Nome<br> $nome_aluno</div>";
                echo "<div class='col-nome col-md-2'>Quantidade de Certificados<br> $qtd</div>";
                echo '<br><br></a>';
                
            }
            echo "<br><div class='bloco-paginacao'>";
            }else{
                echo "<br><div class='bloco-paginacao'>";
                echo "Nenhum resultado encontrado.";
                
            }
            echo "<br><a class='btn-principal' href='$href'>Tela Principal</a></div>";
        ?>
    </body>
</html>