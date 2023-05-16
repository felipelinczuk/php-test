<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Teste de cadastro</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function load() {
                $.ajax({
                    url: 'BD.php',
                    type: 'POST',
                    data: { 
                        action: 'load'
                    },
                    dataType: 'html',
                    success: function(data) {
                        document.getElementById("tabela").innerHTML = data;
                    },
                    error: function() {
                        console.log('Falha ao carregar.');
                    }
                });
            }
            function insert(dados) {
                $.ajax({
                    url: 'BD.php',
                    type: 'POST',
                    data: { 
                        action: 'insert',
                        nome: dados.getAttribute("nome"),
                        email: dados.getAttribute("email"),
                    },
                    dataType: 'html',
                    success: function(data) {
                        document.getElementById("tabela").innerHTML = data;
                    },
                    error: function() {
                        console.log('Falha ao carregar.');
                    }
                });
            }
            </script>
    </head>
    <body id="corpo" onload='load()'>
        <table id="tabela"></table>
        <button nome="Augusto" email="augusto@skynet.co" onClick="insert(this);location.reload();">NOVO</button>
    </body>
</html>