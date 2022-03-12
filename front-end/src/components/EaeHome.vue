<template>
    <nav>
        <eae-job-filter></eae-job-filter>
    </nav>
    <article>
        <eae-job-list></eae-job-list>
    </article>
</template>

<script>
import EaeJobFilter from "@/components/Job/EaeJobFilter";
import EaeJobList from "@/components/Job/EaeJobList";

export default {
  name: 'EaeHome',
    components: {
      EaeJobList,
        EaeJobFilter
    }
}
</script>

<style scoped>
nav {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: -30px;
}

article {
    display: flex;
    flex-direction: column;
    align-items: center;
    min-width: 350px
}
</style>
