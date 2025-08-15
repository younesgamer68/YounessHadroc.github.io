<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Function to read user data from CSV
function readUsers()
{
    $users = [];
    if (($handle = fopen("users.csv", "r")) !== FALSE) {
        $headers = fgetcsv($handle);
        while (($data = fgetcsv($handle)) !== FALSE) {
            $users[] = array_combine($headers, $data);
        }
        fclose($handle);
    }
    return $users;
}

// Function to write user data to CSV
function writeUsers($users)
{
    if (($handle = fopen("users.csv", "w")) !== FALSE) {
        fputcsv($handle, ['username', 'password', 'email']);
        foreach ($users as $user) {
            fputcsv($handle, $user);
        }
        fclose($handle);
        return true;
    }
    return false;
}

// Handle form submissions
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = readUsers();
    $current_user_key = null;

    // Find current user in the array
    foreach ($users as $key => $user) {
        if ($user['username'] === $_SESSION['username']) {
            $current_user_key = $key;
            break;
        }
    }

    if ($current_user_key !== null) {
        // Verify current password first (required for all changes)
        if (empty($_POST['current_password'])) {
            $message = "Current password is required to make changes!";
        } elseif (!password_verify($_POST['current_password'], $users[$current_user_key]['password'])) {
            $message = "Current password is incorrect!";
        } else {
            // Current password is correct, proceed with changes

            // Update email if provided
            if (!empty($_POST['email'])) {
                $users[$current_user_key]['email'] = $_POST['email'];
                $_SESSION['email'] = $_POST['email'];
                $message = "Email updated successfully!";
            }

            // Update password if provided
            if (!empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
                if ($_POST['new_password'] === $_POST['confirm_password']) {
                    $users[$current_user_key]['password'] = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
                    $message = "Password updated successfully!";
                } else {
                    $message = "New passwords do not match!";
                }
            }

            // Update username if provided
            if (!empty($_POST['username'])) {
                // Check if username is already taken
                $username_taken = false;
                foreach ($users as $user) {
                    if ($user['username'] === $_POST['username'] && $user['username'] !== $_SESSION['username']) {
                        $username_taken = true;
                        break;
                    }
                }

                if (!$username_taken) {
                    $users[$current_user_key]['username'] = $_POST['username'];
                    $_SESSION['username'] = $_POST['username'];
                    $message = "Username updated successfully!";
                } else {
                    $message = "Username is already taken!";
                }
            }

            // Write changes back to CSV
            writeUsers($users);
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --success-color: #28a745;
            --danger-color: #dc3545;
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
            margin-bottom: 20px;
            transition: var(--transition);
            font-weight: 500;

            font-family: big;
        }

        .go-back i {
            margin-right: 8px;
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
            background-color: #f5f5f5;
            color: var(--dark-color);
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: var(--primary-color);
            margin-bottom: 20px;
            text-align: center;
            font-size: 2rem;
            font-family: big;
        }

        .welcome-message {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-info {
            background: var(--light-color);
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .profile-info p {
            margin-bottom: 10px;
            font-size: 1.1rem;
            font-family: small;
        }

        .profile-info strong {
            color: var(--secondary-color);
        }

        .nav {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 30px;
            font-family: medium;
        }

        .nav a {
            padding: 10px 20px;
            background: var(--danger-color);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .nav a:hover {
            background: #c82333;
            transform: translateY(-2px);
        }

        .edit-form {
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--secondary-color);
            font-family: medium;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            font-family: small;
            transition: border 0.3s ease;
        }

        .form-group input:focus {
            border-color: var(--accent-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 195, 247, 0.2);
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: medium;
        }

        .btn:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        .message {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
            font-family: small;
        }

        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            font-family: small;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            font-family: small;
        }

        .tabs {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            font-family: small;
        }

        .tab {
            padding: 10px 20px;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
            font-family: small;
        }

        .tab.active {
            border-bottom: 3px solid var(--primary-color);
            color: var(--primary-color);
            font-weight: 600;
            font-family: small;
        }

        .tab:hover:not(.active) {
            border-bottom: 3px solid var(--accent-color);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .password-requirements {
            font-size: 0.9rem;
            color: #666;
            margin-top: 5px;
            font-family: small;
        }
    </style>

</head>

<body>
    <div class="container">

        <a href="../home.php" class="go-back">
            <i class="fas fa-arrow-left"></i>
            Back to Gallery
        </a>

        <div class="welcome-message">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        </div>

        <?php if (!empty($message)): ?>
            <div class="message <?php echo strpos($message, 'successfully') !== false ? 'success' : 'error'; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <div class="profile-info">
            <p><strong>Username:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
        </div>

        <div class="tabs">
            <div class="tab active" onclick="openTab('edit-profile')">Edit Profile</div>
            <div class="tab" onclick="openTab('change-password')">Change Password</div>
        </div>

        <div id="edit-profile" class="tab-content active">
            <form class="edit-form" method="POST" action="">
                <div class="form-group">
                    <label for="current_password">Current Password*</label>
                    <input type="password" id="current_password" name="current_password" placeholder="Enter your current password" required>
                </div>

                <div class="form-group">
                    <label for="username">New Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter new username">
                </div>

                <div class="form-group">
                    <label for="email">New Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter new email">
                </div>

                <button type="submit" class="btn">Update Profile</button>
            </form>
        </div>

        <div id="change-password" class="tab-content">
            <form class="edit-form" method="POST" action="">
                <div class="form-group">
                    <label for="current_password_pw">Current Password*</label>
                    <input type="password" id="current_password_pw" name="current_password" placeholder="Enter your current password" required>
                </div>

                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" id="new_password" name="new_password" placeholder="Enter new password">
                    <div class="password-requirements">Minimum 8 characters, at least one letter and one number</div>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm New Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm new password">
                </div>

                <button type="submit" class="btn">Change Password</button>
            </form>
        </div>

        <div class="nav">
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <script>
        function openTab(tabName) {
            // Hide all tab contents
            const tabContents = document.getElementsByClassName('tab-content');
            for (let i = 0; i < tabContents.length; i++) {
                tabContents[i].classList.remove('active');
            }

            // Remove active class from all tabs
            const tabs = document.getElementsByClassName('tab');
            for (let i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove('active');
            }

            // Show the selected tab content and mark tab as active
            document.getElementById(tabName).classList.add('active');
            event.currentTarget.classList.add('active');
        }

        // Password strength validation (optional enhancement)
        document.getElementById('new_password')?.addEventListener('input', function() {
            const password = this.value;
            const requirements = this.nextElementSibling;

            if (password.length > 0) {
                const hasMinLength = password.length >= 8;
                const hasLetter = /[a-zA-Z]/.test(password);
                const hasNumber = /[0-9]/.test(password);

                if (hasMinLength && hasLetter && hasNumber) {
                    requirements.style.color = 'green';
                } else {
                    requirements.style.color = 'red';
                }
            } else {
                requirements.style.color = '#666';
            }
        });
    </script>
</body>

</html>