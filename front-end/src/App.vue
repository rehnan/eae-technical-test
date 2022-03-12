<template>
    <eae-header></eae-header>
    <eae-home/>
</template>

<script>
import EaeHeader from "@/components/Shared/EaeHeader";
import EaeHome from "@/components/EaeHome";

export default {
  name: 'App',
  components: {
      EaeHome,
      EaeHeader
  }
}
</script>

<style>
#app {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
