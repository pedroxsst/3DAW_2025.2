<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora em PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md mx-auto bg-white rounded-xl shadow-lg p-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Calculadora PHP</h1>
        
        <?php
            // Inicializa as variáveis para evitar erros
            $num1 = '';
            $num2 = '';
            $operacao = 'soma'; // Valor padrão
            $resultado = '';

            // Verifica se o formulário foi enviado
            if (isset($_POST['calcular'])) {
                // Pega os valores do formulário
                $num1 = $_POST['num1'];
                $num2 = $_POST['num2'];
                $operacao = $_POST['operacao'];

                // Valida se os valores são numéricos
                if (is_numeric($num1) && is_numeric($num2)) {
                    // Realiza o cálculo baseado na operação selecionada
                    switch ($operacao) {
                        case 'soma':
                            $resultado = $num1 + $num2;
                            break;
                        case 'subtracao':
                            $resultado = $num1 - $num2;
                            break;
                        case 'multiplicacao':
                            $resultado = $num1 * $num2;
                            break;
                        case 'divisao':
                            if ($num2 != 0) {
                                $resultado = $num1 / $num2;
                            } else {
                                $resultado = "Erro: Divisão por zero!";
                            }
                            break;
                    }
                } else {
                    $resultado = "Por favor, insira valores numéricos válidos.";
                }
            }
        ?>

        <form action="" method="post" class="space-y-4">
            <div>
                <label for="num1" class="block text-sm font-medium text-gray-700">Primeiro número:</label>
                <input type="text" name="num1" id="num1" value="<?php echo htmlspecialchars($num1); ?>" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="operacao" class="block text-sm font-medium text-gray-700">Operação:</label>
                <select name="operacao" id="operacao" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="soma" <?php if ($operacao == 'soma') echo 'selected'; ?>>Adição (+)</option>
                    <option value="subtracao" <?php if ($operacao == 'subtracao') echo 'selected'; ?>>Subtração (-)</option>
                    <option value="multiplicacao" <?php if ($operacao == 'multiplicacao') echo 'selected'; ?>>Multiplicação (*)</option>
                    <option value="divisao" <?php if ($operacao == 'divisao') echo 'selected'; ?>>Divisão (/)</option>
                </select>
            </div>

            <div>
                <label for="num2" class="block text-sm font-medium text-gray-700">Segundo número:</label>
                <input type="text" name="num2" id="num2" value="<?php echo htmlspecialchars($num2); ?>" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <button type="submit" name="calcular" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Calcular
                </button>
            </div>
        </form>

        <?php
        // Exibe o resultado se ele existir
        if ($resultado !== '') {
            echo '<div class="mt-6 p-4 bg-gray-50 rounded-lg">';
            echo '<h2 class="text-lg font-semibold text-center text-gray-800">Resultado: <span class="text-indigo-600">' . htmlspecialchars($resultado) . '</span></h2>';
            echo '</div>';
        }
        ?>
    </div>

</body>
</html>