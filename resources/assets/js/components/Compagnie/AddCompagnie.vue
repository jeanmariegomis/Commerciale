<template>
  <div>
    <div>
      <div class="text-center pull-right">
        <div class="btnMarge">
          <div class="col">
            <!-- button pour afficher tous les users-->
            <router-link
              class="btn btn-primary mb-3 retour float-right"
              :to="'/getCompagnies'"
            >
              <i class="fas fa-long-arrow-alt-left fontsize"></i>
            </router-link>
          </div>
        </div>
        <h2>Ajouter Entreprise</h2>
        <hr />
      </div>
      <div class="container colBackround">
        <br />
        <div class="text-center">
          <h4>Informations Entreprise</h4>
        </div>
        <hr />
        <!-- formulaire pour Ajouter un user -->
        <form @submit.prevent="store">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label for="raison_sociale_comp" class="col-sm-4"
                  >Raison Sociale</label
                >
                <div class="col-sm-8">
                  <input
                    type="text"
                    class="form-control"
                    name="raison_sociale_comp"
                    v-model="$v.compagnie.raison_sociale_comp.$model"
                    :class="{
                      'is-invalid': $v.compagnie.raison_sociale_comp.$error,
                      'is-valid':
                        !$v.compagnie.raison_sociale_comp.$invalid &&
                        $v.compagnie.raison_sociale_comp.$dirty,
                    }"
                  />
                  <div class="invalid-feedback">
                    <span v-if="!$v.compagnie.raison_sociale_comp.required"
                      >la raison sociale est obligatoire</span
                    >
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4" for="type_art"> Nom Entreprise </label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    class="form-control"
                    id="type_art"
                    v-model="$v.compagnie.nom_societe_comp.$model"
                    :class="{
                      'is-invalid': $v.compagnie.nom_societe_comp.$error,
                      'is-valid':
                        !$v.compagnie.nom_societe_comp.$invalid &&
                        $v.compagnie.nom_societe_comp.$dirty,
                    }"
                  />
                  <div class="invalid-feedback">
                    <span v-if="!$v.compagnie.nom_societe_comp.required"
                      >le nom de la société est obligatoire</span
                    >
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4" for="designation"> Responsabilité Civile </label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    class="form-control"
                    id="designation"
                    v-model="$v.compagnie.RC_comp.$model"
                    :class="{
                      'is-invalid': $v.compagnie.RC_comp.$error,
                      'is-valid':
                        !$v.compagnie.RC_comp.$invalid &&
                        $v.compagnie.RC_comp.$dirty,
                    }"
                  />
                  <div class="invalid-feedback">
                    <span v-if="!$v.compagnie.RC_comp.required"
                      >le RC est obligatoire</span
                    >
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4" for="IF">Identifiant Fiscal</label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    class="form-control"
                    id="IF"
                    v-model="$v.compagnie.IF_comp.$model"
                    :class="{
                      'is-invalid': $v.compagnie.IF_comp.$error,
                      'is-valid':
                        !$v.compagnie.IF_comp.$invalid &&
                        $v.compagnie.IF_comp.$dirty,
                    }"
                  />
                  <div class="invalid-feedback">
                    <span v-if="!$v.compagnie.IF_comp.required"
                      >le IF est obligatoire</span
                    >
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4" for="prix_ht_achat"> Patente </label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    class="form-control"
                    id="prix_ht_achat"
                    v-model="$v.compagnie.patente_comp.$model"
                    :class="{
                      'is-invalid': $v.compagnie.patente_comp.$error,
                      'is-valid':
                        !$v.compagnie.patente_comp.$invalid &&
                        $v.compagnie.patente_comp.$dirty,
                    }"
                  />
                  <div class="invalid-feedback">
                    <span v-if="!$v.compagnie.patente_comp.required"
                      >la patente est obligatoire</span
                    >
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-4" for="cnss"> C.N.S.S</label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    class="form-control"
                    id="cnss"
                    v-model="$v.compagnie.cnss_comp.$model"
                    :class="{
                      'is-invalid': $v.compagnie.cnss_comp.$error,
                      'is-valid':
                        !$v.compagnie.cnss_comp.$invalid &&
                        $v.compagnie.cnss_comp.$dirty,
                    }"
                  />
                  <div class="invalid-feedback">
                    <span v-if="!$v.compagnie.cnss_comp.required"
                      >le C.N.S.S est obligatoire</span
                    >
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4" for="ICE">Identifiant Commun Entreprise </label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    class="form-control"
                    id="ICE"
                    v-model="$v.compagnie.ICE_comp.$model"
                    :class="{
                      'is-invalid': $v.compagnie.ICE_comp.$error,
                      'is-valid':
                        !$v.compagnie.ICE_comp.$invalid &&
                        $v.compagnie.ICE_comp.$dirty,
                    }"
                  />
                  <div class="invalid-feedback">
                    <span v-if="!$v.compagnie.ICE_comp.required"
                      >le I.C.E est obligatoire</span
                    >
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4" for="capitale"> Capitale </label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    class="form-control"
                    id="capitale"
                    v-model="$v.compagnie.capitale_comp.$model"
                    :class="{
                      'is-invalid': $v.compagnie.capitale_comp.$error,
                      'is-valid':
                        !$v.compagnie.capitale_comp.$invalid &&
                        $v.compagnie.capitale_comp.$dirty,
                    }"
                  />
                  <div class="invalid-feedback">
                    <span v-if="!$v.compagnie.capitale_comp.required"
                      >la capitale est obligatoire</span
                    >
                  </div>

</div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4" for="taille_comp">
                  Taille Entreprise
                </label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    class="form-control"
                    id="taille_comp"
                    v-model="$v.compagnie.taille_comp.$model"
                    :class="{
                      'is-invalid': $v.compagnie.taille_comp.$error,
                      'is-valid':
                        !$v.compagnie.taille_comp.$invalid &&
                        $v.compagnie.taille_comp.$dirty,
                    }"
                  />
                  <div class="invalid-feedback">
                    <span v-if="!$v.compagnie.taille_comp.required"
                      >la taille est obligatoire</span
                    >
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4" for="secteur_activite">
                  Secteur D'activité
                </label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    class="form-control"
                    id="secteur_activite"
                    v-model="$v.compagnie.secteur_activite_comp.$model"
                    :class="{
                      'is-invalid': $v.compagnie.secteur_activite_comp.$error,
                      'is-valid':
                        !$v.compagnie.secteur_activite_comp.$invalid &&
                        $v.compagnie.secteur_activite_comp.$dirty,
                    }"
                  />
                  <div class="invalid-feedback">
                    <span v-if="!$v.compagnie.secteur_activite_comp.required"
                      >le secteur d'activite est obligatoire</span
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr />
          <div class="text-center">
            <h4>Details bancaires</h4>
          </div>
          <hr />
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-4" for="nom_bank"> Nom de Banque </label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    class="form-control"
                    id="nom_bank"
                    v-model="$v.compagnie.nom_bank_comp.$model"
                    :class="{
                      'is-invalid': $v.compagnie.nom_bank_comp.$error,
                      'is-valid':
                        !$v.compagnie.nom_bank_comp.$invalid &&
                        $v.compagnie.nom_bank_comp.$dirty,
                    }"
                  />
                  <div class="invalid-feedback">
                    <span v-if="!$v.compagnie.nom_bank_comp.required"
                      >le nom de la banque d'activite est obligatoire</span
                    >
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-4" for="RIB"> R.I.B </label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    class="form-control"
                    id="RIB"
                    v-model="$v.compagnie.RIB_comp.$model"
                    :class="{
                      'is-invalid': $v.compagnie.RIB_comp.$error,
                      'is-valid':
                        !$v.compagnie.RIB_comp.$invalid &&
                        $v.compagnie.RIB_comp.$dirty,
                    }"
                  />
                  <div class="invalid-feedback">
                    <span v-if="!$v.compagnie.RIB_comp.required"
                      >le R.I.B d'activite est obligatoire</span
                    >
                  </div>

</div>
              </div>
            </div>
          </div>
          <hr />
          <div class="text-center">
            <h4>Contact</h4>
          </div>
          <hr />
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-4" for="email"> E-mail </label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                      v-model="$v.compagnie.email_comp.$model"
                    :class="{
                      'is-invalid': $v.compagnie.email_comp.$error,
                      'is-valid':
                        !$v.compagnie.email_comp.$invalid &&
                        $v.compagnie.email_comp.$dirty,
                    }"
                  />
                  <div class="invalid-feedback">
                    <span v-if="!$v.compagnie.email_comp.required"
                      >le mail est obligatoire</span
                    >
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4" for="fix_comp">Fix </label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    class="form-control"
                    id="fix_comp"
                    v-model="$v.compagnie.fix_comp.$model"
                    :class="{
                      'is-invalid': $v.compagnie.fix_comp.$error,
                      'is-valid':
                        !$v.compagnie.fix_comp.$invalid &&
                        $v.compagnie.fix_comp.$dirty,
                    }"
                  />
                  <div class="invalid-feedback">
                    <span v-if="!$v.compagnie.fix_comp.required"
                      >le fix est obligatoire</span
                    >
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4" for="fax_comp">Fax </label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    class="form-control"
                    id="fax_comp"
                      v-model="$v.compagnie.fax_comp.$model"
                    :class="{
                      'is-invalid': $v.compagnie.fax_comp.$error,
                      'is-valid':
                        !$v.compagnie.fax_comp.$invalid &&
                        $v.compagnie.fax_comp.$dirty,
                    }"
                  />
                  <div class="invalid-feedback">
                    <span v-if="!$v.compagnie.fax_comp.required"
                      >le fax est obligatoire</span
                    >
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4" for="GSM_comp">Portable </label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    class="form-control"
                    id="GSM_comp"
                     v-model="$v.compagnie.GSM_comp.$model"
                    :class="{
                      'is-invalid': $v.compagnie.GSM_comp.$error,
                      'is-valid':
                        !$v.compagnie.GSM_comp.$invalid &&
                        $v.compagnie.GSM_comp.$dirty,
                    }"
                  />
                  <div class="invalid-feedback">
                    <span v-if="!$v.compagnie.GSM_comp.required"
                      >le portable est obligatoire</span
                    >
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-4" for="webSite_comp">Site Web </label>
                <div class="col-sm-8">
                  <input
                    type="text"

class="form-control"
                    id="webSite_comp"
                    v-model="compagnie.webSite_comp"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword4" class="col-sm-4">Logo</label>
                <div class="input-group mb-3 col-sm-8">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                  </div>
                  <div class="custom-file">
                    <input
                      type="file"
                      class="custom-file-input"
                      v-on:change="onImageChange"
                      id="inputGroupFile01"
                    />
                    <label class="custom-file-label" for="inputGroupFile01">{{
                      fileName
                    }}</label>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-4" for="adresse_comp">Adresse</label>
                <div class="col-sm-8">
                  <textarea
                    name=""
                    id=""
                    class="form-control"
                    rows="3"
                         v-model="$v.compagnie.adresse_comp.$model"
                    :class="{
                      'is-invalid': $v.compagnie.adresse_comp.$error,
                      'is-valid':
                        !$v.compagnie.adresse_comp.$invalid &&
                        $v.compagnie.adresse_comp.$dirty,
                    }"
                  ></textarea>
                   <div class="invalid-feedback">
                    <span v-if="!$v.compagnie.GSM_comp.required"
                      >l'adresse est obligatoire</span
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr />
          <h4 class="text-center">Ajouter Contacts</h4>
          <hr />
          <div class="row">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Civilité</th>
                      <th>Prénom</th>
                      <th>Nom</th>
                      <th>Fonction</th>
                      <th>Email</th>
                      <th>Fix</th>
                      <th>Téléphone</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(contact, index) in contacts" :key="index">
                      <th>
                        <select
                          class="form-control custom-select"
                          id="exampleFormControlSelect1"
                          v-model="contact.civilite"
                        >
                          <option selected>Choisir une Civilité</option>
                          <option value="Mr">Mr</option>
                          <option value="Mme">Mme</option>
                          <option value="Mlle">Mlle</option>
                        </select>
                      </th>
                      <th>
                        <input
                          type="text"
                          class="form-control"
                          id="prenom"
                          v-model="contact.prenom"
                        />
                      </th>
                      <th>
                        <input
                          type="text"
                          class="form-control"
                          id="nom"
                          v-model="contact.nom"
                        />
                      </th>

                      <th>
                        <input
                          type="text"
                          class="form-control"
                          id="fonction"
                          v-model="contact.fonction"
                        />

</th>
                      <th>
                        <input
                          type="text"
                          class="form-control"
                          id="email"
                          v-model="contact.email"
                        />
                      </th>
                      <th>
                        <input
                          type="text"
                          class="form-control"
                          id="fixe"
                          v-model="contact.fixe"
                        />
                      </th>
                      <th>
                        <input
                          type="text"
                          class="form-control"
                          id="mobile"
                          v-model="contact.mobile"
                        />
                      </th>
                      <th>
                        <a @click="spliceContact(index)" class="btn btn-danger"
                          ><i class="fas fa-trash-alt d-inline-block"></i
                        ></a>
                      </th>
                    </tr>
                    <th>
                      <select
                        class="form-control custom-select"
                        id="exampleFormControlSelect1"
                        v-model="contact.civilite"
                      >
                        <option selected>Choisir une civilite</option>
                        <option value="Mr">Mr</option>
                        <option value="Mme">Mme</option>
                        <option value="Mlle">Mlle</option>
                      </select>
                    </th>
                    <th>
                      <input
                        type="text"
                        class="form-control"
                        id="prenom"
                        v-model="contact.prenom"
                      />
                    </th>
                    <th>
                      <input
                        type="text"
                        class="form-control"
                        id="prenom"
                        v-model="contact.nom"
                      />
                    </th>
                    <th>
                      <input
                        type="text"
                        class="form-control"
                        id="fonction"
                        v-model="contact.fonction"
                      />
                    </th>
                    <th>
                      <input
                        type="text"
                        class="form-control"
                        id="email"
                        v-model="contact.email"
                      />
                    </th>
                    <th>
                      <input
                        type="text"
                        class="form-control"
                        id="fixe"
                        v-model="contact.fixe"
                      />
                    </th>
                    <th>
                      <input
                        type="text"
                        class="form-control"
                        id="mobile"
                        v-model="contact.mobile"
                      />
                    </th>
                    <th>
                      <a @click="pushContact()" class="btn btn-success"
                        ><i class="fas fa-plus-circle"></i
                      ></a>
                    </th>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <hr />
          <button
            class="btn btn-primary mr-20 btn-success"
            :disabled="$v.$invalid"
          >
            Enregister
          </button>
        </form>
        <br />
      </div>
    </div>
    <!-- fin formulaire -->
  </div>
</template>

<script>
import { required } from "vuelidate/lib/validators";

export default {
  data: () => ({
    errors: {},
    fileName: "Choose File",

    compagnie: {
      id_compagnie: 0,


nom_societe_comp: "",
      raison_sociale_comp: "",
      RC_comp: "",
      IF_comp: "",
      patente_comp: "",
      cnss_comp: "",
      ICE_comp: "",
      capitale_comp: "",
      taille_comp: "",
      secteur_activite_comp: "",
      nom_bank_comp: "",
      RIB_comp: "",
      //cp_comp:"",
      //ville_comp:"",
      //pays_comp:"",
      adresse_comp: "",
      email_comp: "",
      GSM_comp: "",
      fix_comp: "",
      fax_comp: "",
      webSite_comp: "",
      logo_comp: "",
    },
    contact: {
      id_contact: 0,
      prenom: "",
      nom: "",
      civilite: "",
      fonction: "",
      email: "",
      fixe: "",
      mobile: "",
      type_contact: "",
      fk_compte_comp: 0,
    },
    contacts: [],
    macompagnies: [],
  }),

  validations: {
    compagnie: {
      nom_societe_comp: { required },
      raison_sociale_comp: { required },
      RC_comp: { required },
      IF_comp: { required },
      patente_comp: { required },
      cnss_comp: { required },
      ICE_comp: { required },
      capitale_comp: { required },
      taille_comp: { required },
      secteur_activite_comp: { required },
      nom_bank_comp: { required },
      RIB_comp: { required },
      adresse_comp: { required },
      email_comp: { required },
      GSM_comp: { required },
      fix_comp: { required },
      fax_comp: { required },
     
    },
  },
  methods: {
    // upload image
    onImageChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      this.fileName = files[0].name;

      if (!files.length) return;
      this.createImage(files[0]);
    },

    createImage(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = (e) => {
        vm.compagnie.logo_comp = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    // ajouter une compagnie
    store() {
      axios
        .post("/addCompagnie", {
          compagnie: this.compagnie,
          contacts: this.contacts,
        })

        .then((response) => {
          // console.log("test");

          this.$router.push("/getCompagnies/add");
        })
        .catch((error) => {});
    },
    pushContact() {
      console.log(this.contact);

      this.contacts.push({
        prenom: this.contact.prenom,
        nom: this.contact.nom,
        civilite: this.contact.civilite,
        fonction: this.contact.fonction,
        email: this.contact.fonction,
        fixe: this.contact.email,
        mobile: this.contact.mobile,
        fk_compte_comp: this.contact.fk_compte_comp,
      });
      this.contact = {
        id_contact: 0,
        prenom: "",
        nom: "",
        civilite: "",
        fonction: "",
        email: "",
        fixe: "",
        mobile: "",
        fk_compte_comp: 0,
      };
    },
    spliceContact(index) {
      this.contacts.splice(index, 1);
    },

    fetchData() {
      this.store();
    },
  },
  created() {
    // fetch the data when the view is created and the data is
    // already being observed
    // this.fetchData();
  },
  watch: {
    // call again the method if the route changes
    $route: "fetchData",
  },
};
</script>
<style scoped>
a {
  color: #999;
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  border: 1px solid #ddd;
}
/*.fontsize{

    font-size: 1.30rem;
}*/
.colBackround {
  background-color: whitesmoke;
  box-shadow: 1px 1px 3px 4px #d2cfcf;
}
.retour {
  border-left-color: #0000009e;
  border-left-width: 3px;
}
</style>