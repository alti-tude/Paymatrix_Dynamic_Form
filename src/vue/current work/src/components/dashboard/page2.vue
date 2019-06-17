<template>
<div>
      <div class="header">
          <h4 class="title">page2</h4>
          <p class="category">Created using <a href="https://www.google.com/fonts/specimen/Muli">Muli</a> Font Family</p>
        </div>
        <div class="content">
          <router-link :to="{ name: 'page1' }">page1</router-link>
          <router-link class="link" :to="{ name: 'dashboard' }"> dashboardview </router-link>
          <router-link class="link" :to="{ name: 'form1' }"> form1 </router-link>
        </div>
    </div>
</template>

<script>
export default {
  
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
 

</style>