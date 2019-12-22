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
        <h1>School Register Online</h1>
        <form id="loginForm" method="post" action="/login" v-show="login" @submit.prevent="onSubmitLogin">
            <input type="text" class="form-control" name="email" v-model="email">
            <span class="error" v-text="validator.getResult()"></span>
            <input type="text" class="form-control" name="password" v-model="password">
            <span class="error" v-text="validator.getResult()"></span>
            <button type="submit" class="btn btn-primary btn-lg" name="login">Login</button>
        </form>
        <form id="registerForm" method="post" action="/register" v-show="!login" @submit.prevent="onSubmitRegister">
            <input type="text" class="form-control" name="email" v-model="email">
            <span class="error" v-text="validator.getResult()"></span>
            <input type="text" class="form-control" name="password" v-model="password">
            <span class="error" v-text="validator.getResult()"></span>
            <input type="text" class="form-control" name="password2" v-model="password2">
            <span class="error" v-text="validator.getResult()"></span>
            <button type="submit" class="btn btn-primary btn-lg" name="register">Register</button>
        </form>
        <br>
        <h1>Are you not {{action}} yet?</h1><h1>Click here and {{action}}!</h1>
        <button type="button" class="btn btn-primary btn-lg" @click="login = !login">Go To {{action2}} Form</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/home.js"></script>    
</body>
</html>