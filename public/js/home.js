class Validator{

    constructor(){
        this.result = 'pusto';
    }

    getResult(){
        if(this.result == false){
            return 'kurwo nie dziala';
        }
    }

    setResult(response){
        this.result = response;
    }


}

new Vue({

    el: '#container',
    data:{
        login: true,
        action: 'register',
        action2: 'Registartion',
        email: '',
        password: '',
        password2: '',
        validator: new Validator
    },
    methods:{
        onSubmitLogin() {
            axios.post('/login', this.$data)
                .then(response => this.validator.result = response.data);
        },
        onSubmitRegister() {
            axios.post('/register', this.$data)
                .then(response => this.validator.result = response.data);
        },
        changeAction(){
            this.state = state

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