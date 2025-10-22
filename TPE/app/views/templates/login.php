<div class="login-container">
    <h1>Login Admin</h1>

    <form action="verify" method="POST">
        
        <div class="form-group">
            <label for="email">Usuario (email):</label>
            <input type="text" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <?php 
            if (isset($error) && $error != null) {
                echo "<div class='error-message'>$error</div>";
            }
        ?>
        
        <button type="submit" class="login-button">Entrar</button>
    </form>
</div>