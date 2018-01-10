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
        <div class="col-md-6">
            <h2>Teste Potestatem</h2>
            <h3>Pesquisar Curso</h3>
            <form name="pesquisa" method="post" action="pesquisar_curso.php">
                <label for="inputNome">Nome</label><br/>
                <input class="col-md-6" name="nome" type="text" id="nome" value="" /><br /><br />
                <label for="inputInativo">Inativo</label><br/>
                <input type="radio" name="inativo" value="" style="display:none;" checked=""/>
                <input type="radio" name="inativo" value="1"/>Sim
                <input type="radio" name="inativo" value="0"/> Não <br /><br />
                <button type="submit" name="submit" class="btn btn-primary" >Pesquisar</button><br />
            </form>
        </div>    
    </body>
</html>