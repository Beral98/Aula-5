<?php
if(empty($_POST))
    throw new InvalidArgumentException("Requisição Invalida!!!");

$email = $_POST['user_email'];
$password = $_POST['user_password'];

session_start();
accessverify(email: $email, password: $password);

function accessverify(string $password, string $email):void
{
    $db = [
        [
            'name' => 'João Paulo',
            'Email' => 'joao.paulo@gmail.com.br',
            'password' => '$2y$10$JF3sNnOb.5sMFTm8pDahOuY8LSnzVvdb74xj0rUwmF5M82sJckc2O',
            'gender' => 'M'
        ],
        [
            'name' => 'Maria Aparecida',
            'email' => 'maria.paulo@gmail.com',
            'password' => '$2y$10$JF3sNnOb.5sMFTm8pDahOuY8LSnzVvdb74xj0rUwmF5M82sJckc2O',
            'gender' => 'F'
        ]
        
        ];

        foreach($db as $register){
            if (
                $email == $register['email']&& password_verify($password, $register ['password']))
                 {
                    $_SESSION['user_name'] = $register['name'];
                    $_SESSION['user_gender'] = $register['gender'];
                    header('location:dashboard.php'); // Redirect
                    exit;
                 }
        }
        $_SESSION['msg_login_error'] = 'Lamento, usuário ou senha inválidos!!!';
        header('location:index.php');
}