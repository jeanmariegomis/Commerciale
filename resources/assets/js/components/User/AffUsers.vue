<template>
  <div>
   <notifications group="foo" 
      position="bottom right" 
      classes="vue-notification success"/> 
          <div class="loading" v-if="loading">
     <div class="lds-hourglass"></div>
    </div>
    <div v-if="error" class="error">
      {{ error }}
    </div>

<div v-if="!loading">
<div>
   <div>
 <div class="alert alert-success alert-dismissible fade show" role="alert" v-if="Testopen.testAjout">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Utilisateur Bien Ajouter !</strong>
</div>
 <div class="text-center pull-right" >
                  <div class=" btnMarge">
        <div class="col">
    <!-- button pour afficher tous les users-->
           <router-link :to="'/addUsers'" class="float-right btn btn-secondary" v-if="profile.role =='Super Admin'"><i class="fas fa-plus-circle"/>Ajouter</router-link>

        </div>
  
    </div>
    <h3>Liste des Utilisateurs</h3>
    <hr>   
    </div>

    <!-- afficher les utilisateurs sous formes des cards  -->
    <div class="row">
        <div class="col-auto" v-for="user of users.data" :key="user.id" >
            <div class="card widthCard"  >
            <img v-if="user.photo != ''" class="card-img-top" :src="'storage/images/'+user.photo" alt="Card image cap" width="100px" height="100px">
            <img v-if="user.photo === ''" class="card-img-top" :src="'storage/images/user0.jpg'" alt="Card image cap" width="100px" height="100px">

            <div class="card-body">
                <h5 class="card-title">Nom Utilisateur : {{user.name}}</h5>
                <p class="card-text">
                    <hr>
                    <div class="widthTextCard">E-mail : {{ user.email}}</div>
                    <hr>
                    <div class="widthTextCard">Role : {{user.role}}</div>
                    <hr>
                </p>

                <div v-if="profile.role =='Super Admin'"> 
                    <a href="#" class="btn btn-danger " @click="deleteUser(user)"><i class="fas fa-trash-alt d-inline-block"></i></a>
                </div>
            </div>
            </div>
        </div>
    </div> 
         <vue-pagination  :pagination="users"
                     @paginate="getUsers()"
                     :offset="4">
    </vue-pagination>      
    </div>
  
    <!-- fin affiche -->
    </div>
</div>
    </div>
</template>


<script>
import  Pagination from '../Pagination.vue';

    export default{
        components:{
            'vue-pagination':Pagination,
         },
    data: () => ({
               loading: false,
               error: null,

              //search
              search : '',
              //name file 
            
    
              // objet test sur affichage , ajout , recherche
              Testopen:{
                testAjout : false,
                testAffiche : false,
                testmodelArticle : false,
              },
        user: {
           id:0,
           names:"",
           email:"",
           password:"",
           role:"",
           photo:"",
      
        },
          profile: {
      id:0,
      name:"",
      email:"",
      password:"",
      role:"",
      photo:"",
      
    },
        users:{
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1,
            data: [],
        },
    }),

   // remplire listes des articles aprés la creation complet de ce composant
    mounted(){
 if(this.$route.params.success == "add")
                                      this.$notify({
                                      group: 'foo',
                                      title: 'Succès',
                                      text: 'user bien ajouter!',
                                      duration: 1500,
                                    });


          this.getUsers();
           this.getProfile();
    },
updated:function(){
     let that=this;
              setTimeout(function(){that.Testopen.testAjout = false;}, 2000);
},
    methods: {
            
              // methode pour afficher tous les users                  
            getUsers(){
                   this.loading = true

                        axios.get('/getUsers?page='+this.users.current_page+'')
                        .then(response => {
                            // recuperé ensemble des articles sous format json
                            this.users = response.data.users;
                            this.loading = false;

                          
                         
                        })
                        .catch(function (error) {
                           
                        });                
                         
                               
            },
            
            getProfile(){
                                                    console.log("zzz");

                        axios.get('/getProfile')
                        .then(response => {
                            // recuperé ensemble des articles sous format json
                                                    console.log(response);

                           this.profile = response.data.user[0];

                        })
                        .catch(function (error) {
                           
                        });                
                         
                               
            },
      
            onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                this.nameFile = files[0].name;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },


            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.user.photo = e.target.result;
                    
                };
                reader.readAsDataURL(file);
            },

      
            deleteUser: function(user) {
                                                      this.$swal({
                        title: 'Êtes-vous sûr?',
                        text: "Vous ne serez pas capable de revenir à cela!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Oui, supprimez-le!'
                        }).then((result) => {
                        if (result.value) {
                    axios.delete('deleteUser/'+user.id)
                
                        .then(response => {
                            this.getUsers();
                        })
                        .catch(error => {
                    
                            console.log(error );
                        })
                        
                       this.$swal(
                            'Supprimé',
                            'Votre fichier a été supprimé.',
                            'success'
                            )
                        }

                        })
                       
        },
        
    },

}
    
</script>

<style scoped>
 .btnMarge{
     padding-bottom: 10px;
 }
 .widthCard{
     width: 270px;
     height: 310px;
 }
 .widthTextCard{
     width  : 236px;
     height: 13px;
 }
 
.current {
  color: red;
}
ul {
  padding: 0;
  list-style-type: none;
}
li {
  display: inline;
  margin: 5px 5px;
}

a.first::after {
  content:'...'
}

a.last::before {
  content:'...'
}
.show{
    opacity:0.9;
    width: 233px;
    z-index: 100;
    top: 61px;
    right: 0;
    position:  absolute;
    position :fixed;
    }
.lds-hourglass {
  display: inline-block;
  position: relative;
  width: 0px;
  height: 20px;
}
.lds-hourglass:after {
  content: " ";
  display: block;
  border-radius: 50%;
  width: 0;
  height: 0;
  margin: 6px;
  box-sizing: border-box;
  border: 15px solid #fff;
  border-color: rgb(0, 0, 0) transparent rgb(0, 0, 0) transparent;
  animation: lds-hourglass 1.2s infinite;
}
@keyframes lds-hourglass {
  0% {
    transform: rotate(0);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }
  50% {
    transform: rotate(900deg);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }
  100% {
    transform: rotate(1800deg);
  }
}
</style>
