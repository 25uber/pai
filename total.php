<!DOCTYPE html>
<html lang="en">

<head>
    <title>Orçamento - Resultado</title>
    <style>
        /* Estilos CSS para a tabela */
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
</head>

<body>
    <center>
        <img src="logoo.png" alt="Logo">
    </center>

    <?php
    // Recuperar os valores preenchidos pelo usuário
    $nome = $_GET['nome'];
    $placa = $_GET['placa'];
    $modelo = $_GET['modelo'];
    $ano = $_GET['ano'];
    $descricoes = $_GET['descricao'];
    $valores = $_GET['valor'];
    $mao = $_GET['mao'];

    // Informações da empresa
    $nomeEmpresa = "Franklin Ribeiro";
    $cpfEmpresa = "099.951.308.74";
    $enderecoEmpresa = "R. Santa Branca, 45 - Vila NairSão José dos Campos - SP, 12231-220";
    $celularEmpresa = "(12) 996510159";
    
    // Data atual
    $dataAtual = date('d/m/Y');

    // Exibir informações da empresa em formato de tabela
    echo '<table>';
    echo '<tr><th colspan="2">INFORMAÇÕES DA EMPRESA</th></tr>';
    echo '<tr><td>Nome:</td><td>' . $nomeEmpresa . '</td></tr>';
    echo '<tr><td>CPF:</td><td>' . $cpfEmpresa . '</td></tr>';
    echo '<tr><td>Endereço:</td><td>' . $enderecoEmpresa . '</td></tr>';
    echo '<tr><td>Celular:</td><td>' . $celularEmpresa . '</td></tr>';
    echo '<tr><td>Data:</td><td>' . $dataAtual . '</td></tr>';
    echo '</table>';
    echo '<br>';

    // Exibir as informações do orçamento em formato de tabela
    echo '<h1>Resumo do Orçamento</h1>';
    echo '<table>';
    echo '<tr><th colspan="2">CLIENTE/AUTOMÓVEL</th></tr>';
    echo '<tr><td>NOME DO CLIENTE:</td><td>' . $nome . '</td></tr>';
    echo '<tr><td>PLACA DO AUTOMÓVEL:</td><td>' . $placa . '</td></tr>';
    echo '<tr><td>MODELO DO AUTOMÓVEL:</td><td>' . $modelo . '</td></tr>';
    echo '<tr><td>ANO DO AUTOMÓVEL:</td><td>' . $ano . '</td></tr>';
    echo '<tr><th colspan="2">SERVIÇOS</th></tr>';
    $totalServicos = 0;
    for ($i = 0; $i < count($descricoes); $i++) {
        echo '<tr><td>DESCRIÇÃO:</td><td>' . $descricoes[$i] . '</td></tr>';
        echo '<tr><td>VALOR:</td><td>' . $valores[$i] . '</td></tr>';
        $totalServicos += floatval($valores[$i]);
    }
    echo '<tr><th colspan="2">MÃO DE OBRA</th></tr>';
    echo '<tr><td>VALOR:</td><td>' . $mao . '</td></tr>';
    $totalGeral = $totalServicos + floatval($mao);
    echo '<tr><th colspan="2">TOTAL</th></tr>';
    echo '<tr><td>TOTAL GERAL:</td><td>' . $totalGeral . '</td></tr>';
    echo '</table>';

    // Botão para fazer o download
    echo '<br>';
    echo '<button onclick="downloadPDF()">Download</button>';

    ?>

    <script>
        function downloadPDF() {
            // Converter o conteúdo da página em uma imagem usando html2canvas
            html2canvas(document.body).then(function(canvas) {
                // Criar um objeto jsPDF
                var doc = new jsPDF();
                var imgData = canvas.toDataURL('image/png');

                // Definir o tamanho do documento como o tamanho da imagem
                var imgWidth = 210; // 210mm para uma página A4
                var pageHeight = imgWidth * canvas.height / canvas.width;
                
                // Adicionar a imagem ao documento PDF
                doc.addImage(imgData, 'PNG', 0, 0, imgWidth, pageHeight);

                // Fazer o download do arquivo PDF
                doc.save('orcamento.pdf');
            });
        }
    </script>
</body>

</html>
