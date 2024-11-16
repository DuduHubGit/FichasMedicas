<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Gerenciamento de Fichas Médicas</title>
</head>
<body>
    <header>
        <div class="header-container">
            <h1><i class="fas fa-notes-medical"></i> Sistema de Gerenciamento de Fichas Médicas</h1>
            <p>Gerencie fichas médicas de maneira fácil e eficiente.</p>
        </div>
    </header>

    <main>
        <section class="intro">
            <h2>O que você deseja fazer?</h2>
            <div class="card-container">
                <a href="adicionar.php" class="card">
                    <i class="fas fa-user-plus"></i>
                    <h3>Adicionar Ficha Médica</h3>
                    <p>Cadastre novas fichas médicas no sistema.</p>
                </a>
                <a href="relatorio.php" class="card">
                    <i class="fas fa-file-alt"></i>
                    <h3>Emitir Relatório</h3>
                    <p>Visualize e filtre fichas médicas existentes.</p>
                </a>
            </div>
        </section>
    </main>

    <footer>
    <p>&copy; 2024 Sistema de Gerenciamento de Fichas Médicas</p>
    <div class="logo-container">
        <img src="logo.png" alt="Logo do Sistema" class="footer-logo">
    </div>
</footer>
</body>
</html>