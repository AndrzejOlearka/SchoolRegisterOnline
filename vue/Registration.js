import Action from './vue/src/core/Action.js';
import Error from './vue/src/core/Error.js';

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