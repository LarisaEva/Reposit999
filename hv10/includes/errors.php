<?php

function has_error_message(): bool
{
    return !empty($_SESSION['error']);
}

function set_error_message(string $message): void
{
    $_SESSION['error'] = htmlspecialchars($message, ENT_QUOTES | ENT_HTML5);
}

function show_error_message(): void
{
    ?>
    <div class="alert alert-danger" role="alert">
        <?php
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        ?>
    </div>
    <?php
}