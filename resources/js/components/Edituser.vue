<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Edit User</div>

            <div class="card-body">
                <div class="alert alert-danger" v-if="has_error && !success">
                    <p v-if="error == 'registration_validation_error'">Validation error (s), please see the message (s) below.</p>
                    <p v-else>Error, unable to edit at this time. If the problem persists, please contact an administrator.</p>
                </div>

                <form autocomplete="off" @submit.prevent="register" v-if="!success" method="put">

                    <div v-for="user in user">
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.name }">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" placeholder="name" v-model="user.name">      
                        <span class="help-block" v-if="has_error && errors.name">{{ errors.name }}</span>          
                    </div>
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.email }">
                        <label for="name">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="email" v-model="user.email"> 
                        <span class="help-block" v-if="has_error && errors.email">{{ errors.email }}</span>               
                    </div>
                    <div class="form-group">
                      <label for="department">Department</label>
                      <select id="department" class="form-control" v-model="user.department_id">

                         <option v-for="department in departments" :value="department.id">{{ department.name }}</option>

                      </select>
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
        user: '',
        departments: null,
        department_id: '',
        has_error: false,
        error: '',
        errors: {},
        success: false
      }
    },

    mounted() {
      this.getUsers()
      this.getDepartments()
    },

    methods: {
      register() {
        this.$http({
          url: 'auth/edit/' + this.$route.params.id,
          method: 'PUT',
          data: {
            name: document.getElementById("name").value,
            email: document.getElementById("email").value,
            department_id: document.getElementById("department").value,
          }
          })
         .then((res) => {
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
          url: `departments`,
          method: 'GET'
        })
            .then((res) => {
              this.departments = res.data.departments             
            }, () => {
              this.has_error = true
            })
      },
      getUsers() {
        this.$http({
          url: `users/` + this.$route.params.id,
          method: 'GET'
        })
            .then((res) => {
              this.user = res.data.user
            }, () => {
              this.has_error = true
            })
      },
    }
  }
</script>

