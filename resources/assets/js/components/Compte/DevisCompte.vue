<template>
    <div >
      <!-- au cas ajout bien passé afficher ce message -->   
            
           
    <div class="loading" v-if="loading">
          <div class="lds-hourglass"></div>
    </div>
    <div v-if="error" class="error">
      {{ error }}
    </div>

<div v-if="!loading">
   

        

    <!-- formulaire pour Ajouter un devi -->
   
   
    
    <!-- fin formulaire -->
    <!-- afficher les devis sous formes des cards  -->
    <div class="row" >
            
                        <div class="card-header">
                          

    <!-- button pour afficher formulaire de l'ajout d un article -->         
                <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            </div>
            <input type="text" @keyup.enter="searchDevis"  class="form-control" v-model="search" placeholder="recherche par Compte ou Reference  " aria-label="Username" aria-describedby="basic-addon1" >
            </div>
     

    
                       </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Nom Societe </th>
                                        <th>Date devis</th>
                                        <th>Date limit</th>
                                        <th>Status</th>                                        
                                        <th>Montant TTC</th>
                                        <th>Net à payer</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr  v-for="devi of devis.data" :key="devi.id_devis" >
                                        <td>{{devi.reference_d}}</td>
                                        <td>{{devi.nom_compte}} </td>
                                        <td>{{ devi.date_d}}</td>
                                       <td>{{devi.date_limit_d}} 
                                            <span v-if="devi.date_diff > 0" style="color:#83ea0cf7">
                                            (+{{devi.date_diff}})
                                            </span>
                                            <span v-if="devi.date_diff <= 0" style="color:red">
                                            ({{devi.date_diff}})
                                            </span>
                                        </td>
                                        <td v-if="devi.fk_status_d == 'Brouillon'">
                                            
                                           <span class="badge badge-pill" style="background-color:rgb(170, 170, 170);color:white;font-size:14px"> {{devi.fk_status_d}}</span> </td>
                                         <td v-else>   
                                             <span class="badge badge-pill" :style="{'background-color': devi.colorStatu ,'color':fontStatu.white , 'font-size':fontStatu.size}"> {{devi.type_status}} </span></td>
                                        <td>{{devi.montant_ttc_d}} </td> 
                                        <td>{{devi.montant_reste_d}} </td> 
                                       <td  class="optionsWidth"> 
                                            <a href="#"    @click="redirect_To_DevisDetails(devi)"  class="btn btn-primary" ><i class="fas fa-eye d-inline-block"></i></a>
                                            <a href="#"    @click="PdfDevis(devi.reference_d)"  class="btn btn-secondary" ><i class="far fa-file-pdf"></i></a>
<!--
                                         <router-link class="btn btn-success " :to="'/EditDevis/'+devi.id_devis ">
                                         -->
   </td>                                 
                                    </tr>
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
 <div>
  
    <!-- Modal Component -->
    <b-modal id="modalPrevent"
             ref="modal"
             title="+ Devis"
             @ok="handleOk"
             ok-title="Enregistrer"
             @shown="clearName">
             
      <form @submit.stop.prevent="handleSubmit">

<div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">date: </label>
                    <div class="col-sm-9">
                    <input  type="date" v-model="currentDate" class="form-control" id="date" placeholder="Password"/>
                    </div>
                </div>                 
                <div class="form-group row">
                    <label for="reference_d" class="col-sm-3 col-form-label">Référence: </label>
                    <div class="col-sm-9">
                    <b-form-input  type="text" v-model="devi.reference_d" class="form-control" id="date" placeholder="" disabled/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">compte: </label>
                    <div class="col-sm-9">
                <select class="form-control custom-select " id="fk_compte" v-model="devi.fk_compte_d" v-on:change="getClients" >
                    <option selected disabled>Choisir Client</option>
<option v-for="compte in comptes" :key="compte.id_compte" :value="compte.id_compte">
          {{compte.nom_compte}}
        </option>       
                 </select>   
            </div>
                
        </div>   
 </form>
    </b-modal>
  </div>
                 
                   
                   
    </div>
    
    <vue-pagination  :pagination="devis"
                     @paginate="getDevis()"
                     :offset="4">
    </vue-pagination>
    </div>
    <!-- fin affiche -->
    </div>
</template>



<script>
import  Pagination from '../Pagination.vue';

    export default{
         props: ['idCompte'],
         components:{
            'vue-pagination':Pagination,
         },

          data: () => ({
                        fontStatu : {
                    white : "white",
                    size: "14px"
              },
                     loading: false,
                     error: null,
                     test1 : {
                  searchQuery: 0,
                   calculee: 0,
                  },
      post: null,
      
             modalShow: false,
              //search
              search : '',
              //name file 
              nameFile : "Choose file",
              // objet test sur affichage , ajout , recherche
              Testopen:{
                testnotifEdit : false,
                testnotifAdd : false,
                testAjout : false,
                testAffiche : false,
                testmodelArticle : false,
                testEdit : false,

              },
              // tester l ajout si bien fais 
              
              // tester  si affiche articles  ou afficher ajouter article 
              
              // initialisation d un article 
              devis:{
                        
                        total: 0,
                        per_page: 2,
                        from: 1,
                        to: 0,
                        current_page: 1,
                        data: [],

              },
               offset: 4,
                currentDate:"",
              devi: { 
                    
            id_devis:0,
            reference_d:"",
            date_d:"", 
            type_operation:"",
            objet_d:"",
            date_emission_d:"",
            remise_total_d:"",
            majoration_d:"",
            date_limit_d:"",
            introduction_d:"",  
            conditions_reglements_d:"",
            notes_d:"",
            accompte_d:"",
            montant_reste_d:"",
           fk_status_d:"",
           fk_compte_d:"",
            fk_user_d:"",

            nom_compte:"",
            date_diff:"",
            startDate:"",
            endDate :"",
            timeDiff:"",
              },
            
             comptes:[],
             
      }),
      mounted(){
         
         var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; 
            var yyyy = today.getFullYear();
            console.log("month"+today)
             if(dd<10) 
                {
                    dd='0'+dd;
                } 

                if(mm<10) 
                {
                    mm='0'+mm;
                } 
            this.currentDate  = yyyy+'-'+mm+'-'+dd;
                        console.log(this.currentDate); 

        this.getDevis();
        this.getClients();
          this.countDevis();
          
           if(this.$route.params.success == "add"){
            this.Testopen.testAjout =true;}
   if(this.$route.params.success == "edit"){
            this.Testopen.testEdit =true; }
    
      },
           created () {
    // fetch the data when the view is created and the data is
    // already being observed
    this.fetchData()
  },
    watch: {
    // call again the method if the route changes
    '$route': 'fetchData',
  
   'test1.searchQuery':
     function(val){
      //console.log(val)
      this.test1.calculee = +val + 1
      console.log(this.test1.calculee)  
     }
 
  },
    updated(){
        if( this.$route.params.success == "add"){
          let that = this
              setTimeout(function(){that.Testopen.testAjout = false;}, 2000);
        }
        if( this.$route.params.success == "edit"){
         let that=this;
              setTimeout(function(){that.Testopen.testEdit = false;}, 2000);
        }
    },

      methods: {
    PdfDevis(reference_d){
                           
                //   window.location.href='/pdf/'+reference_bc
                  window.open('/pdf_d/'+reference_d,'_blank');
          },
    handleOk(){
        this.$router.push({ name: 'addDevis', params: { id_compte: this.devi.fk_compte_d ,reference_d: this.devi.reference_d ,currentDate: this.currentDate }});

            },
             clearName(){

               },
            handleSubmit(){

            },
            redirect_To_EditDevis(devi){
                   //  this.$router.push('/ShowBonCommande/'+reference_bc);
                     this.$router.push({ name: 'EditDevis', params: {id_devis: devi.id_devis, reference_d: devi.reference_d, fk_compte_d: devi.fk_compte_d}});

            },
               redirect_To_DevisDetails(devi){
                    this.$router.push({ name: 'DevisDetails', params: {id_devis: devi.id_devis, reference_d: devi.reference_d}});

                    // this.$router.push('/DevisDetails/'+reference_d);
            },
                   fetchData () {
      //this.error = this.post = null
      this.loading = true
      // replace `getPost` with your data fetching util / API wrapper
   this.getDevis();

    },
countDevis(){

                axios.get('/countDevis')
                .then((response) => {

                   var today = new Date();
                    var yyyy = today.getFullYear();             
                    var year  = yyyy;
                    this.devi.reference_d='D-'+year+'-'+response.data.count;
                })
                .catch(() => {
                    console.log('handle server error from here');
                });
          },
          getDevis(){//type_status
                axios.get('/getDevisCompte/'+this.idCompte+'?page='+this.devis.current_page+'')
                .then((response) => {
                    this.loading = false;
                    this.devis = response.data.devis;

                    this.$emit('CountD',this.devis.data.length)
                     let that=this
                    this.devis.data.forEach(function(devi) {
                           devi.currentDateDevi = that.currentDate;
                        var startDate = Date.parse(devi.currentDateDevi);
                        var endDate = Date.parse(devi.date_limit_d);
                        var timeDiff = endDate - startDate;
                        var daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
                        devi.date_diff=daysDiff;
                    })
                    //console.log(response.data.devis);
               })
                .catch(() => {
                    console.log('handle server error from here');
                });
          },
          getClients(){
                axios.get('/getClients')
                .then((response) => {
                    this.comptes = response.data.comptes;
                    //console.log(response.data.comptes);
                  
                })
                .catch(() => {
                    console.log('handle server error from here');
                });
          },
           searchDevis(event){
             console.log(this.search);
             this.devis.current_page=1;
             if(this.search === ""){
                //console.log('test2');
                    this.getDevis();}
                else {
                     // console.log('test1');
                axios.get('/searchDevis/'+this.search+'?page='+this.devis.current_page+'')
                .then((response) => {
                  console.log('serchhhh ')
                  console.log(response.data.devis)
                    this.devis = response.data.devis;
                  
                })
                .catch(() => {
                    console.log('handle server error from here');
                });}
                    
          },
       deleteDevis(devi){


                        this.$swal({
                        title: 'Etes-vous sur?',
                        text: "Vous ne serez pas capable de revenir a cela!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Oui, supprimez-le!'
                                                }).then((result) => {
                        if (result.value) {
                            axios.delete('/deleteDevis/'+devi.id_devis).then(
                                        response => {
                                
                                            this.getDevis();
                                        });
                        this.$swal(
                        'Supprimé!',
                        'Votre compte a été supprimé',
                        'success'
                        )
  }
})

        },  
 
},
      

    }
    
</script>

<style scoped>
.shadawTr:hover {
  box-shadow: 1px 1px 1px 1px #888888;
    }
thead{
    background-color: #efefef;
}
.optionsWidth{
width : 230px;

}
 .btnMarge{
     padding-bottom: 10px;
 }
 .widthCard{
     width: 270px;
     height: 350px;
     
 }
 .widthTextCard{
     width  : 236px;
     height: 13px;
 }
 a {
  color: #999;
  color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    border: 1px solid #ddd;
    
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
.cardbox:hover{
 box-shadow: 1px 2px 2px 2px #c9ced2;
}
span {
    color: #42a5f5;
}
thead{
    background-color: #e9ecef;
}
table{
    background-color: white;
}
.card-body{
    background-color: #f8f9fa
}

.show{
     opacity:0.9;
    width: 233px;
    z-index: 100;
    top: 61px;
    right: 0;
    position:  absolute;
    position :fixed;}


    /*loading*/
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