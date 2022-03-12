<template>
    <section>
        <div class="card-header">
            <div class="card-header job-company-logo">
                <img :src="job.getLogoPath()" alt="Job Company Logo">

            </div>
            <div class="card-body job-information">
                <div class="title">
                    <span class="job-company-name" style="margin-right: 10px;margin-top: 1px">{{ job.company }}</span>
                    <eae-tag class="job-new" v-if="job.isNew" value="new!"></eae-tag>
                    <eae-tag class="job-featured" v-if="job.highlighted" :black-theme="true" value="featured"></eae-tag>
                </div>
                <div class="sub-title">
                <span class="job-role-name" style="text-align: left;font-size: 17px;font-weight: bold;">
                    {{ job.role }}
                </span>
                    <div>
                        <span class="job-posted-at">{{ job.postedAt.toElapsedString() }}</span>
                        <span class="job-dot">.</span>
                        <span class="job-contract">{{ job.contract }}</span>
                        <span class="job-dot">.</span>
                        <span class="job-location">{{ job.location }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer job-filter">
            <eae-chip
                @click="addJobFilter(filter)"
                v-for="filter in job.getFilters()"
                :key="filter.value" :filter="filter" :enableHover="filter.filterable" :closeBtn="false">
            </eae-chip>
        </div>
    </section>
</template>

<script>

import EaeTag from '@/components/Shared/EaeTag';
import EaeChip from '@/components/Shared/EaeChip';
import { Job } from '@/entities/Job';

export default {
    name: 'EaeJobCard',
    components: {
        EaeChip,
        EaeTag,
    },
    props: {
        job: Job
    },
    methods: {
        addJobFilter(filter) {
            if (filter.filterable) {
                this.$store.dispatch('job/addJobFilter', filter);
                this.fetchJobs();
            }
        },
        fetchJobs() {
            this.$store.dispatch('job/getJobs');
        }
    }
}
</script>

<style scoped>
section {
    width: 100%;
    background-color: #ffffff;
    box-shadow: hsl(180deg 22% 73%) 0 0 10px;
    border-radius: 5px;
    margin-top: 12px;
    display: flex;
    flex-direction: row;
    color: hsl(181deg 27% 52%);
    font-weight: 600;
    flex-wrap: wrap;
    min-width: 350px;
    padding-bottom: 10px;
    padding-top: 10px;
    padding-right: 40px;
    min-height: 115px;
    height: auto;
}

section:hover {
    border-left: 5px solid hsl(181deg 27% 52%);
    cursor: pointer;
}

section div.card-header {
    display: flex;
    flex-wrap: nowrap;
}

section div.card-header div.job-company-logo {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100px;
    height: auto;
    margin-left: 20px;
}

section div.card-header div.ob-company-logo img {
    width: 80px;
    height: 80px;
}

section div.card-header div.card-body.job-information {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: start;
    text-align: left;
    margin-left: 10px;
}

section div.card-header div.card-body div.title {
    display: flex;
    white-space: nowrap;
    margin-bottom: 10px;
}

section div.card-header div.card-body div.sub-title div {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin-top: 8px;
    color: rgb(128 128 128 / 70%);
    font-weight: 700;
}

section div.card-header div.card-body div.sub-title div span.job-posted-at {
    width: auto;;
}

section div.card-header div.card-body div.sub-title div span.job-dot {
    margin: -3px 15px 0 15px;
}

section div.card-header div.card-body div.sub-title div span.job-contract {
    width: auto;
}

section div.card-header div.card-body div.sub-title div span.job-location {
    width: auto;
}

section div.card-footer {
    display: flex;
    flex-direction: row;
    align-items: center;
    flex-wrap: wrap;
    margin-top: 10px;
    justify-content: flex-end;
    flex-grow: 1;
}
</style>
