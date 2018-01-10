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
            echo '<h1 class="title-listar-alunos">Lista de Alunos</h1><br/>';
            echo '<div class="bloco-filtrar">';
            echo '<form name="filtro" method="post" action="listar_alunos.php">';
            echo '<label for="inputNome">Nome</label><br/>';
            echo '<input class="texto-nome col-md-6" name="nome" type="text" id="nome" value="" />';
            echo '<button type="submit" name="submit" class="btn btn-primary" >Filtrar</button><br />';
            echo '</form>';
            echo '</div><br>';
            if(isset($_POST['nome'])){
                
                $filtro = $_POST['nome'];
                
                $busca = "SELECT * FROM aluno WHERE nome LIKE '%$filtro%'";
            }else{
                $busca = "SELECT * FROM aluno";
            }
            
            $total_reg = "10"; 
            $href = "http://localhost/TestePotestatem/index.php";
            if(isset($_GET['pagina'])){
                $pagina=$_GET['pagina'];
                if (!$pagina) {
                    $pc = "1";
                } else {
                    $pc = $pagina;
                }
            }else{
                $pc = "1"; 
            }
            $inicio = $pc - 1;
            $inicio = $inicio * $total_reg;
            $limite = mysql_query("$busca LIMIT $inicio,$total_reg");
            $todos = mysql_query("$busca");
            $tr = mysql_num_rows($todos); 
            $tp = $tr / $total_reg;
            
            if($tr!=0){
            while ($dados = mysql_fetch_array($limite)) {
                $id = $dados["id"];
                $nome = $dados["nome"];
                $matriculado = $dados["matriculado"];
                $data_c = $dados["datacadastro"];
                $datacadastro = implode("/", array_reverse(explode("-", $data_c)));
                $email = $dados["email"];
                $senha = $dados["senha"];
                $telefone = $dados["telefone"];
                $data_n = $dados["data_nascimento"];
                if(!empty($data_n)){
                    $data_nascimento = implode("/", array_reverse(explode("-", $data_n)));
                }else{
                    $data_nascimento = 'Não informada';
                }
                if(!empty($filtro)){
                    echo "<div class='bloco-resultado'>Resultado da pesquisa para $filtro .</div><br>";
                }
                echo '<a class="bloco-lista-alunos id="myBtn'.$id.'" data-toggle="modal" data-target="#myModal'.$id.'">';        
                echo "<div class='col-nome col-md-2'>Nome<br> $nome</div>";
                echo "<div class='col-matricula col-md-1'>";
                echo ($matriculado==1) ? 'Matriculado<br> Sim':'Matriculado<br> Não';
                echo "</div>";
                echo "<div class='col-nome col-md-2'>Data de cadastro<br> $datacadastro</div>";
                echo "<div class='col-nome col-md-2'>E-mail<br> $email</div>";
                echo "<div class='col-nome col-md-1'>Senha<br> $senha</div>";
                echo "<div class='col-nome col-md-2'>Telefone<br> $telefone</div>";
                echo "<div class='col-nome col-md-2'>Data de Nascimento<br> $data_nascimento</div>";
                echo '<br><br></a>';
                ?>
        <div id="myModal<?=$id?>" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Certificados do Aluno</h4>
              </div>
              <div class="modal-body">
                  <?php
                    $busca_certificado = "SELECT * FROM aluno_certificado WHERE aluno_id = $id";
                    $todos = mysql_query($busca_certificado);
                    $total_r = mysql_num_rows($todos);
                    $i = 1;
                    if($total_r!=0){
                       while ($dados_cer = mysql_fetch_array($todos)) { 
                            $id = $dados_cer["id"];
                            $curso_id = $dados_cer["curso_id"];
                            $nota = $dados_cer["nota"];
                            $data_m = $dados_cer["datamatricula"];
                            $datamatricula = implode("/", array_reverse(explode("-", $data_m)));
                            $data_c = $dados_cer["dataconclusao"];
                            $dataconclusao = implode("/", array_reverse(explode("-", $data_c)));
                            $busca_curso = "SELECT nome FROM curso WHERE id = $curso_id";
                            $resul_curso = mysql_query($busca_curso);
                            
                            while ($dados_curso = mysql_fetch_array($resul_curso)) {
                                $nome_curso = $dados_curso['nome'];
                            }
                            ?>  
                                <p class="title-certificado">Certificado <?=$i?></p><br>
                                <p class="conteudo-certificado">Nome do Curso: <?=$nome_curso?></p><br>
                                <p class="conteudo-certificado">Nota: <?=$nota?></p><br>
                                <p class="conteudo-certificado">Data da Matrícula: <?=$datamatricula?></p><br>
                                <p class="conteudo-certificado">Data da Conclusão: <?=$dataconclusao?></p><br>
                            <?php
                                $i++;
                       }
                    }else{
                        ?><p>Não possui certificados.</p>
                  <?php
                    }
                  ?>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
              </div>
            </div>

          </div>
        </div>
        <?php
            }
            $anterior = $pc -1;
            $proximo = $pc +1;
            echo "<div class='bloco-paginacao'>";
            if ($pc>1) {
                echo " <a class='btn-anterior' href='?pagina=$anterior'><- Anterior</a> ";
            }
            echo "|";
            if ($pc<$tp) {
                echo " <a class='btn-proxima' href='?pagina=$proximo'>Próxima -></a>";
            }
            
            echo "<br><a class='btn-principal' href='$href'>Tela Principal</a>";  
            echo '</div>';
            }else{
                echo "<br><div class='bloco-paginacao'>Nenhum resultado encontrado com o nome $filtro";
                echo "<br><a class='btn-principal' href='$href'>Tela Principal</a></div>";
            }
        ?>

        <script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>
    </body>
</html>