<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Teste Potestatem</title>
        <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="js/jquery.maskedinput.js" ></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/style.css"  rel="stylesheet" type="text/css">
               <script>
            jQuery(function ($) {
                $("#cadastrar").on("click", function(e){
                    // função aqui
                    alert("clicou");
                });
            });
        </script>
    </head>
    <body>
<!--        <div class="Cadastro" id="cadastrar">Cadastro            
        </div>-->
        <div class="bloco-principal">
            <div class="bloco-curso col-lg-4 col-md-4">
                <h2 class="title-curso">Curso</h2>
                <form id="cadastro" name="cadastro" method="post" action="cadastro.php">
                    <button type="submit" name="submit" class="btn btn-primary " id="btn-cadastro">Cadastrar Curso</button><br /><br />
                    </form>
                <form id="pesquisar" name="pesquisar" method="post" action="pesquisar.php">
                        <button type="submit" name="submit" class="btn btn-primary" >Pesquisar Curso</button><br /><br />
                    </form>
            </div>
            <div class="bloco-relatorio col-lg-4 col-md-4">
                    <h2 class="title-relatorio">Teste Relatório</h2> 
                    <form id="relatorio-1" name="cadastro" method="post" action="relatorio_1.php">
                        <button type="submit" name="submit" class="btn btn-primary " id="btn-relatorio-1" >Relatório 1</button><br /><br />
                    </form>
                    <form id="relatorio-2" name="alteracao" method="post" action="relatorio_2.php">
                        <button type="submit" name="submit" class="btn btn-primary " id="btn-relatorio-2" >Relatório 2</button><br /><br />
                    </form>

            </div>
            <div class="bloco-relatorio col-lg-4 col-md-4">
                    <h2 class="title-relatorio">Aluno</h2> 
                    <form name="cadastro" method="get" action="listar_alunos.php">
                        <button type="submit" name="submit" class="btn btn-primary">Listar Aluno</button><br />
                    </form>
                    </form>

            </div>
        </div>
    </body>
</html>
