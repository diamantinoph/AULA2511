<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estações do Ano</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="date"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            margin-bottom: 15px;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 20px;
        }

        .image-container p {
            font-size: 18px;
            margin-top: 10px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistema de Estações do Ano</h1>
        
        <?php
        // Definindo as imagens
        $images = [
            "inverno" => "images/inverno.jpg",
            "primavera" => "images/primavera.jpg",
            "verao" => "images/verao.jpg",
            "outono" => "images/outono.jpg"
        ];

        // Processar o formulário
        $station = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date = $_POST['date'];
            $month = (int)date('m', strtotime($date));
            $day = (int)date('d', strtotime($date));

            if (($month == 12 && $day >= 21) || ($month == 1) || ($month == 2) || ($month == 3 && $day < 21)) {
                $station = 'verao';
            } elseif (($month == 3 && $day >= 21) || ($month == 4) || ($month == 5) || ($month == 6 && $day < 21)) {
                $station = 'outono';
            } elseif (($month == 6 && $day >= 21) || ($month == 7) || ($month == 8) || ($month == 9 && $day < 21)) {
                $station = 'inverno';
            } else {
                $station = 'primavera';
            }
        }
        ?>

        <!-- Formulário -->
        <form action="" method="post">
            <label for="date">Escolha uma data:</label>
            <input type="date" id="date" name="date" required>
            <button type="submit">Ver Estação</button>
        </form>

        <!-- Exibir resultado -->
        <div class="image-container">
            <?php if ($station): ?>
                <img src="<?php echo $images[$station]; ?>" alt="Imagem da estação">
                <p><?php echo ucfirst($station); ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>