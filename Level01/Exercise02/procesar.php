
<?php

// Crea un formulario HTML con los campos deseados.
// El formulario especifica un documento PHP como acción.
// Los valores del formulario se obtienen mediante variables superglobales.
// Algunos valores se almacenan en variables de sesión.

session_start();

// Obtener los valores del formulario
$name = $_POST["name"]; // é uma variavel Super Global "$_POST" ega dados enviados por formulários
$email = $_POST["email"]; 
$age = $_POST["age"];

if (empty($name)){ // condiçao caso naocoloque oo nome
    echo " Name cannot be empty";
    exit();
}

if (empty($email)){ 
    echo " Email cannot be empty";
    exit();
}
if (empty($age)){ 
    echo " Age cannot be empty";
    exit();
}

// funçao "filter_var($email, FILTER_VALIDATE_EMAIL)" verifica se o conteudo do email é valido
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email.";
    exit();
}

if (!is_numeric($age)) {
    echo "Age must be a number.";
    exit();
}

if (empty($name)) {
    echo "Name cannot be empty.";
    echo '<br><button type="button" onclick="history.back()">Go back</button>';
    exit();
}
// Guardar algunos valores en la sesión
$_SESSION["name"] = $name;
$_SESSION["email"] = $email;

// Mostrar los valores recibidos
echo "<h1>User data</h1>";

echo "<p>Name: " . $name . "</p>";
echo "<p>Email: " . $email . "</p>";
echo "<p>Age: " . $age . "</p>";

echo "<h2>Saved data</h2>";

echo "<p>Name: " . $_SESSION["name"] . "</p>";
echo "<p>Email: " . $_SESSION["email"] . "</p>";

echo '<br>';
echo '<button type="button" onclick="history.back()">Go back</button>';
// add botao para voltar na pagina anterior


//Superglobal | Para que serve cada uma
// $_GET = Pegar dados enviados pela URL 
//$_POST = Pegar dados enviados por formulários 
//$_SESSION = Guardar informações da sessão do usuário 
//$_COOKIE = Guardar/ler pequenos dados no navegador 
//$_SERVER = Informações sobre servidor e requisição 
//$_FILES = Arquivos enviados por formulário 
//$_REQUEST = Pode conter dados de `GET`, `POST` e `COOKIE` |