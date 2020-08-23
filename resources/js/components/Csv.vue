<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload csv Test</div>

                    <div class="card-body">
                        <div v-if="success != ''" class="alert alert-success" role="alert">
                            {{success}}
                        </div>
                        <div v-if="output != ''" class="alert alert-danger" role="alert">
                            {{output}}
                        </div>
                        <form @submit="formSubmit" enctype="multipart/form-data">

                            <strong>File:</strong>
                            <input type="file" class="form-control" v-on:change="onFileChange">

                            <button class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                name: '',
                file: '',
                success: '',
                output:''
            };
        },
        methods: {
            onFileChange(e){
                console.log(e.target.files[0]);
                this.file = e.target.files[0];
            },
            formSubmit(e) {
                e.preventDefault();
                let currentObj = this;

                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();
                formData.append('file', this.file);

                axios.post('/import-excel', formData, config)
                    .then(function (response) {

                        if (response.data.success){
                        currentObj.success = response.data.success;
                            currentObj.error =''
                        }else{

                            currentObj.output = response.data.error;
                            currentObj.success =''
                        }
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                        console.log(error)
                    });
            }
        }
    }
</script>

<style scoped>

</style>
