<template>
  <div class="container">
    <div class="card card-default">
      <div class="card-header">Edit User Info</div>

      <div class="card-body">
        This is where we edit the user's info.
      </div>

    </div>
    <br>
    <Edituser></Edituser>
  </div>
    </div>
  </div>
</template>

<script>
  import Edituser from '../../components/Edituser.vue'
  export default {
    mounted() {
      //
    },
    components: {
      Edituser
    }
  }
</script>