<template>
    <div class="container">


    <div class="row mt-2">

        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title"> Your Registered Properties</h3>

            <div class="card-tools">
               <router-link to="/addProperty" class="btn btn-success">
                    Add Property <i class="fa fa-user-plus"></i>
                </router-link>
            </div>
            
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
            <table class="table table-hover">

                <tbody>
                <tr>
                <th>Image</th>
                <th>Property</th>
                <th>Status</th>
                <th>Address</th>
                <th>Action</th>
                </tr>
                <!-- Insert dynamic data in table -->
                <tr v-for="(property, index) in properties.data" :key="property.index">

                <td>
                    <img class="small-thumb" v-if=" property.thumbnail!='' " :src="getProfilePic(index)" alt="User Avatar">  
                </td>
                
                <td>{{property.name}}</td>
                <td v-if="property.status=='1'"><span class="badge badge-success p-2">Active</span></td>
                <td v-if="property.status=='0'"><span class="badge badge-danger p-2">Not Active</span></td>
                <td>{{property.address}}</td>  
                <td>
                    <a href="#" @click="previewProperty(property.id)">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a> |
                    <router-link :to="{ path: '/updateProperty/'+property.id }">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </router-link>
                        |
                    <a href="#" @click="deleteProperty(property.id)">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
                </tr>

            </tbody></table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <pagination :data="properties" 
                @pagination-change-page="loadProperties">
                </pagination>
            </div>
        </div>
        <!-- /.card -->
        </div>
    </div>


    </div>
</template>

<script>

    export default {
      data(){
         return {
            baseURL: Vue.prototype.$baseURL,
            properties:{},
            //Date picker settings
            lang: {
               pickers: ['next 7 days', 'next 30 days'],
            },
            //Form features
            features: {},
            form: new Form({
               range: '',
            })
         }
        },
        methods:{
            //Modal for Edit User
            previewProperty(id){
                console.log(id);
                this.$router.push({ path: '/view/'+id});
            },
            editProperty(property){
                this.editMode = true;
                $('#addModal').modal('show');
                this.form.reset();
                this.form.fill(property);
            },
            getResults(page = 1) {
                this.$Progress.start();
               axios.get('/getUsers?page=' + page)
               .then(response => {
                   this.$Progress.finish();
                  this.users = response.data;
               })
                .catch( ()=>{
                    this.$Progress.fail();
                });
		      },
            updateProperty(){
                this.$Progress.start();
                this.form.post('/updateProperty').then( ()=>{
                    //Close form
                    this.$Progress.finish();
                    $('#addModal').modal('hide');
                    //Show success modal
                            Swal.fire(
                            'Updated!',
                            'User data has been updated.',
                            'success'
                            )
                    Fire.$emit('reloadUsers');
                })
                .catch( ()=>{
                    //fail
                    this.$Progress.fail();
                } )
            },
            deleteProperty(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if(result.value)
                    {
                        //Sent request to the server
                        this.$Progress.start();
                        axios.get('/deleteProperty/'+ id)
                        .then(response => {
                            this.users = response.data;
                            this.loadProperties();
                            this.$Progress.finish();
                        });
                    }
                }).catch( ()=>{
                        this.$Progress.fail();
                    //Swal ("Failed", "There was something wrong!", "Warning");
                    alert ("There was something wrong!"); 
                } );
            },
            getProfilePic(index){
                let pic = (this.properties.data[index].thumbnail.length > 200) ? this.properties.data[index].thumbnail : this.baseURL+"/images/property/"+ this.properties.data[index].thumbnail ;
                return pic;
            },
            loadProperties(page=1){
                this.$Progress.start();
                axios.get('/property?page='+page)
                .then(
                    //Get all routes data
                    ({ data }) => (this.properties=data)
                )
                .catch( ()=>{
                    this.$Progress.fail();
                });
            },
            },
            mounted() {
                console.log('addProperty Component mounted.')

                console.log('Base URL:'+ Vue.prototype.$baseURL);
                this.$Progress.start();
                axios.get('/property')
                .then(
                    //Get all routes data
                    ({ data }) => (this.properties=data)
                )
                .catch( ()=>{
                    this.$Progress.fail();
                });
            },
            created(){
                // Fire.$on('reloadProperties', ()=>{
                //     this.loadProperties();
                // });
            }
    }
</script>
