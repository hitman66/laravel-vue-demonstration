<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Edit Department</div>

            <div class="card-body">
                <div class="alert alert-danger" v-if="has_error && !success">
                    <p v-if="error == 'registration_validation_error'">Validation error (s), please see the message (s) below.</p>
                    <p v-else>Error, unable to edit at this time. If the problem persists, please contact an administrator.</p>
                </div>

                <form autocomplete="off" @submit.prevent="register" v-if="!success" method="put">
                    <div v-for="department in department">
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.name }">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" placeholder="name" v-model="department.name">     
                        <span class="help-block" v-if="has_error && errors.name">{{ errors.name }}</span>           
                    </div>
                  </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        name: '',
        department: null,
        has_error: false,
        error: '',
        errors: {},
        success: false
      }
    },

    mounted() {
      this.getDepartments()
    },

    methods: {
      register() {
        this.$http({
          url: '/deptedit/' + this.$route.params.id,
          method: 'PUT',
          data: {
            name: document.getElementById("name").value,
          }
          })
         .then(() => {
            app.success = true
            this.$router.push({name: 'admin.dashboard', params: {successRegistrationRedirect: true}})
          }, (res) => {
              this.error = res.response.data.errors
              this.errors = res.response.data.errors || {}
              this.has_error = true
          })
      },
      getDepartments() {
        this.$http({
          url: `departments/` + this.$route.params.id,
          method: 'GET'
        })
            .then((res) => {
              this.department = res.data.department           
            }, () => {
              this.has_error = true
            })
      },
    }
  }
</script>

