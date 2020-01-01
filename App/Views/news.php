<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body>
    <div id="container">
        <h1>Admin Panel</h1>
        <table>
            <tr>
                <th>Email</th><th>Firstname</th><th>Lastname</th>
            </tr>
        <?php
            foreach ($users as $key => $user) {
                echo "<tr><th>{$user->email}</th><th>{$user->firstname}</th><th>{$user->lastname}</th></tr>";
            }
        ?>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/news.js"></script>    
</body>
</html>