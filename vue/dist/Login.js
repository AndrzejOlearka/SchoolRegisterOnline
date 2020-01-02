import Action from './dist/Action.js.';
import Error from './dist/Error.js';

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