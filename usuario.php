<?php

require_once("model/conexion.php");
//require_once("Classes/classdml.php");
error_reporting(E_ERROR);
#------------------------------------------------------------------------------------------*
function FrmLogin()
#------------------------------------------------------------------------------------------*
{
global $PARAMETROS;
	$path="http://".$GLOBALS[_SERVER][HTTP_HOST]."/";	
	$anio = date('Y');
	require_once("login.php");
}
#------------------------------------------------------------------------------------------*
function FrmChange()
#------------------------------------------------------------------------------------------*
{
global $PARAMETROS;
    $img = 'http://'.$PARAMETROS['host']."/".$PARAMETROS['logo'];
	$usuario = GetUserName(); 
	require_once("cambio_clave.php");
}


#------------------------------------------------------------------------------------------*
function Conectar(){
#------------------------------------------------------------------------------------------*
global $PARAMETROS,$db,$dbhost,$dbname,$dbuname,$dbpass;
$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuname, $dbpass);
        
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $consulta = $pdo->prepare("SELECT * from $PARAMETROS[dbcorename].usuario where codusr = :usr and clave = :pass");
        $consulta->bindParam(":usr", $_POST['usuario'],PDO::PARAM_STR);
        $consulta->bindParam(":pass", $_POST['clave'],PDO::PARAM_STR);
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
		$consulta->execute();
		
        if ($rs = $consulta->fetch()){
            $USUARIO = $rs;
			$sql = "
					select *, (select codigo from  $PARAMEROS[dbcorename].especificacion where id_especificacion = u.especificacion) codigo
					from   $PARAMEROS[dbcorename].usuario_especificacion u
					where codusr = :usr
			";	
			$consulta2 = $pdo->prepare($sql);
			$consulta2->bindParam(":usr", $_POST['usuario'],PDO::PARAM_STR);
			$consulta2->setFetchMode(PDO::FETCH_ASSOC);
			$consulta2->execute();

			$uclave='';
			
			while ($ESPECS=$consulta2->fetch())
			{
				$USUARIO[$ESPECS[especificacion]] = $ESPECS[valor];
				$USUARIO[$ESPECS[codigo]] = $ESPECS[valor];		
			}	
	
	
	
	session_start();
	$USUARIO['ambiente'] = $_POST[dbname];	
	$_SESSION['usuario'] = $USUARIO;
	$_POST[op]           = 'xx';
	if($USUARIO[modulo]!='')
	{
		$destino = "modulos/$USUARIO[modulo]?_codusr=$USUARIO[codusr]";
	}else
	{
		switch($USUARIO[perfil])
		{
			case "admin":
				$destino = "index.php";
				break;
			default:
				$destino = "modulos/menus/html/menu.html?_codusr=$USUARIO[codusr]";
		}
	}
	//set headers to NOT cache a page
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
	header("Pragma: no-cache"); //HTTP 1.0
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past	
	Header("Location: $destino");
	return 'S';
	die;
}else{
	frmlogin();
	die("<h5 align='center' class='footer-msj' > El usuario <b>$_POST[usuario]</b> no esta registrado o la clave es incorrecta </h5>");
	 
	}
}

function VerificaConexion()
{
	$USUARIO = $_SESSION['usuario'];
	$_POST[op]           = 'xx';
	switch($USUARIO[perfil]){
		case "usuario":
			$destino = "modulos/menus/html/menu.html?_codusr=$USUARIO[codusr]";
			break;
		case "admin":
	    default:
	    	$destino = "index.php";
			
	}
	Header("Location: $destino");
	return 'S';
	die;	
}

#------------------------------------------------------------------------------------------*
function CambiarClave()
#------------------------------------------------------------------------------------------*
{global $PARAMETROS;

	if($_POST[clave]!=$_POST[clave2])
	{
		echo "CLAVES NO COINCIDEN, INTENTE DE NUEVO.";
		FrmChange();
		die;
	}

	# Crea registro de entrega por especifico
	$TABLA = new dml();
	$TABLA->db    			     ="$PARAMETROS[dbcorename]";
	$TABLA->tabla 			     = 'usuario'; 
	$TABLA->DATOS[codusr]       = $_POST[usuario];
	$TABLA->cargar();		
	$TABLA->DATOS[clave] 		 = $_POST[clave];
	$TABLA->grabar();	
	
	$sql = "update $PARAMETROS[dbcorename].usuario set clave = '$_POST[clave]'  where codusr = '$_POST[usuario]' ";
	EjecutaSQL($sql);	
	
}

#------------------------------------------------------------------------------------------*
function Login()
#------------------------------------------------------------------------------------------*
{

switch ($_POST['op'])
{

	case "cambiarclave":
		CambiarClave();
	case "conectar":
		return conectar();		
		break;
	case "change":
		FrmChange();
		break;
	case "logoff":
		    session_unset();  
	default:
		if (!isset($_SESSION['usuario']['codusr'])){
			frmlogin();
			die;		
		}else
		{
			VerificaConexion();		
		}
} 
}

login();
?>
