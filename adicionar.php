<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $sexo = $_POST['sexo'];
    $cid = $_POST['cid'];
    $tipo_atendimento = $_POST['tipo_atendimento'];
    $consultas = $_POST['consultas'];
    $data_registro = date('Y-m-d');

    $sql = "INSERT INTO fichas (nome, idade, sexo, cid, tipo_atendimento, consultas, data_registro)
            VALUES ('$nome', '$idade', '$sexo', '$cid', '$tipo_atendimento', '$consultas', '$data_registro')";

    if ($conn->query($sql) === TRUE) {
        $mensagem = "Ficha adicionada com sucesso!";
    } else {
        $mensagem = "Erro: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Adicionar Ficha Médica</title>
</head>
<body>
    <header>
    <div class="btn-voltar">
    <a href="index.php"><i class="fas fa-arrow-left"></i> Voltar para o Início</a>
</div>
        <div class="header-container">
            <h1><i class="fas fa-user-plus"></i> Adicionar Ficha Médica</h1>
        </div>
    </header>

    <main>
        <section class="form-section">
            <?php if (isset($mensagem)): ?>
                <p class="mensagem"><?php echo $mensagem; ?></p>
            <?php endif; ?>

            <form method="POST" action="adicionar.php">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="idade">Idade:</label>
                <input type="number" id="idade" name="idade" required>

                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select>

                <label for="cid">CID:</label>
<select id="cid" name="cid">
    <option value="">Todos</option>

    <!-- F00-F09 – Transtornos mentais orgânicos, inclusive os sintomáticos -->
    <optgroup label="F00-F09 – Transtornos mentais orgânicos, inclusive os sintomáticos">
        <option value="F00" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F00') echo 'selected'; ?>>F00 – Demência na Doença de Alzheimer</option>
        <option value="F01" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F01') echo 'selected'; ?>>F01 – Demência Vascular</option>
        <option value="F02" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F02') echo 'selected'; ?>>F02 – Demência em Outras Doenças Classificadas em Outra Parte</option>
        <option value="F03" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F03') echo 'selected'; ?>>F03 – Demência Não Especificada</option>
        <option value="F04" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F04') echo 'selected'; ?>>F04 – Síndrome Amnésica Orgânica Não Induzida Pelo Álcool ou Outras Substâncias</option>
        <option value="F05" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F05') echo 'selected'; ?>>F05 – Delirium Não Induzido Pelo Álcool ou Outras Substâncias</option>
        <option value="F06" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F06') echo 'selected'; ?>>F06 – Outros Transtornos Mentais Devidos a Lesão e Doença Física</option>
        <option value="F07" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F07') echo 'selected'; ?>>F07 – Transtornos de Personalidade Devidos a Doença Cerebral</option>
        <option value="F09" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F09') echo 'selected'; ?>>F09 – Transtorno Mental Orgânico Não Especificado</option>
    </optgroup>

    <!-- F10-F19 – Transtornos mentais e comportamentais devidos ao uso de substância psicoativa -->
    <optgroup label="F10-F19 – Transtornos mentais e comportamentais devidos ao uso de substância psicoativa">
        <option value="F10" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F10') echo 'selected'; ?>>F10 – Transtornos Mentais Devidos ao Uso de Álcool</option>
        <option value="F11" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F11') echo 'selected'; ?>>F11 – Transtornos Mentais Devidos ao Uso de Opiáceos</option>
        <option value="F12" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F12') echo 'selected'; ?>>F12 – Transtornos Mentais Devidos ao Uso de Canabinóides</option>
        <option value="F13" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F13') echo 'selected'; ?>>F13 – Transtornos Mentais Devidos ao Uso de Sedativos e Hipnóticos</option>
        <option value="F14" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F14') echo 'selected'; ?>>F14 – Transtornos Mentais Devidos ao Uso da Cocaína</option>
        <option value="F15" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F15') echo 'selected'; ?>>F15 – Transtornos Mentais Devidos ao Uso de Estimulantes, Inclusive Cafeína</option>
        <option value="F16" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F16') echo 'selected'; ?>>F16 – Transtornos Mentais Devidos ao Uso de Alucinógenos</option>
        <option value="F17" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F17') echo 'selected'; ?>>F17 – Transtornos Mentais Devidos ao Uso de Fumo</option>
        <option value="F18" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F18') echo 'selected'; ?>>F18 – Transtornos Mentais Devidos ao Uso de Solventes Voláteis</option>
        <option value="F19" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F19') echo 'selected'; ?>>F19 – Transtornos Mentais Devidos ao Uso de Múltiplas Drogas</option>
    </optgroup>

    <!-- F20-F29 – Esquizofrenia, transtornos esquizotípicos e transtornos delirantes -->
    <optgroup label="F20-F29 – Esquizofrenia, transtornos esquizotípicos e transtornos delirantes">
        <option value="F20" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F20') echo 'selected'; ?>>F20 – Esquizofrenia</option>
        <option value="F21" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F21') echo 'selected'; ?>>F21 – Transtorno Esquizotípico</option>
        <option value="F22" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F22') echo 'selected'; ?>>F22 – Transtornos Delirantes Persistentes</option>
        <option value="F23" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F23') echo 'selected'; ?>>F23 – Transtornos Psicóticos Agudos e Transitórios</option>
        <option value="F24" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F24') echo 'selected'; ?>>F24 – Transtorno Delirante Induzido</option>
        <option value="F25" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F25') echo 'selected'; ?>>F25 – Transtornos Esquizoafetivos</option>
        <option value="F28" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F28') echo 'selected'; ?>>F28 – Outros Transtornos Psicóticos Não-orgânicos</option>
        <option value="F29" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F29') echo 'selected'; ?>>F29 – Psicose Não-orgânica Não Especificada</option>
    </optgroup>

    <!-- F30-F39 – Transtornos do humor [afetivos] -->
    <optgroup label="F30-F39 – Transtornos do humor [afetivos]">
        <option value="F30" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F30') echo 'selected'; ?>>F30 – Episódio Maníaco</option>
        <option value="F31" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F31') echo 'selected'; ?>>F31 – Transtorno Afetivo Bipolar</option>
        <option value="F32" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F32') echo 'selected'; ?>>F32 – Episódios Depressivos</option>
        <option value="F33" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F33') echo 'selected'; ?>>F33 – Transtorno Depressivo Recorrente</option>
        <option value="F34" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F34') echo 'selected'; ?>>F34 – Transtornos de Humor Persistentes</option>
        <option value="F38" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F38') echo 'selected'; ?>>F38 – Outros Transtornos do Humor</option>
        <option value="F39" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F39') echo 'selected'; ?>>F39 – Transtorno do Humor Não Especificado</option>
    </optgroup>

    <!-- F40-F48 – Transtornos neuróticos, transtornos relacionados com o estresse e transtornos somatoformes -->
    <optgroup label="F40-F48 – Transtornos neuróticos, transtornos relacionados com o estresse e transtornos somatoformes">
        <option value="F40" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F40') echo 'selected'; ?>>F40 – Transtornos Fóbico-ansiosos</option>
        <option value="F41" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F41') echo 'selected'; ?>>F41 – Outros Transtornos Ansiosos</option>
        <option value="F42" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F42') echo 'selected'; ?>>F42 – Transtorno Obsessivo-compulsivo</option>
        <option value="F43" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F43') echo 'selected'; ?>>F43 – Reações ao “stress” Grave e Transtornos de Adaptação</option>
        <option value="F44" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F44') echo 'selected'; ?>>F44 – Transtornos Dissociativos (de Conversão)</option>
        <option value="F45" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F45') echo 'selected'; ?>>F45 – Transtornos Somatoformes</option>
        <option value="F48" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F48') echo 'selected'; ?>>F48 – Outros Transtornos Neuróticos</option>
    </optgroup>

    <!-- F50-F59 – Síndromes comportamentais associadas a disfunções fisiológicas e a fatores físicos -->
    <optgroup label="F50-F59 – Síndromes comportamentais associadas a disfunções fisiológicas e a fatores físicos">
        <option value="F50" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F50') echo 'selected'; ?>>F50 – Transtornos da Alimentação</option>
        <option value="F51" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F51') echo 'selected'; ?>>F51 – Transtornos Não-orgânicos do Sono</option>
        <option value="F52" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F52') echo 'selected'; ?>>F52 – Disfunção Sexual Não Orgânica</option>
        <option value="F53" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F53') echo 'selected'; ?>>F53 – Transtornos Associados ao Puerpério</option>
        <option value="F54" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F54') echo 'selected'; ?>>F54 – Fatores Psicológicos Associados a Doença</option>
        <option value="F55" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F55') echo 'selected'; ?>>F55 – Abuso de Substâncias Não Dependentes</option>
        <option value="F59" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F59') echo 'selected'; ?>>F59 – Síndromes Comportamentais Não Especificadas</option>
    </optgroup>

    <!-- F60-F69 – Distorções da personalidade e do comportamento adulto -->
    <optgroup label="F60-F69 – Distorções da personalidade e do comportamento adulto">
        <option value="F60" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F60') echo 'selected'; ?>>F60 – Transtornos Específicos da Personalidade</option>
        <option value="F61" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F61') echo 'selected'; ?>>F61 – Transtornos Mistos da Personalidade</option>
        <option value="F62" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F62') echo 'selected'; ?>>F62 – Modificações Duradouras da Personalidade</option>
        <option value="F63" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F63') echo 'selected'; ?>>F63 – Transtornos dos Hábitos e dos Impulsos</option>
        <option value="F64" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F64') echo 'selected'; ?>>F64 – Transtornos da Identidade Sexual</option>
        <option value="F65" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F65') echo 'selected'; ?>>F65 – Transtornos da Preferência Sexual</option>
        <option value="F66" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F66') echo 'selected'; ?>>F66 – Transtornos Associados ao Desenvolvimento Sexual</option>
        <option value="F68" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F68') echo 'selected'; ?>>F68 – Outros Transtornos da Personalidade</option>
        <option value="F69" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F69') echo 'selected'; ?>>F69 – Transtorno da Personalidade Não Especificado</option>
    </optgroup>

    <!-- F70-F79 – Retardo mental -->
    <optgroup label="F70-F79 – Retardo mental">
        <option value="F70" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F70') echo 'selected'; ?>>F70 – Retardo Mental Leve</option>
        <option value="F71" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F71') echo 'selected'; ?>>F71 – Retardo Mental Moderado</option>
        <option value="F72" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F72') echo 'selected'; ?>>F72 – Retardo Mental Grave</option>
        <option value="F73" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F73') echo 'selected'; ?>>F73 – Retardo Mental Profundo</option>
        <option value="F78" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F78') echo 'selected'; ?>>F78 – Outro Retardo Mental</option>
        <option value="F79" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F79') echo 'selected'; ?>>F79 – Retardo Mental Não Especificado</option>
    </optgroup>

    <!-- F80-F89 – Transtornos do desenvolvimento psicológico -->
    <optgroup label="F80-F89 – Transtornos do desenvolvimento psicológico">
        <option value="F80" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F80') echo 'selected'; ?>>F80 – Transtornos Específicos do Desenvolvimento da Fala</option>
        <option value="F81" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F81') echo 'selected'; ?>>F81 – Transtornos Específicos do Desenvolvimento Escolar</option>
        <option value="F82" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F82') echo 'selected'; ?>>F82 – Transtorno Específico do Desenvolvimento Motor</option>
        <option value="F83" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F83') echo 'selected'; ?>>F83 – Transtornos Específicos Misto do Desenvolvimento</option>
        <option value="F84" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F84') echo 'selected'; ?>>F84 – Transtornos Globais do Desenvolvimento</option>
        <option value="F88" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F88') echo 'selected'; ?>>F88 – Outros Transtornos do Desenvolvimento Psicológico</option>
        <option value="F89" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F89') echo 'selected'; ?>>F89 – Transtorno do Desenvolvimento Psicológico Não Especificado</option>
    </optgroup>

    <!-- F90-F98 – Transtornos do comportamento e transtornos emocionais durante a infância -->
    <optgroup label="F90-F98 – Transtornos do comportamento e transtornos emocionais durante a infância">
        <option value="F90" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F90') echo 'selected'; ?>>F90 – Transtornos Hipercinéticos</option>
        <option value="F91" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F91') echo 'selected'; ?>>F91 – Distúrbios de Conduta</option>
        <option value="F92" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F92') echo 'selected'; ?>>F92 – Transtornos Mistos de Conduta</option>
        <option value="F93" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F93') echo 'selected'; ?>>F93 – Transtornos Emocionais na Infância</option>
        <option value="F94" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F94') echo 'selected'; ?>>F94 – Transtornos do Funcionamento Social</option>
        <option value="F95" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F95') echo 'selected'; ?>>F95 – Tiques</option>
        <option value="F98" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F98') echo 'selected'; ?>>F98 – Outros Transtornos Comportamentais na Infância</option>
    </optgroup>

    <!-- F99 – Transtorno mental não especificado -->
    <optgroup label="F99 – Transtorno mental não especificado">
        <option value="F99" <?php if(isset($_GET['cid']) && $_GET['cid'] == 'F99') echo 'selected'; ?>>F99 – Transtorno Mental Não Especificado</option>
    </optgroup>
</select>
                <label for="tipo_atendimento">Tipo de Atendimento:</label>
                <input type="text" id="tipo_atendimento" name="tipo_atendimento" required>

                <label for="consultas">Consultas:</label>
                <select id="consultas" name="consultas" required>
                    <option value="presente">Presente</option>
                    <option value="ausente">Ausente</option>
                </select>

                <input type="submit" value="Adicionar Ficha">
            </form>
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