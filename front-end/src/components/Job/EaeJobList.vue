<template>
    <article>
        <eae-job-card v-for="job in jobs" :key="job.id" :job="job"></eae-job-card>
    </article>
</template>

<script>
import EaeJobCard from '@/components/Job/EaeJobCard';
import { computed } from 'vue';
import { useStore } from 'vuex';
import { Job } from '@/entities/Job';

export default {
    name: 'EaeJobList',
    components: {
        EaeJobCard
    },
    setup() {
        return {
            jobs: computed(() => useStore().state.job.data.jobs.map(item => new Job(item)))
        }
    },
    methods: {
        fetchJobs() {
            this.$store.dispatch('job/getJobs');
        }
    },
    mounted() {
        this.fetchJobs();
    }
}
</script>

<style scoped>
article {
    display: flex;
    flex-direction: column;
    width: 60%;
    flex-wrap: wrap;
    background-color: transparent;
    font-size: 12px;
}
</style>
