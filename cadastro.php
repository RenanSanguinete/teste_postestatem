<html>
    <head>
        <meta charset="UTF-8">
        <script src="js/sweetalert.min.js"></script> 
        <link href="css/style.css"  rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
        
        <title></title>
    </head>
        <body>
            <div class="bloco-cad">
        <div class=" col-md-6">
            <h2 class="title-cadastro">Teste Potestatem</h2>
            <h3 class="sub-title-cadastro">Cadastro Curso</h3>
            <form name="cadastro" id="form-cadastro" method="post" action="cadastrar_curso.php">
                <label for="inputNoe">Nome</label><br/>
                <input class="col-md-6" name="nome" type="text" id="nome" value="" /><br /><br />
                <label for="inputNome">Inativo</label><br/>
                <input type="radio" name="inativo" value="1"/>Sim
                <input type="radio" name="inativo" value="0"/> Não <br /><br />
                <button type="submit" name="submit" class="btn btn-primary" >Enviar</button><br />
            </form>
        </div> 
            </div>
    </body>
</html>