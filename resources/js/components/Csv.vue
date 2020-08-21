<template>
    <div class="columns">
        <div class="column"></div>
        <div class="column">


            <input type="file" id="file" ref="file" v-on:change="UploadFile()" accept=".XLSX, .CSV" class="form-control">

            <button v-on:click="EventSubir()" class="btn btn-primary">Subir</button>
        </div>

        <div class="column">


        </div>
    </div>
</template>

<script>
    export default {

        data(){
            return {
                events: [],

            }


        },
        mounted () {


        },
        methods:{
            UploadFile(){
                let formData = new FormData();
                formData.append('file', this.file);
                axios
                    .post( '/import-excel-personas',
                        formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }
                    ).then(function(){
                    console.log('SUCCESS!!');
                })
                    .catch(function(){
                        console.log('FAILURE!!');
                    });
            },
            handleFileUpload(){
                this.file = this.$refs.file.files[0];
            }

        }
    }
</script>

<style scoped>

</style>
