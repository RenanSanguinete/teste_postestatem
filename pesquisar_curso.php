<html>
    <head>
        <meta charset="UTF-8">
        <script src="js/sweetalert.min.js"></script> 
        <script src="js/jquery-3.1.1.js"></script>
        <script src="js/bootstrap.js"></script> 
        <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/style.css"  rel="stylesheet" type="text/css">
        <title></title>
    </head>
    <body>
        <?php
        include "conexaobd.php";
        $link = "http://localhost/TestePotestatem/index.php";
            $href = "http://localhost/TestePotestatem/index.php";
            if($_POST['nome']!=null){
                $nome = trim($_POST['nome']);
            }else{
                $nome=null;
            }
            if($_POST['inativo']!=null){
                $inativo = trim($_POST['inativo']);
            }else{
                $inativo=null;
            }
        if($inativo==null && $nome!=null ){
            $sql = "SELECT * FROM curso WHERE nome LIKE '%$nome%'";
        }elseif ($nome==null && $inativo!=null) {
            $sql = "SELECT * FROM curso WHERE inativo = '$inativo' ";
        }  else {
            var_dump($nome);
            $sql = "SELECT * FROM curso WHERE nome LIKE '%$nome%' AND inativo = $inativo";
  
        }
        if($sql!=null && $sql != false){
            $query = mysql_query($sql)  or die(mysql_error());
            //$sql = mysql_fetch_array($query);
            $rows = array();
            while($row = mysql_fetch_array($query))
                $rows[] = $row;
            ?>
            <h1 class="title-lista">Lista de Cursos</h1>       
             <?php
            foreach($rows as $row){
                $id = $row['id'];
                $nome = $row['nome'];
                $inativo = $row['inativo'];
                ?>
                <div class="lista-cursos">
                    <div class="lista-nome col-lg-3 col-md-3">
                        <?php echo 'Nome: '.$nome?><br/>
                    </div>
                    <div class="lista-inativo col-lg-9 col-md-3">
                        <?php echo ($inativo==1) ? 'Inativo: Sim':'Inativo: Não';?>

                    <div class="btn-primary lista-alterar col-lg-3 col-md-3" id="myBtn<?=$id?>" data-toggle="modal" data-target="#myModal<?=$id?>">
                        Alterar
                    </div>
                        <div id="myModal<?=$id?>" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Alterar dados</h4>
                      </div>
                      <div class="modal-body">
                          <form name="cadastro" id="alterar" method="post" action="alterar_curso.php">
                                <input class="col-md-6" name="id" type="hidden" id="id" value="<?=$id?>" /><br /><br />
                            <div class="inputNome">Nome</div><br/>
                            <input class="col-md-6" name="nome" type="text" id="nome" value="<?=$nome?>" /><br /><br />
                            <div for="inputNome">Inativo</div><br/>
                                        
                            <input type="radio" name="inativo" value="1" <?php echo ($inativo==1? 'checked': '' ) ?> />Sim
                            <input type="radio" name="inativo" value="0" <?php echo ($inativo==0? 'checked': '' ) ?> /> Não <br /><br />
                            <button type="submit" id="btnEnviar" class="btn btn-primary" >Enviar</button><br />
                            </form>
                            <script>

                            </script>
                                

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="btn-danger lista-remover col-lg-3 col-md-3" data-toggle="modal" data-target="#myModalRemover<?=$id?> ">
                    Remover<br/>
                </div>
                      
                        
                <div id="myModalRemover<?=$id?>" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Remover dados</h4>
                      </div>
                      <div class="modal-body">
                            <form name="cadastro" id="alterar" method="post" action="remover_curso.php">
                                <input class="col-md-6" name="id" type="hidden" id="id" value="<?=$id?>" /><br /><br />
                                <div class="diplayNome">Apagar o curso <?=$nome?> ?</div><br/>
                             
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="btnConfirmar">Confirmar</button>
                            </form>                               
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                      </div>
                    </div>

                  </div>
                </div> 
                </div>

            </div>
        <?php
            }
        
            ?>
            <a class="btn-success voltar col-lg-2 col-md-2" href="<?=$link?>">Voltar</a>
            <?php
        }else{
            echo 'não cadastrado';
        }?>
        <script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});

</script>
    </body>
</html>