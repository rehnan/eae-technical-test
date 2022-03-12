import { createStore } from 'vuex';
import job from '@/store/modules/job';

const store = createStore({
    modules: {
        job
    }
});

export default store;
