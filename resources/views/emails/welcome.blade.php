<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f5f5; padding: 20px;">

    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; padding: 20px; border-radius: 8px;">

        <h2 style="color: #333;">
            Bem-vindo, {{ ucwords($user->name) }}.
        </h2>

        <p style="font-size: 14px; color: #555;">
            Seu cadastro foi realizado com sucesso em nosso sistema.
        </p>

        <hr style="margin: 20px 0;">

        <p style="font-size: 12px; color: #999;">
            Este é um e-mail automático, não é necessário responder.
        </p>

    </div>

</body>
</html>
