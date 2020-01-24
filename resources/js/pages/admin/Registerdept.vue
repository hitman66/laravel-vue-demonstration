<template>
  <div class="container">
    <div class="card card-default">
      <div class="card-header">Register New Department</div>

      <div class="card-body">
        This is where we register new department info.
      </div>

    </div>
    <br>
    <Registerdept></Registerdept>

    </div>
  </div>
</template>

<script>
  import Registerdept from '../../components/Registerdept.vue'
  export default {
    mounted() {
      //
    },
    components: {
      Registerdept
    }
  }
</script>