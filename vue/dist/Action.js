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

export default Action;