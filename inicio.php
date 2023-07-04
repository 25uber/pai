<!DOCTYPE html>
<html lang="en">

<head>
    <title>Orçamento</title>
    <style>
        /* todas as divs*/
        .titulo {
            font-size: 50px;
        }

        .titulo2 {
            font-size: 40px;
            color: #0b245e;
        }

        .cliente {
            font-size: 35px;
        }

        .modelo {
            font-size: 35px;
        }

        .ano {
            font-size: 35px;
        }

        .mao {
            font-size: 35px;
        }

        .desc {
            font-size: 30px;
            color: #115e5d;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #0b245e;
            color: white;
        }
    </style>
</head>

<body>
    <script>
        function criarNovaSecao() {
            // Clonar a seção de descrição e valor
            var secaoOriginal = document.querySelector('.desc');
            var novaSecao = secaoOriginal.cloneNode(true);

            // Limpar os campos da nova seção
            var inputs = novaSecao.querySelectorAll('input');
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].value = '';
            }

            // Adicionar a nova seção após a última seção existente
            var secoesServicos = document.querySelectorAll('.desc');
            var ultimaSecao = secoesServicos[secoesServicos.length - 1];
            ultimaSecao.parentNode.insertBefore(novaSecao, ultimaSecao.nextSibling);
        }
    </script>
    <center>
        <form action="total.php" method="get">
            <div class="titulo">--------------------ORÇAMENTO--------------------</div>
            <br><br><br>
            <!-- ----------------------- -->
            <div class="titulo2">CLIENTE/AUTOMÓVEL</div>
            <br><br>
            <!-- ----------------------- -->
            <div class="cliente">
                NOME DO CLIENTE:<input type="text" name="nome">
                <br>
                <!-- ----------------------- -->
                PLACA DO AUTOMÓVEL:<input type="text" name="placa">
            </div>
            <!-- ----------------------- -->
            <div class="modelo">
                MODELO DO AUTOMÓVEL:<input type="text" name="modelo">
            </div>
            <!-- ----------------------- -->
            <div class="ano">
                ANO DO AUTOMÓVEL:<input type="text" name="ano">
            </div>
            <!-- ----------------------- -->
            <br><br>
            <div class="titulo2">SERVIÇOS</div>
            <br><br>
            <!-- ----------------------- -->
            <!-- ----------------------- -->
            <div class="desc">
                DESCRIÇÃO:<input type="text" name="descricao[]"> 
                VALOR: <input type="text" name="valor[]">
            </div>
<!-- ----------------------- -->

            <!-- ----------------------- -->
            <button type="button" onclick="criarNovaSecao()">Adicionar nova seção</button>
            <br><br>

            <div class="titulo2">MÃO DE OBRA</div>
            <br><br>

            <div class="mao">
                VALOR:<input type="text" name="mao">
            </div>

            <h1><input type="submit" value="GERAR"></h1>
        </form>
    </center>
</html>
