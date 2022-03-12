import builder from '../builders/base';

export default {
    getJobs: query => builder()
        .setMethod('GET')
        .setUrl('jobs')
        .setParams(query)
        .call()
};
