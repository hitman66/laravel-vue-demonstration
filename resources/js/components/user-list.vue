<template>
<div>
    <div class="alert alert-danger" v-if="has_error">
        <p>Error, unable to retrieve user list.</p>
    </div>
      <v-client-table :data="rows" :columns="columns" :options="options">
      <div slot="actions" slot-scope="{ row }">
      <center><a :href="'/useredit/' + row.id" class="btn btn-primary">Edit</a></center>
      </div>
      </v-client-table>
</div>
</template>

<script>
  export default {
    data() {
      return {
        columns: ['id', 'name', 'email', 'created_at', 'department_name','actions'],
        rows: [],
        options: {
            perPage: 5,
            headings: {
                id: 'ID',
                email: 'Email',
                created_at: 'Date Created',
                department_name: 'Department',
                name: 'Name',
                action: 'Options'
            },
            sortable: ['name'],
            filterable: ['name','email','department_name']
        }, 
        has_error: false,
        users: null,
        departments: null,
      }
    },

    mounted() {
      this.getUsers()
    },

    methods: {
      getUsers() {
        this.$http({
          url: `users`,
          method: 'GET'
        })
            .then((res) => {
              this.rows = res.data.users
            }, () => {
              this.has_error = true
            })
      },
    }
  }
</script>