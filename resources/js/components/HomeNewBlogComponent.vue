<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">            
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">Create new article</div>

                        <div class="card-body">

                            <form id="new-blog" @submit.prevent="submitForm">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="text" v-model="title" placeholder="Title of your article" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <textarea v-model="body" class="col-md-12" style="height: 150px" placeholder="What's on your mind?" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>    
                <div class="col-md-12"><br></div>                   
            </div>
        </div>

        <blog-format-component v-for="n in aidArr.slice().reverse()" :key="n" v-bind:id="n"></blog-format-component>
    </div>
</template>

<script>
    export default {        
        data() {
            return {
                title: '',
                body: '',
                aid: 0,
                aidArr: [],
                range: 0,
                token: ''
            }
        },
        props: [
            'uid'
        ],
        methods: {
            submitForm: function(e) {
                e.preventDefault();

                const auth = {
                    headers: {'Authorization': 'Bearer ' + this.token} 
                }

                const form_data = {
                    title: this.title,
                    body: this.body
                  };

                axios.post('api/articles/', form_data, auth)
                  .then(response => {

                    if(response.status === 200) {
                        this.aidArr[this.range] = response.data.id;

                        this.range += 1;

                        this.clearForm();
                    }

                }).catch(error => {
                    console.log(error);
                })
            },
            clearForm : function() {
                this.$data.title = '';
                this.$data.body = '';
            }
        },
        mounted() {

            axios.get('/users/apitoken/' + this.uid)
                 .then(response => {
                    this.token = response.data.api_token;
                 })
        }
    }
</script>
