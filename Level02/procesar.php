
<?php

// Crea un formulario HTML con los campos deseados.
// El formulario especifica un documento PHP como acción.
// Los valores del formulario se obtienen mediante variables superglobales.
// Algunos valores se almacenan en variables de sesión.

require_once "EmptyFieldException.php";
require_once "InvalidEmailException.php";
require_once "InvalidAgeException.php";

session_start();

// Obtener los valores del formulario
$name = $_POST["name"]; // é uma variavel Super Global "$_POST" ega dados enviados por formulários
$email = $_POST["email"]; 
$age = $_POST["age"];

try {

if (empty($name)) {
    throw new EmptyFieldException("Name cannot be empty.");
}


if (empty($email)){ 
    throw new EmptyFieldException("Email cannot be empty");
}

// funçao "filter_var($email, FILTER_VALIDATE_EMAIL)" verifica se o conteudo do email é valido
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    throw new InvalidEmailException("Invalid email.");

}

if (empty($age)){ 
    throw new EmptyFieldException(" Age cannot be empty");
    
}


if (!is_numeric($age)) {
    throw new InvalidAgeException("Age must be a number.");
    exit();
}


// Guardar valores na sessao
$_SESSION["name"] = $name;
$_SESSION["email"] = $email; 

// Mostra os valores recebidos
echo "<h1>User data</h1>";

echo "<p>Name: " . $name . "</p>";
echo "<p>Email: " . $email . "</p>";
echo "<p>Age: " . $age . "</p>";

echo "<h2>Saved data</h2>";

echo "<p>Name: " . $_SESSION["name"] . "</p>";
echo "<p>Email: " . $_SESSION["email"] . "</p>";

echo '<br>';
echo '<button type="button" onclick="history.back()">Go back</button>';
} 

// add botao para voltar na pagina anterior
catch (EmptyFieldException $e) {

    echo "<h2>Validation error</h2>";
    echo "<p>" . $e->getMessage() . "</p>";
    echo '<button type="button" onclick="history.back()">Go back</button>';
} 

catch (InvalidEmailException $e) {

    echo "<h2>Validation error</h2>";
    echo "<p>" . $e->getMessage() . "</p>";
    echo '<button type="button" onclick="history.back()">Go back</button>';
}

catch (InvalidAgeException $e) {

    echo "<h2>Validation error</h2>";
    echo "<p>" . $e->getMessage() . "</p>";
 
   echo '<button type="button" onclick="history.back()">Go back</button>';

}


//Superglobal | Para que serve cada uma
// $_GET = Pegar dados enviados pela URL 
//$_POST = Pegar dados enviados por formulários 
//$_SESSION = Guardar informações da sessão do usuário 
//$_COOKIE = Guardar/ler pequenos dados no navegador 
//$_SERVER = Informações sobre servidor e requisição 
//$_FILES = Arquivos enviados por formulário 
//$_REQUEST = Pode conter dados de `GET`, `POST` e `COOKIE` 



//**** En este ejercicio, añadí un botón de retroceso por si hubiera algún error al rellenar el formulario.****
