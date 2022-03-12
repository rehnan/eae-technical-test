import axios from 'axios';

class Builder {
    config = {
        baseURL: '',
        params: {},
        headers: {},
        data: new FormData(),
    };

    constructor(baseUrl) {
        this.config.baseURL = baseUrl;
    }

    setMethod(method) {
        this.config.method = method;
        return this;
    }

    setData(data) {
        this.config.data = data;
        return this;
    }

    setBaseUrl(baseUrl) {
        this.config.baseURL = baseUrl;
        return this;
    }

    setUrl(url) {
        this.config.url = url;
        return this;
    }

    setParam(key, value) {
        this.config.params[key] = value;
        return this;
    }

    setParams(params) {
        console.log(params)
        for(const param of params) {
            this.setParam(param.name, param.value)
        }
        return this;
    }

    setHeader(key, value) {
        this.config.headers[key] = value;
        return this;
    }

    set(key, value) {
        this.config.data.append(key, value);
        return this;
    }

    setFile(key, file) {
        this.config.data.append(key, file);
        return this;
    }

    call() {
        return axios(this.config);
    }
}

export default function () {
    return new Builder('http://localhost:5001/v1/');
}
