<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Profile</div>

                    <div class="card-body">

                        <div class="col-md-12">
                            Name: {{ data.name }}                      
                        </div>
                        <div class="col-md-12">
                            Email: {{ data.email }}                    
                        </div>                    
                    </div>
                </div>
            </div>  
            <div class="col-md-12"><br></div>           
        </div>
    </div>
</template>

<script>
    export default {        
        data() {
            return {
                data: '',
                token: '',                
            }
        },
        props: [
            'uid',
        ],
        methods: {
            getUserDetails: function() {

                const auth = {
                    headers: {'Authorization': 'Bearer ' + this.token} 
                }

                axios
                  .get(window.location.origin + '/api/users/' + this.uid, auth)
                  .then(response => {
                    this.data = response.data;       
                  })
            }
        },
        mounted() {

            axios.get(window.location.origin + '/users/apitoken/' + this.uid)
                 .then(response => {
                    this.token = response.data.api_token;

                    this.getUserDetails();
                 })              
        }
    }
</script>
