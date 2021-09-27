require('./bootstrap');

window._ = require('lodash');

window.Vue = require('vue');
window.route = require('../route');

require('./element-ui-init');

/**
 * Global ajax error Handler
 * Handle HTTP response error status
 */
window.axios.interceptors.response.use(undefined, (err) => {
    let errResponse = err.response;
    const message = Vue.prototype.$message;
    const axAlert = Vue.prototype.$alert;

    if (
        !errResponse && err.message === 'Network Error'
        || !errResponse
        || errResponse.status === 503
    ) {
        message.error('Something went wrong. Please, try again');
        return;
    }

    if (errResponse.status === 500 || errResponse.status === 404) {
        message.error(errResponse.data?.message || 'Something went wrong. Please, try again');
    }

    if (errResponse.status === 403) {
        let options = {
            type: 'warning',
            showClose: true,
            duration: 5000,
            message: errResponse.data.message,
        }

        if (errResponse.headers.show_message_duration) {
            options.duration = errResponse.headers.show_message_duration;
        }

        message(options);
    }

    if (errResponse.status === 409 && (errResponse.data.title || errResponse.data.message)) {
        axAlert(
            errResponse.data.message || '',
            errResponse.data.title || '',
            {
                confirmButtonText: 'OK',
                type: 'warning',
            }
        ).catch(_ => {});
    }

    return Promise.reject(err);
});
