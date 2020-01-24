<template>
<div>
    <div class="alert alert-danger" v-if="has_error">
        <p>Error, unable to retrieve user list.</p>
    </div>
      <v-client-table :data="rows" :columns="columns" :options="options">
      <div slot="actions" slot-scope="{ row }">
      <center><a :href="'/editdept/' + row.id" class="btn btn-primary">Edit</a></center>
      </div>
      </v-client-table>
      <center><a href="/registerdept/" class="btn btn-primary">Create New Department</a></center>
</div>
</template>

<script>
  export default {
    data() {
      return {
        columns: ['id', 'name', 'actions'],
        rows: [],
        options: {
            perPage: 5,
            headings: {
                id: 'ID',
                name: 'Name',
                action: 'Options'
            },
            sortable: ['name'],
            filterable: ['name']
        },   
        has_error: false,
        departments: null,
      }
    },

    mounted() {
      this.getDepartments()
    },

    methods: {
      getDepartments() {
        this.$http({
          url: `departments`,
          method: 'GET'
        })
            .then((res) => {
              this.rows = res.data.departments
            }, () => {
              this.has_error = true
            })
      }
    }
  }
</script>