<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
    <style>
        body {
            font-family: 'Ubuntu', sans-serif;
            background-image: url('https://wallpaperaccess.com/full/676960.jpg');
            background-size: cover;
        }
        .container {
            width: 300px;
            padding: 16px;
            margin: 0 auto;
            margin-top: 100px;
            border-radius: 15px;
            box-shadow: 0px 0px 10px 0px rgb(0, 0, 0);
            backdrop-filter: blur(5px);
            text-align: center;
        }
    </style>
</head>
<body>
    <form class="container">
        <h1>Welcome back, <?php echo $result; ?></h1>
        <p>Click <a href="index.html">here</a> to go back to the login page.</p>
</body>
</html>