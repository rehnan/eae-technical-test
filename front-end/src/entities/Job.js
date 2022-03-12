import { Filter } from '@/entities/Filter';

export class Job {
    constructor(data = {}) {
        const {
            id,
            logo,
            new: isNew,
            featured: highlighted,
            postedAt,
            company,
            contract,
            location,
            level,
            role,
            languages,
            tools
        } = data;

        this.filters = [];
        this.id = id;
        this.logo = logo;
        this.isNew = isNew;
        this.highlighted = highlighted;
        this.postedAt = new Date(postedAt);
        this.company = company;
        this.contract = contract;
        this.location = location;
        this.level = level;
        this.role = role;
        this.languages = languages;
        this.tools = tools;

        this.addFilter(new Filter({name: 'level', value: this.level}))
        this.addFilter(new Filter({name: 'role', value: this.role}))

        this.languages.forEach(value => this.addFilter(new Filter({name: 'language', value})))
        this.tools.forEach(value => this.addFilter(new Filter({name: 'tool', value})))
    }

    /**
     * Get logo path
     * @returns {string}
     */
    getLogoPath() {
        return `data:image/svg+xml;base64,${this.logo}`;
    }

    /**
     * Add job filter
     *
     * @param filter
     */
    addFilter(filter) {
        this.filters.push(filter);
    }

    /**
     * Get job filters
     *
     * @returns {[]}
     */
    getFilters() {
        return this.filters;
    }
}
