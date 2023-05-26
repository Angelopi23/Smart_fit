<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function isEmail($email)
{
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return true;
	} else {
		return false;
	}
}

function validaPassword($var1, $var2)
{
	if (strcmp($var1, $var2) !== 0) {
		return false;
	} else {
		return true;
	}
}

function usuarioExiste($usuario)
{
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT id FROM usuarios WHERE usuario = ? LIMIT 1");
	$stmt->bind_param("s", $usuario);
	$stmt->execute();
	$stmt->store_result();
	$num = $stmt->num_rows;
	$stmt->close();

	if ($num > 0) {
		return true;
	} else {
		return false;
	}
}

function emailExiste($email)
{
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT id FROM usuario WHERE email = ? LIMIT 1");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$stmt->store_result();
	$num = $stmt->num_rows;
	$stmt->close();

	if ($num > 0) {
		return true;
	} else {
		return false;
	}
}

function generateToken()
{
	$gen = md5(uniqid(mt_rand(), false));
	return $gen;
}

function hashPassword($password)
{
	$hash = password_hash($password, PASSWORD_DEFAULT);
	return $hash;
}

function resultBlock($errors)
{
	if (count($errors) > 0) {

		foreach ($errors as $error) {
			echo "<li>" . $error . "</li>";
		}
	}
}



function enviarEmail($email, $nombre, $asunto, $cuerpo)
{


	require dirname(__DIR__).'/login/PHPMailer/Exception.php';
	require dirname(__DIR__).'/login/PHPMailer/PHPMailer.php';
	require dirname(__DIR__).'/login/PHPMailer/SMTP.php';


	//Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true);

	try{
		//Server settings
		$mail->SMTPDebug = SMTP::DEBUG_OFF; //Enable verbose debug output
		$mail->isSMTP(); //Send using SMTP
		$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
		$mail->SMTPAuth = true; //Enable SMTP authentication
		$mail->Username = 'soporte.smart12@gmail.com'; //SMTP username
		$mail->Password = 'ktkwiaxnxtepckbp'; //SMTP password
		$mail->SMTPSecure =  'ssl'; //Enable implicit TLS encryption
		$mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom('soporte.smart12@gmail.com', 'Soporte - Smart Fit');
		$mail->addAddress($email, $nombre); //Add a recipient

		//Content
		$mail->isHTML(true); //Set email format to HTML
		$mail->Subject = $asunto;
		$mail->Body = $cuerpo;


		if ($mail->send())
			return true;
		else
			return false;
	}catch(Exception $e){
		echo $mail->ErrorInfo;
		return false;
	}

}



function generaTokenPass($user_id)
{
	global $mysqli;

	$token = generateToken();

	$stmt = $mysqli->prepare("UPDATE usuario SET token_password=?, password_request=1 WHERE id = ?");
	$stmt->bind_param('ss', $token, $user_id);
	$stmt->execute();
	$stmt->close();

	return $token;
}

function getValor($campo, $campoWhere, $valor)
{
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT $campo FROM usuario WHERE $campoWhere = ? LIMIT 1");
	$stmt->bind_param('s', $valor);
	$stmt->execute();
	$stmt->store_result();
	$num = $stmt->num_rows;

	if ($num > 0) {
		$stmt->bind_result($campo);
		$stmt->fetch();
		return $campo;
	} else {
		return null;
	}
}



function cambiaPassword($password, $user_id, $token)
{

	global $mysqli;

	$stmt = $mysqli->prepare("UPDATE usuario SET contraseña=?, token_password='', password_request=0 WHERE id = ? AND token_password = ?");
	$stmt->bind_param('sis', $password, $user_id, $token);

	if ($stmt->execute()) {
		return true;
	} else {
		return false;
	}
}

?>