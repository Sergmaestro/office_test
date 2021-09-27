var routes = window.Laravel.routes;
window.Laravel.baseUrl = process.env.MIX_APP_URL;

module.exports = function () {
    let args = Array.prototype.slice.call(arguments);
    let name = args.shift();

    if (routes[name] === undefined) {
        console.error('Route not found ', name);
    } else {
        let params = args[0] || [];

        return window.Laravel.baseUrl + '/' + routes[name]
            .split('/')
            .map(function(routePart) {
                let param = params
                if (typeof (params) === 'object') {
                    param = params[routePart.substring(1, routePart.length - 1)]
                }

                return routePart[0] === '{' ? param : routePart;
            })
            .join('/');
    }
};
