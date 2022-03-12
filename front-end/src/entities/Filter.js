export class Filter {
    constructor(data = {}) {
        const {name, value} = data;
        this.filterable = !!['role', 'level'].includes(name);
        this.name = name;
        this.value = value;
    }

    /**
     * Return if the current filter is filterable
     * @returns {boolean}
     */
    isFilterable() {
        return this.filterable;
    }

    getFilter() {
        return {[this.name]: this.value};
    }
}
