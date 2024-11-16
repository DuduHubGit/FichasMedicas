<?php
include 'db.php';

$filters = [];
$whereClauses = [];
$erroIdade = ""; // Variável para armazenar a mensagem de erro de idade
$erroData = "";  // Variável para armazenar a mensagem de erro de data

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Filtro por Sexo
    if (isset($_GET['sexo']) && $_GET['sexo'] !== '') {
        $sexo = $_GET['sexo'];
        $whereClauses[] = "sexo = '$sexo'";
    }

    // Filtro por Consultas
    if (isset($_GET['consultas']) && $_GET['consultas'] !== '') {
        $consultas = $_GET['consultas'];
        $whereClauses[] = "consultas = '$consultas'";
    }

    // Filtro por CID
    if (isset($_GET['cid']) && $_GET['cid'] !== '') {
        $cid = $_GET['cid'];
        $whereClauses[] = "cid LIKE '%$cid%'";
    }

    // Filtro por Faixa Etária
    if (isset($_GET['idade_min']) && $_GET['idade_min'] !== '') {
        $idade_min = $_GET['idade_min'];
    }

    if (isset($_GET['idade_max']) && $_GET['idade_max'] !== '') {
        $idade_max = $_GET['idade_max'];
    }

    // Validação de idade mínima e máxima
    if (isset($idade_min) && isset($idade_max) && $idade_min !== '' && $idade_max !== '') {
        if ($idade_min > $idade_max) {
            $erroIdade = "A idade mínima não pode ser maior que a idade máxima.";
        } else {
            $whereClauses[] = "idade >= $idade_min";
            $whereClauses[] = "idade <= $idade_max";
        }
    }

    // Filtro por Data de Registro
    if (isset($_GET['data_inicio']) && $_GET['data_inicio'] !== '') {
        $data_inicio = $_GET['data_inicio'];
    }

    if (isset($_GET['data_fim']) && $_GET['data_fim'] !== '') {
        $data_fim = $_GET['data_fim'];
    }

    // Validação de data inicial e final
    if (isset($data_inicio) && isset($data_fim) && $data_inicio !== '' && $data_fim !== '') {
        if ($data_inicio > $data_fim) {
            $erroData = "A data inicial não pode ser maior que a data final.";
        } else {
            $whereClauses[] = "data_registro >= '$data_inicio'";
            $whereClauses[] = "data_registro <= '$data_fim'";
        }
    }

    // Se não houver erro, executa a query
    if (empty($erroIdade) && empty($erroData)) {
        $sql = "SELECT * FROM fichas";
        if (count($whereClauses) > 0) {
            $sql .= " WHERE " . implode(" AND ", $whereClauses);
        }

        // Executa a query
        $result = $conn->query($sql);
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Relatório de Fichas Médicas</title>
</head>
<body>
    <header>
    <div class="btn-voltar">
        <a href="index.php"><i class="fas fa-arrow-left"></i> Voltar para o Início</a>
    </div>
        <div class="header-container">
            <h1><i class="fas fa-file-alt"></i> Relatório de Fichas Médicas</h1>
        </div>
    </header>

    <main>
        <section class="form-section">
            <h2>Filtrar Fichas Médicas</h2>

            <!-- Exibe a mensagem de erro se a idade mínima for maior que a idade máxima -->
            <?php if (!empty($erroIdade)): ?>
                <div class="mensagem erro">
                    <?php echo $erroIdade; ?>
                </div>
            <?php endif; ?>

            <!-- Exibe a mensagem de erro se a data inicial for maior que a data final -->
            <?php if (!empty($erroData)): ?>
                <div class="mensagem erro">
                    <?php echo $erroData; ?>
                </div>
            <?php endif; ?>

            <form method="GET" action="relatorio.php">
                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo">
                    <option value="">Todos</option>
                    <option value="Masculino" <?php if(isset($_GET['sexo']) && $_GET['sexo'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
                    <option value="Feminino" <?php if(isset($_GET['sexo']) && $_GET['sexo'] == 'Feminino') echo 'selected'; ?>>Feminino</option>
                </select>

                <label for="consultas">Consultas:</label>
                <select id="consultas" name="consultas">
                    <option value="">Todos</option>
                    <option value="presente" <?php if(isset($_GET['consultas']) && $_GET['consultas'] == 'presente') echo 'selected'; ?>>Presente</option>
                    <option value="ausente" <?php if(isset($_GET['consultas']) && $_GET['consultas'] == 'ausente') echo 'selected'; ?>>Ausente</option>
                </select>
                
                <label for="cid">CID:</label>
                <input type="text" id="cid" name="cid" value="<?php if(isset($_GET['cid'])) echo $_GET['cid']; ?>">

                <label for="idade_min">Idade Mínima:</label>
                <input type="number" id="idade_min" name="idade_min" min="0" value="<?php if(isset($_GET['idade_min'])) echo $_GET['idade_min']; ?>">

                <label for="idade_max">Idade Máxima:</label>
                <input type="number" id="idade_max" name="idade_max" min="0" value="<?php if(isset($_GET['idade_max'])) echo $_GET['idade_max']; ?>">

                <label for="data_inicio">Data Início:</label>
                <input type="date" id="data_inicio" name="data_inicio" value="<?php if(isset($_GET['data_inicio'])) echo $_GET['data_inicio']; ?>">

                <label for="data_fim">Data Fim:</label>
                <input type="date" id="data_fim" name="data_fim" value="<?php if(isset($_GET['data_fim'])) echo $_GET['data_fim']; ?>">

                <input type="submit" value="Filtrar">
            </form>
        </section>

        <?php if (empty($erroIdade) && empty($erroData)): ?>
        <section class="table-section">
            <h2>Resultados</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Idade</th>
                        <th>Sexo</th>
                        <th>CID</th>
                        <th>Tipo Atendimento</th>
                        <th>Consultas</th>
                        <th>Data de Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($result)) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['idade']}</td>
                                        <td>{$row['sexo']}</td>
                                        <td>{$row['cid']}</td>
                                        <td>{$row['tipo_atendimento']}</td>
                                        <td>{$row['consultas']}</td>
                                        <td>" . (new DateTime($row['data_registro'], new DateTimeZone('UTC')))->setTimezone(new DateTimeZone('America/Sao_Paulo'))->format('Y-m-d') . "</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>Nenhum resultado encontrado.</td></tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <?php endif; ?>
    </main>
    <footer>
    <p>&copy; 2024 Sistema de Gerenciamento de Fichas Médicas</p>
    <div class="logo-container">
        <img src="logo.png" alt="Logo do Sistema" class="footer-logo">
    </div>
</footer>
