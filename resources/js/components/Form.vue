<template>
  <div class="container">

    <form @submit.prevent="sendInput()">
      <h2 class="text-center">Loris' Form</h2>

      <!-- Input Nome con validazione frontend -->
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Name" v-model="userName" required maxlength="255">
      </div>
      
      <!-- errori nome -->
      <div v-if="errors.user_name">
        <div v-for="error, index in errors.user_name" :key="index" class="alert alert-danger" role="alert">
          {{error}}
        </div>
      </div>

      <!-- Input cognome con validazione frontend -->
      <div class="form-group">
        <label for="surname">Surname</label>
        <input type="text" class="form-control" id="surname" placeholder="Surname" v-model="userSurname" required maxlength="255">
      </div>

      <!-- errori cognome -->
      <div v-if="errors.user_surname">
        <div v-for="error, index in errors.user_surname" :key="index" class="alert alert-danger" role="alert">
          {{error}}
        </div>
      </div>
      <button type="submit" class="btn btn-primary rounded-pill w-25 d-block mx-auto my-0">Invia</button>
    </form>

    <!-- validazione backend -->
    <div v-if="success === true" class="alert alert-success w-50 mx-auto my-3" role="alert">
      Success!
    </div>
  </div>
</template>

<script>
export default {
  name: 'Form',
  data() {
    return {
      // compilo le seguenti variabli con un v-model
      userName: '',
      userSurname: '',
      // variabili per mostrare all'utente le validazioni
      success: false,
      errors: [],
    }
  },
  methods: {
    // invio tramite chiamata post i dati compilati
    sendInput() {
      axios.post('http://127.0.0.1:8000/api/forms', {
        user_name: this.userName,
        user_surname: this.userSurname,
      })
      .then((response) => {
        if(response.data.success === true) {

          // imposto la variabile a true
          this.success = true;

          // svuoto i campi
          this.userName = '';
          this.userSurname = '';
        } else {
          this.errors = response.data.errors;
        }
      })
    }
  }
}
</script>

<style lang="scss">
  form {
    width: 70%;
    margin: 0 auto;
    background-color: rgb(204, 214, 237);
    padding: 30px;
    border-radius: 20px;
    box-shadow: 5px 5px 5px lightgray;
  }
</style>