import Vue from 'vue'
import Login from './vue/src/core/Login.js'
import Registration from './vue/src/core/Registration.js'

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