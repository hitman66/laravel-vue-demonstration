<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Dashboard</div>

            <div v-for="user in user" class="card-body">
                Welcome, {{user.name}}
            </div>
        </div>
    </div>
</template>

<script>

  export default {
    data() {
      return {
      id: '',
      name: '',
      user: null,
      data: '',
      email:'',
      }
    },
    mounted() {
      this.getUsers()

    },

    methods: {
      getUsers() {
        this.$http({
          url: 'auth/user',
          method: 'GET'
        })
            .then((res) => {
              this.user = res.data.data.id

              // This is where we get the name of the user
              this.$http({
                url: `users/` + res.data.data.id,
                method: 'GET'
              })
                  .then((res) => {
                    this.user = res.data.user
              

                  }, () => {
                    this.has_error = true 
                  })              

            }, () => {
              this.has_error = true 
            })
      },
    }
  }
</script>