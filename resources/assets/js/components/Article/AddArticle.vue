<template>
  <div>
    <div class="text-center pull-right">
      <div class="btnMarge">
        <div class="col">
          <router-link
            class="btn btn-primary mb-3 retour float-right"
            :to="'/ShowArticles'"
          >
            <i class="fas fa-long-arrow-alt-left fontsize"></i>
          </router-link>
        </div>
      </div>
      <h2>Ajouter Article</h2>
      <hr />
    </div>
    <form @submit.prevent="addArticle">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="reference_art"> Code Article</label>
            <input
              type="text"
              class="form-control"
              id="reference_art"
              v-model="$v.article.reference_art.$model"
              :class="{
                'is-invalid': $v.article.reference_art.$error,
                'is-valid':
                  !$v.article.reference_art.$invalid &&
                  $v.article.reference_art.$dirty,
              }"
            />
            <div class="invalid-feedback">
              <span v-if="!$v.article.reference_art.required"
                >le code est obligatoire</span
              >
            </div>
          </div>
          <div class="form-group">
            <label for="type_art"> Type </label>
            <input
              type="text"
              class="form-control"
              id="type_art"
              v-model="$v.article.type_art.$model"
              :class="{
                'is-invalid': $v.article.type_art.$error,
                'is-valid':
                  !$v.article.type_art.$invalid && $v.article.type_art.$dirty,
              }"
            />
            <div class="invalid-feedback">
              <span v-if="!$v.article.type_art.required"
                >le type est obligatoire</span
              >
            </div>
          </div>
          <div class="form-group">
            <label for="designation"> Désignation </label>
            <input
              type="text"
              class="form-control"
              id="designation"
              v-model="$v.article.designation.$model"
              :class="{
                'is-invalid': $v.article.designation.$error,
                'is-valid':
                  !$v.article.designation.$invalid &&
                  $v.article.designation.$dirty,
              }"
            />
            <div class="invalid-feedback">
              <span v-if="!$v.article.designation.required"
                >la designation est obligatoire</span
              >
            </div>
          </div>

          <div class="form-group">
            <label for="description"> Déscription </label>
            <textarea
              placeholder="Description article"
              name=""
              id="description"
              class="form-control"
              rows="4"
              v-model="article.description"
            ></textarea>
          </div>
          <div class="form-group">
            <label for="prix_ht_achat"> Prix HT Achat </label>
            <input
              type="number"
              class="form-control"
              id="prix_ht_achat"
              v-model="$v.article.prix_ht_achat.$model"
              :class="{
                'is-invalid': $v.article.prix_ht_achat.$error,
                'is-valid':
                  !$v.article.prix_ht_achat.$invalid &&
                  $v.article.prix_ht_achat.$dirty,
              }"
            />
            <div class="invalid-feedback">
              <span v-if="!$v.article.prix_ht_achat.required"
                >le prix est obligatoire</span
              >
            </div>
          </div>
          <div class="form-group">
            <label for="prix_ht_vente"> Prix HT Vente</label>
            <input
              type="number"
              class="form-control"
              id="prix_ht_vente"
              v-model="$v.article.prix_ht_vente.$model"
              :class="{
                'is-invalid': $v.article.prix_ht_vente.$error,
                'is-valid':
                  !$v.article.prix_ht_vente.$invalid &&
                  $v.article.prix_ht_vente.$dirty,
              }"
            />
            <div class="invalid-feedback">
              <span v-if="!$v.article.prix_ht_vente.required"
                >le prix est obligatoire</span
              >
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="unite"> Unité </label>
            <input
              type="text"
              class="form-control"
              id="unite"
              v-model="$v.article.unite.$model"
              :class="{
                'is-invalid': $v.article.unite.$error,
                'is-valid':
                  !$v.article.unite.$invalid && $v.article.unite.$dirty,
              }"
            />
            <div class="invalid-feedback">
              <span v-if="!$v.article.unite.required"
                >l'unite est obligatoire</span
              >
            </div>
          </div>
          <div class="form-group">
            <label for="quantite"> Quantité </label>
            <input
              type="text"
              class="form-control"
              id="quantite"
            v-model="$v.article.quantite.$model"
              :class="{
                'is-invalid': $v.article.quantite.$error,
                'is-valid':
                  !$v.article.quantite.$invalid &&
                  $v.article.quantite.$dirty,
              }"
            />
            <div class="invalid-feedback">
              <span v-if="!$v.article.quantite.required"
                >la quantité est obligatoire</span
              >
            </div>
          </div>
          <div class="form-group">
            <label for="quantite_min"> Quantité minimum </label>
            <input
              type="text"
              class="form-control"
              id="quantite_min"
              v-model="article.quantite_min"
            />
          </div>
          <div class="form-group">
            <label for=""> Image </label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Photo</span>
              </div>
              <div class="custom-file">
                <input
                  type="file"
                  class="custom-file-input"
                  id="inputGroupFile01"
                  v-on:change="onImageChange"
                />
                <label class="custom-file-label" for="inputGroupFile01">{{
                  nameFile
                }}</label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="fk_tva_applicable"> Tva Applicable </label>
            <select
              class="form-control custom-select"
              id="fk_tva_applicable"
              
                v-model="$v.article.fk_tva_applicable.$model"
              :class="{
                'is-invalid': $v.article.fk_tva_applicable.$error,
                'is-valid':
                  !$v.article.fk_tva_applicable.$invalid &&
                  $v.article.fk_tva_applicable.$dirty,
              }"
            >
          
              <option selected>Choisir TVA</option>
              <option v-for="tva in tvas" :key="tva.id_tva" :value="tva.id_tva">
                {{ tva.taux_tva }}
              </option>
            </select>
              <div class="invalid-feedback">
              <span v-if="!$v.article.fk_tva_applicable.required"
                >le tva est obligatoire</span
              >
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Famille</label>
            <select
              class="form-control custom-select"
              id="exampleFormControlSelect1"
              required
                  v-model="$v.article.fk_famille.$model"
              :class="{
                'is-invalid': $v.article.fk_famille.$error,
                'is-valid':
                  !$v.article.fk_famille.$invalid &&
                  $v.article.fk_famille.$dirty,
              }"
            >
              <option selected>Choisir une Famille</option>
              <option
                v-for="famille in famille_articles"
                :key="famille.id_famille"
                :value="famille.id_famille"
              >
                {{ famille.libelle_famille }}
              </option>
            </select>
               <div class="invalid-feedback">
              <span v-if="!$v.article.fk_famille.required"
                >la famille est obligatoire</span
              >
            </div>
          </div>
        </div>
      </div>
      <button class="btn btn-primary mr-20 btn-success" :disabled="$v.$invalid">
        Enregister
      </button>
    </form>
  </div>
</template>

<script>
import { required } from "vuelidate/lib/validators";

export default {
  data: () => ({
    nameFile: "Choose file",
    // objet test sur affichage , ajout , recherche
    Testopen: {
      testAjout: false,
      testAffiche: false,
    },
    testEdit: false,

    article: {
      id_article: 0,
      reference_art: "",
      type_art: "",
      designation: "",
      description: "",
      prix_ht_achat: "",
      prix_ht_vente: "",
      unite: "",
      quantite: "",
      quantite_min: "",
      photo_art: "",
      fk_tva_applicable: "",
      fk_famille: "",
    },
    // tableau des articles
    articles: [],
    //familles
    famille_articles: [],
    tvas: [],
  }),
  validations: {
    article: {
      reference_art: { required },
      type_art: { required },
      designation: { required },
      prix_ht_achat: { required },
      prix_ht_vente: { required },
      unite: { required },
      quantite: { required },
      fk_tva_applicable: { required },
      fk_famille: { required },
    },
  },
  methods: {
    addArticle: function () {
      axios.post("/addArticle", this.article).then((response) => {
        console.log("Article Bien ajouter !");
        this.$router.push("/ShowArticles/addsuccess");
      });
    },

    /* onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
    },

    createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.article.photo_art = e.target.result;
    };
                reader.readAsDataURL(file);
    },*/

    onImageChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      this.nameFile = files[0].name;
      if (!files.length) return;
      this.createImage(files[0]);
    },
    createImage(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = (e) => {
        var image = new Image();
        image.src = e.target.result;
        //console.log("okkkkk111 : "+image.src.length)
        image.onload = function () {
          //console.log("test222222");
          //document.getElementById("original-Img").src=image.src;
          // console.log("taille width : "+image.width)
          console.log("taille size : " + image.src.length);
          //console.log("taille width : "+image.height)

          var canvas = document.createElement("canvas");
          var context = canvas.getContext("2d");
          if (image.src.length > 1000000) {
            canvas.width = image.width / 8;
            canvas.height = image.height / 8;
          } else {
            canvas.width = image.width;
            canvas.height = image.height;
          }
          //console.log("canvas.width : "+canvas.width)
          context.drawImage(
            image,
            0,
            0,
            image.width,
            image.height,
            0,
            0,
            canvas.width,
            canvas.height
          );
          console.log("size 2 : " + canvas.toDataURL().length);
          vm.article.photo_art = canvas.toDataURL();
        };

        // vm.article.photo_art = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    getfamilles() {
      axios
        .get("/getfamilles")
        .then((response) => {
          // console.log('shit');
          this.famille_articles = response.data.famille_articles;
        })
        .catch(() => {
          console.log("handle server error from here");
        });
    },
    getTvas() {
      axios
        .get("/getTvas")
        .then((response) => {
          //console.log(response.data);
          this.tvas = response.data.tvas;
          //  console.log(this.tvas);
        })
        .catch(() => {
          console.log("handle server error from here");
        });
    },
  },

  mounted() {
    this.getfamilles();
    this.getTvas();
  },
};
</script>

<style scoped>
.btnMarge {
  padding-bottom: 10px;
}
.widthCard {
  width: 270px;
  height: 350px;
}
.widthTextCard {
  width: 236px;
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
  content: "...";
}

a.last::before {
  content: "...";
}
.cardbox:hover {
  box-shadow: 1px 2px 2px 2px #c9ced2;
}

/*.fontsize{

    font-size: 1.10rem;
}*/
.retour {
  border-left-color: #0000009e;
  border-left-width: 3px;
}
</style>



