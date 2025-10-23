<?php

session_start();
require_once 'db_config.php';

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $password2 = $_POST['password2'] ?? '';

    // prosta walidacja
    if (strlen($username) < 3) $errors[] = "Nazwa użytkownika musi mieć conajmniej 3 znaki.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Podaj poprawny e-mail.";
    if (strlen($password) < 6) $errors[] = "Hasło musi mieć co najmniej 6 znaków.";
    if ($password !== $password2) $errors[] = "Hasła się nie zgadzają.";

    if (empty($errors)) {
        // sprawdź czy email/username już istnieje
        $stmt = $mysqli->prepare("SELECT id FROM users WHERE username = ? OR email = ? LIMIT 1");
        $stmt->bind_param('ss', $username, $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $errors[] = "Użytkownik z takim loginem lub e-mailem już istnieje.";
        } else {
            // hashuj hasło
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $ins = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $ins->bind_param('sss', $username, $email, $hash);
            if ($ins->execute()) {
                $_SESSION['user_id'] = $ins->insert_id;
                $_SESSION['username'] = $username;
                header('Location: dashboard.php');
                exit;
            } else {
                $errors[] = "Coś poszło nie tak przy zapisie do bazy.";
            }
        }

        $stmt->close();
    }
}
?>
<!doctype html>
<html lang="pl">
<head>
<meta charset="utf-8">
<title>Rejestracja — goetel</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<style>
body{font-family:Arial, sans-serif; background:#f4f4f4; padding:20px}
.box{max-width:420px;margin:40px auto;background:#fff;padding:20px;border-radius:8px;box-shadow:0 6px 18px rgba(0,0,0,0.08)}
input{width:100%;padding:10px;margin:8px 0;border:1px solid #ddd;border-radius:4px}
button{padding:10px 16px;border:none;border-radius:6px;cursor:pointer}
.err{background:#ffe6e6;padding:10px;margin-bottom:10px;border-left:4px solid #ff4d4d}
.success{background:#e6ffe6;padding:10px;margin-bottom:10px;border-left:4px solid #36b37e}
small{color:#666}
</style>
</head>
<body>
<div class="box">
  <h2>Rejestracja konta</h2>

  <?php if (!empty($errors)): ?>
    <div class="err">
      <strong>Ej, są błędy:</strong>
      <ul>
        <?php foreach ($errors as $e): ?><li><?=htmlspecialchars($e)?></li><?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form method="post" action="register.php" autocomplete="off">
    <label>Nazwa użytkownika</label>
    <input type="text" name="username" required value="<?=htmlspecialchars($_POST['username'] ?? '')?>">

    <label>E-mail</label>
    <input type="email" name="email" required value="<?=htmlspecialchars($_POST['email'] ?? '')?>">

    <label>Hasło</label>
    <input type="password" name="password" required>

    <label>Powtórz hasło</label>
    <input type="password" name="password2" required>

    <button type="submit">Zarejestruj się</button>
  </form>

  <p><small>Masz konto? <a href="login.php">Zaloguj się</a></small></p>
</div>
</body>
</html>
