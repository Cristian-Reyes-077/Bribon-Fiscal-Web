<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Documents - Inicio de Sesión</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f8f9fa;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            position: relative;
            width: 400px;
            text-align: center;
        }

        .login-button {
            padding: 12px 24px;
            font-size: 18px;
            background: #0056b3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-button:hover {
            background: #003d82;
        }

        .login-form,
        .code-form {
            display: none;
            width: 100%;
            background: white;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .login-form.active,
        .code-form.active {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-form h2,
        .code-form h2 {
            margin-bottom: 15px;
            color: #333;
        }

        .login-form input,
        .code-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-form button,
        .code-form button {
            width: 100%;
            padding: 10px;
            background: #0056b3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-form button:hover,
        .code-form button:hover {
            background: #003d82;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Bienvenido a E-Documents</h1>
        <p>Gestión segura y eficiente de documentos</p>
        <br>
    </div>

    <div class="container">
        <button class="login-button" id="btnIngresar" onclick="showLogin()">Iniciar Sesión</button>
        <div class="login-form" id="loginForm">
            <h2>Iniciar Sesión</h2>
            <input type="text" placeholder="Usuario o Correo">
            <div class="input-group">
    <input class="form-control" type="password" id="password" placeholder="Contraseña" required>
    <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
        <i class="fa fa-eye-slash" id="togglePasswordIcon"></i>
    </span>
</div>


            <button onclick="showCodeForm()">Ingresar</button>
        </div>
        <div class="code-form" id="codeForm">
            <h2>Verificación de Código</h2>
            <input type="text" placeholder="Ingrese el código de 6 dígitos" maxlength="6">
            <button>Verificar</button>
        </div>
    </div>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>

    <script>
        function showLogin() {
            let form = document.getElementById('loginForm');
            form.classList.toggle('active');
            hiddenBtnIngresar();
        }
        function hiddenBtnIngresar() {
            let btnIng = document.getElementById('btnIngresar');
            btnIng.style.display = "none";
        }
        function togglePassword() {
            let passwordInput = document.getElementById('password');
            var toggleIcon = document.getElementById('togglePasswordIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            }
        }
        function showCodeForm() {
            let loginForm = document.getElementById('loginForm');
            let codeForm = document.getElementById('codeForm');
            loginForm.classList.remove('active');
            codeForm.classList.add('active');
        }
    </script>
</body>

</html>
