<template>
  <div class="container">
    <div class="card card-default">
      <div class="card-header">Edit Department Info</div>

      <div class="card-body">
        This is where we edit the department info.
      </div>

    </div>
    <br>
    <Editdept></Editdept>
  </div>
</template>

<script>
  import Editdept from '../../components/Editdept.vue'
  export default {
    mounted() {
      //
    },
    components: {
      Editdept
    }
  }
</script>