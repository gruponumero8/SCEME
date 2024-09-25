<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página com Imagem de Fundo</title>
    <style>
        body {
            margin: 0; /* Remove margens padrão */
            padding: 0; /* Remove preenchimento padrão */
            height: 100vh; /* Define a altura da página para 100% da altura da janela */
            background-image: url("LOG.png"); /* Substitua pelo caminho da sua imagem */
            background-size: cover; /* Faz a imagem cobrir toda a tela */
            background-position: center; /* Centraliza a imagem */
            background-repeat: no-repeat; /* Não repete a imagem */
            font-family: Arial, sans-serif;
            color: #fff; /* Cor do texto em branco para melhor contraste */
            text-align: center; /* Centraliza o texto */
            display: flex; /* Usando flexbox para centralizar o conteúdo */
            flex-direction: column; /* Alinha os itens em coluna */
            justify-content: center; /* Centraliza verticalmente */
            position: relative; /* Permite posicionar o botão em relação ao corpo */
        }
        h1 {
            color: #ffcc00; /* Cor do título */
        }
        .login-button {
            position: absolute; /* Posiciona o botão em relação ao corpo */
            top: 56%; /* Centraliza verticalmente na página */
            left:  940px; /* Distância do lado direito */
            padding: 10px 20px; /* Espaçamento interno do botão */
            font-size: 30px; /* Tamanho da fonte do botão */
            color: #fff; /* Cor do texto do botão */
            background-color: #007bff; /* Cor de fundo do botão (azul) */
            border: none; /* Remove bordas padrão */
            border-radius: 5px; /* Arredonda os cantos do botão */
            cursor: pointer; /* Muda o cursor ao passar sobre o botão */
            transition: background-color 0.3s ease; /* Efeito de transição para a cor de fundo */
        }
        .login-button:hover {
            background-color: #0056b3; /* Cor do botão ao passar o mouse (azul escuro) */
        }
    </style>
</head>
<body>

    

    <!-- Botão de Login -->
   <h1><a href="login.php" class="login-button">Login</a> </h1> 
</body>
</html>