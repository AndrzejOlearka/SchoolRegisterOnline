import Action from './dist/Action.js';
import Error from './dist/Error.js';

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

export default Registration;