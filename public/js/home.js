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

class Action
{
    getResult(){
        if(this.result == false){
            return true;
        }
        return false;
    }

    setResult(response){
        this.result = response.data.result;
        this.errors.errors = response.data.data;
    }

    prepare(form, formData){
        var params = new URLSearchParams();
        for(let input in formData){
            params.append(form+'['+input+']', formData[input]);
        }
        
        return params;
    }

    execute(){
        if(this.result){
            this.success = true;
        } else {

        }
    }
}

class Registration extends Action
{
    constructor(){
        super();
        this.formData = {
            password: '',
            password2: '',
            email: ''
        },
        this.result = ''
        this.errors = new Error
    }

    getCredentials(){
        return {
            action: '/register',
            formtype: 'registrationForm'
        }
    }
}

class Login extends Action
{
    constructor(){
        super();
        this.formData = {
            password: '',
            email: ''
        },
        this.result = ''
        this.errors = new Error
    }

    getCredentials(){
        return {
            action: '/login',
            formtype: 'loginForm'
        }
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
        onSubmit(form){
            let credentials = form.getCredentials();
            axios.post(credentials.action, form.prepare(credentials.formtype, form.formData))
                .then(response => form.setResult(response))
                .catch(response => console.log(this));
            form.execute();
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
