class Error {

    constructor() {
        this.errors = {};
    }

    has(field){
        return this.errors.hasOwnProperty(field);
    }

    any(){
        return Object.keys(this.errors).length > 0;
    }

    get(field){
        if(this.errors[field]){
            return this.errors[field];
        }
    }

    clear(field){
        if(field){
            delete this.errors[field];
            return;
        }
        this.errors = {};
    }

}

class Validator{

    constructor(){
        this.result = '',
        this.errors = new Error
    }

    getResult(){
        if(this.result == false){
            return 'kurwo nie dziala';
        }
    }

    setResult(response){
        this.result = response.data.result;
        this.errors.errors = response.data.data;
    }
}

class Registration
{
    constructor(){
        this.validator = new Validator,
        this.formData = {},
        this.formData.password = '',
        this.formData.password2 = '',
        this.formData.email = ''
        this.success = false;
    }

    prepare(){
        var params = new URLSearchParams();
        for(let input in this.formData){
            params.append('registrationForm['+input+']', this.formData[input]);
        }
        return params;
    }

    execute(){
        if(this.validator.result){
            this.success = true;
        } else {

        }
    }
}

class Login
{
    constructor(){
        this.password = '',
        this.email = ''
    }
}

new Vue({

    el: '#container',
    data:{
        login: true,
        action: '',
        action2: '',
        loginForm: new Login,
        registrationForm: new Registration
    },
    methods:{
        onSubmitLogin() {
            axios.post('/login', this.data)
                .then(response => this.validator.result = response.data);
        },
        onSubmitRegister() {
            axios.post('/register', this.registrationForm.prepare())
                .then(response => this.registrationForm.validator.setResult(response))
                .catch(response => console.log(this));
            this.registrationForm.execute();
            console.log(this.registrationForm.validator);
        }
    },
    watch:{
        login: function () {
            if(this.login){
                this.action = 'register';
                this.action2 = 'Registration';
            } else {
                this.action = 'login';
                this.action2 = 'Login';
            }
        }
    }
});