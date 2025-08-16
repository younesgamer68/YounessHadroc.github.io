<?php
session_start();
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate inputs
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = 'All fields are required.';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters long.';
    } else {
        // Check if user already exists
        $users = file('users.csv', FILE_IGNORE_NEW_LINES);
        $userExists = false;

        foreach ($users as $user) {
            $userData = str_getcsv($user);
            if ($userData[0] === $username || $userData[2] === $email) {
                $userExists = true;
                break;
            }
        }

        if ($userExists) {
            $error = 'Username or email already exists.';
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Add user to CSV
            $file = fopen('users.csv', 'a');
            fputcsv($file, [$username, $hashedPassword, $email]);
            fclose($file);

            $success = 'Registration successful! You can now login.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!--Fonts -->
    <style>
        @font-face {
            font-family: title_texte;
            src: url(/Project_do_stage/Assets/Fonts/Anja\ Eliane\ accent002.ttf)
        }

        @font-face {
            font-family: big;
            src: url(/Project_do_stage/Assets/Fonts/Heavitas.ttf)
        }

        @font-face {
            font-family: medium;
            src: url(/Project_do_stage/Assets/Fonts/Coolvetica\ Rg.otf)
        }

        @font-face {
            font-family: small;
            src: url(/Project_do_stage/Assets/Fonts/ComicNeueSansID.ttf)
        }
    </style>


    <style>
        :root {
            --primary-color: #b5985a;
            --secondary-color: #24262b;
            --accent-color: #ffdd92ff;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --light-bg: #f8f9fa;
            --border-radius: 8px;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --success-color: #28a745;
            --success-bg: #d4edda;
            --success-border: #c3e6cb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .go-back {
            display: inline-flex;
            align-items: center;
            color: #b5985a;
            text-decoration: none;
            margin-bottom: 30px;
            transition: var(--transition);
            font-weight: 500;
            font-family: big;
        }

        .go-back i {
            margin-right: 85px;
            transition: var(--transition);
        }

        .go-back:hover {
            color: var(--secondary-color);
            transform: translateX(-3px);
        }

        .go-back:hover i {
            transform: translateX(-3px);
        }

        body {
            background: linear-gradient(135deg, var(--light-bg) 0%, #e9ecef 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: var(--secondary-color);
        }

        .container {
            width: 100%;
            max-width: 450px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 40px;
            position: relative;
            overflow: hidden;
            animation: fadeIn 0.6s ease-out;
            transform-style: preserve-3d;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            color: var(--secondary-color);
            position: relative;
            padding-bottom: 15px;
            font-family: big;
            font-weight: 500;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }

        .error {
            color: #dc3545;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 12px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            text-align: center;
            animation: shake 0.5s ease-in-out;
            font-family: small;
        }

        .success {
            color: var(--success-color);
            background-color: var(--success-bg);
            border: 1px solid var(--success-border);
            padding: 12px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            text-align: center;
            animation: fadeIn 0.5s ease-out;
            font-family: small;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            20%,
            60% {
                transform: translateX(-5px);
            }

            40%,
            80% {
                transform: translateX(5px);
            }
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--secondary-color);
            font-family: medium;
        }

        .form-group input {
            width: 100%;
            padding: 14px 15px;
            border: 2px solid #e9ecef;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
            font-family: small;
            background-color: #f8f9fa;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(181, 152, 90, 0.2);
            background-color: white;
        }

        .form-group i {
            position: absolute;
            right: 15px;
            top: 42px;
            color: var(--primary-color);
            opacity: 0.7;
        }

        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 10px;
            font-family: medium;
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(181, 152, 90, 0.3);
        }

        .nav {
            text-align: center;
            margin-top: 25px;
            font-size: 0.95rem;
            font-family: small;
        }

        .nav a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            display: inline-block;
            position: relative;
            font-family: small;
        }

        .nav a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: var(--transition);
        }

        .nav a:hover::after {
            width: 100%;
        }

        .decoration {
            position: absolute;
            opacity: 0.1;
            z-index: -1;
        }

        .decoration-1 {
            top: -50px;
            right: -50px;
            font-size: 200px;
            color: var(--primary-color);
            animation: floating 4s ease-in-out infinite;
        }

        .decoration-2 {
            bottom: -30px;
            left: -30px;
            font-size: 150px;
            color: var(--accent-color);
            animation: floating 5s ease-in-out infinite 1s;
        }

        @keyframes floating {
            0% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }

            100% {
                transform: translateY(0) rotate(0deg);
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
            }

            h2 {
                font-size: 1.8rem;
            }

            .decoration-1,
            .decoration-2 {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="../index.php" class="go-back">
            <i class="fas fa-arrow-left"></i>
            Back to Gallery
        </a>

        <i class="fas fa-circle decoration decoration-1"></i>
        <i class="fas fa-circle decoration decoration-2"></i>

        <h2>EYE WEAR Register</h2>
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form method="post" action="register.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <i class="fas fa-user"></i>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <i class="fas fa-envelope"></i>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <i class="fas fa-lock"></i>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <i class="fas fa-lock"></i>
            </div>
            <button type="submit">Register</button>
        </form>

        <div class="nav">
            <a href="login.php">Already have an account? Login</a>
        </div>
    </div>
</body>

</html>