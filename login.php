<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ACTIVOS-</title>
  <link rel="stylesheet" href="assets/css/style_login.css">
</head>

<body>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!-- Include the above in your HEAD tag -->

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <div class="main">


    <div class="container">
        <center>
            <div id="titulo">
				<h1>MODULO DE ACTIVOS FIJOS</h1>
			</div>
            <div class="middle">
                <div id="login">

                    <form action=<?= $_SERVER['PHP_SELF'];?> method="post" validate="true" id="loginForm">
                    <input type=hidden name=op value="conectar" />

                    <fieldset class="clearfix">

                        <p><span class="fa fa-user"></span><input type="text" name="usuario" Placeholder="Usuario" required></p>
                        <!-- JS because of IE support; better: placeholder="Usuario" -->
                        <p><span class="fa fa-lock"></span><input type="password" name="clave" Placeholder="Clave" required></p>
                        <!-- JS because of IE support; better: placeholder="Clave" -->

                        <div>
                        <!--<span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" href="#">Forgot password?</a></span>-->
                        <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit"
                            value="Ingresar"></span>
                        </div>
                    </fieldset>
                    <div class="clearfix"></div>
                    </form>

                    <div class="clearfix"></div>

                </div> <!-- end login -->
            <div class="logo">
                <img src="assets/img/logo.png" alt="Logo">
                <div class="clearfix"></div>
            </div>

            </div>
        </center>
        <div>
            <!-- PIE DE PÁGINA -->
            <footer id="footer">
                <p>Grupo 2 Ingenieria de Software UMG Portales &copy; <?= date('Y') ?></p>
            </footer>
        </div>
    </div>
  </div>
</body>

</html>
