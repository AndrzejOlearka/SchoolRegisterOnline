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
        <form id="loginForm" method="post" action="/login"  v-show="login" @submit.prevent="onSubmit(loginForm)">
            <input type="text" class="form-control" name="loginForm[email]" v-model="loginForm.email">
            <span class="error" v-if="loginForm.errors.has('emptyEmail')" v-text="loginForm.errors.get('emptyEmail')"></span>
            <span class="error" v-if="loginForm.errors.has('wrongEmail')" v-text="loginForm.errors.get('wrongEmail')"></span>
            <input type="text" class="form-control" name="loginForm[password]" v-model="loginForm.password">
            <span class="error" v-if="loginForm.errors.has('emptyPassword')" v-text="loginForm.errors.get('emptyPassword')"></span>
            <span class="error" v-if="loginForm.errors.has('wrongPassword')" v-text="loginForm.errors.get('wrongPassword')"></span>
            <p><button type="submit" class="btn btn-primary btn-lg" name="loginForm[login]">Login</button></p>
        </form>
        <form id="registerForm" method="post" action="/register" v-show="!login" @submit.prevent="onSubmit(registrationForm)">
            <input type="text" class="form-control" name="registrationForm[email]" v-model="registrationForm.formData.email">
            <span class="error" v-if="registrationForm.errors.has('wrongEmail')" v-text="registrationForm.errors.get('wrongEmail')"></span>
            <span class="error" v-if="registrationForm.errors.has('emptyEmail')" v-text="registrationForm.errors.get('emptyEmail')"></span>
            <input type="password" class="form-control" name="registrationForm[password]" v-model="registrationForm.formData.password">
            <span class="error" v-if="registrationForm.errors.has('passwordStrength')" v-text="registrationForm.errors.get('passwordStrength')"></span>
            <input type="password" class="form-control" name="registrationForm[password2]" v-model="registrationForm.formData.password2">
            <span class="error" v-if="registrationForm.errors.has('differentPasswords')" v-text="registrationForm.errors.get('differentPasswords')"></span>
            <p><button type="submit" class="btn btn-primary btn-lg" name="registrationForm[register]">Register</button></p>
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