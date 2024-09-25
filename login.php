
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Log in</title>
  <style>
    body {
        background: url("isaf.jpg") no-repeat center center fixed; /* Substitua pelo caminho da sua imagem */
        background-size: cover; /* Faz com que a imagem cubra toda a área da tela */
        height: 100vh; /* Define a altura da página como 100% da altura da viewport */
        margin: 0; /* Remove margens padrão */
    }
    .login-box {
        background-color: rgb(128, 128, 128); /* Fundo branco semi-transparente para o formulário */
        padding: 20px; /* Espaçamento interno */
        border-radius: 9px; /* Bordas arredondadas */
        box-shadow: 0 2px 20px black; /* Sombra sutil para destacar o formulário */
        position: absolute; /* Posiciona a caixa de login em relação ao body */
        top: 40%; /* Alinha verticalmente ao centro (ajustável) */
        left: 870px; /* Alinha à esquerda com uma margem de 20 pixels */
        transform: translateY(-50%); /* Ajusta para centralizar verticalmente em relação ao seu ponto de referência */
        height: 400px;}
        
</style>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="views/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="views/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body  >
  
<div class="login-box">
  <div class="login-logo">
    <b>Faça Login</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Entre para iniciar sua sessão</p>

    <form action="App/session.php" method="post">
      <div class="form-grouphas-feedback">
        <input type="text" name="username" class="form-control" placeholder="Nome">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> LEMBRA-ME DO LOGIN
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">ENTRAR</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="views/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="views/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="views/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
