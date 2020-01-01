import Action from './vue/src/core/Action.js';
import Error from './vue/src/core/Error.js';

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

export default Login;