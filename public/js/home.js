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
        this.errors.errors = response.data.errors;
        this.data = response.data.data
    }

    prepare(form, formData){
        var params = new URLSearchParams();
        for(let input in formData){
            params.append(form+'['+input+']', formData[input]);
        }
        
        return params;
    }

    reset(){
        for (let field in this.formData){
            this.formData[field] = '';
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
        this.success = false;
        this.errors = new Error
        this.data = {}
    }

    getCredentials(){
        return {
            action: '/register',
            formtype: 'registrationForm'
        }
    }

    execute(){
        if(this.result){
            this.success = true;
            this.reset();
            var interval = setTimeout(() => {
                this.success = false;
            }, 3000);
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
        this.success = false;
        this.errors = new Error
        this.data = {}
    }

    getCredentials(){
        return {
            action: '/login',
            formtype: 'loginForm'
        }
    }

    execute(){
        if(this.result){
            this.success = true;
            var interval = setTimeout(() => {
                if(this.data.role == 0){
                    window.location.replace('/News');
                } else{
                    window.location.replace('/News');
                }
            }, 3000);
        }
    }
}

new Vue({

    el: '#container',
    data:{
        login: true,
        actions: ['register', 'Registration'],
        loginForm: new Login,
        registrationForm: new Registration
    },
    methods:{
        onSubmit(form){
            let credentials = form.getCredentials();
            axios.post(credentials.action, form.prepare(credentials.formtype, form.formData))
                .then(response => form.setResult(response))
                .then(response => form.execute())
                .catch(response => console.log(this));
        }
    },
    watch:{
        login: function () {
            if(this.login){
                this.actions = ['register', 'Registration'];
            } else {
                this.actions = ['login', 'Login'];
            }
        }
    }
});