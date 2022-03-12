<template>
    <div class="eae-chip" v-bind:title="getTitle()">
        <span class="eae-chip-label" v-bind:class="{ 'hover-enabled': enableHover }">{{ filter.value }}</span>
        <button @click="removeJobFilter()" v-if="closeBtn" class="eae-chip-btn">X</button>
    </div>
</template>

<script>
import { Filter } from '@/entities/Filter';

export default {
    name: 'EaeChip',
    props: {
      filter: Filter,
      filterIndex: Number,
      closeBtn: Boolean,
      enableHover: Boolean
    },
    methods: {
        getTitle() {
            return this.filter.filterable ? `Filter by ${this.filter.name}: ${this.filter.value}` : 'Disabled'
        },
        fetchJobs() {
          this.$store.dispatch('job/getJobs');
        },
        removeJobFilter() {
          this.$store.dispatch('job/removeJobFilter', this.filterIndex);
          this.fetchJobs();
        }
    }
}
</script>

<style scoped>
    div.eae-chip {
        font-weight: bold;
        font-size: 11px;
        color: hsl(181deg 27% 52%);
        margin-left: 10px;
        white-space: nowrap;
        padding-top: 8px;
        padding-bottom: 8px;
    }

    div.eae-chip span.eae-chip-label {
        background-color: hsl(185deg 32% 93%);
        padding: 5px 5px 5px 5px;
        border-top-left-radius: 2px;
        border-bottom-left-radius: 2px;
    }

    div.eae-chip span.eae-chip-label.hover-enabled:hover {
        background: hsl(181deg 27% 52%);
        color: white;
        cursor: pointer;
    }

    div.eae-chip button.eae-chip-btn {
        background: hsl(181deg 27% 52%);
        color: white;
        padding: 5px 5px 5px 5px;
        border-top-right-radius: 2px;
        border-bottom-right-radius: 2px;
    }

    div.eae-chip button.eae-chip-btn:hover {
        background: black;
        cursor: pointer;
    }
</style>
