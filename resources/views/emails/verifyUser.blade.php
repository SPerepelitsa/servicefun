
<!DOCTYPE html>
<html>
<head>
    <title>Добро пожаловать</title>
</head>

<body>
<h2>Добро пожаловать на наш сайт, {{$user['name']}}</h2>
<br/>
Ваш email при регистрации {{$user['email']}} , Пожалуйста, перейдите по ссылке ниже, чтобы подтвердить ваш email аккаунт.
<br/>
<a href="{{url('user/verify', $user->verifyUser->token)}}">Подтвердить Email</a>
</body>

</html>