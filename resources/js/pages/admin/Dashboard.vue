<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Admin Dashboard</div>

            <div class="card-body">
                Welcome Admin!
            </div>
        </div>
        <br>
        <div class="card card-default">
            <div class="card-header">User List</div>

            <div class="card-body">
                <userList></userList>
            </div>          
        </div>
        <br>
        <div class="card card-default">
            <div class="card-header">Department List</div>

            <div class="card-body">
                <deptList></deptList>
            </div>            
        </div>
    </div>
</template>

<script>
  import userList from '../../components/user-list.vue'
  import deptList from '../../components/department-list.vue'
  export default {
    mounted() {
      //
    },
    components: {
      userList,
      deptList
    }
  }
</script>