<template>
    <article class="job-filter">
        <section class="job-chips">
            <eae-chip
                v-for="(filter, index) in filters"
                :key="filter.value"
                :filter="filter"
                :enable-hover="false"
                :filter-index="index"
                :closeBtn="true">
            </eae-chip>
        </section>
        <section class="job-filter-controls">
            <a @click.prevent="clearFilter()">Clear</a>
        </section>
    </article>
</template>

<script>
import EaeChip from '@/components/Shared/EaeChip';
import { useStore } from 'vuex';
import { computed } from 'vue';

export default {
  name: 'EaeJobFilter',
  components: {
    EaeChip
  },
  setup() {
      return {
          filters: computed(() => useStore().state.job.data.filters)
      }
  },
  methods: {
      fetchJobs() {
          this.$store.dispatch('job/getJobs');
      },
      clearFilter() {
          this.$store.dispatch('job/clearJobFilters');
          this.fetchJobs();
      }
  }
}
</script>

<style scoped>
    article.job-filter {
        height: auto;
        min-height: 60px;
        background-color: #ffffff;
        width: 60%;
        min-width: 350px;
        box-shadow: 0 -8px 30px hsl(179deg 29% 51%);
        border-radius: 5px;
        line-height: 41px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: initial;
        padding: 0 25px 0 25px;
    }

    article.job-filter section.job-chips {
        display: flex;
        flex-direction: row;
        justify-content: start;
        align-items: center;
        flex-wrap: wrap;
    }

    article.job-filter section.job-filter-controls {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        color: hsl(181deg 27% 52%);
        font-size: 14px;
        font-weight: bold;
        flex-wrap: wrap;
    }

    article.job-filter section.job-filter-controls a {
        color: hsl(181deg 27% 52%);
        margin-right: 15px;
    }

    article.job-filter section.job-filter-controls a:hover {
        cursor: pointer;
        text-decoration: underline;
    }
</style>
