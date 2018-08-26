(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"blog","name":"blog","action":"Modules\Blog\Http\Controllers\BlogController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin","name":"admin","action":"Modules\Staff\Http\Controllers\HomeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/staff","name":"staff","action":"Modules\Staff\Http\Controllers\StaffController@index"},{"host":null,"methods":["POST"],"uri":"admin\/staff\/get-list-staff","name":"staff.get-list-staff","action":"Modules\Staff\Http\Controllers\StaffController@getListStaff"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/staff\/modal-create","name":"staff.create","action":"Modules\Staff\Http\Controllers\StaffController@create"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/staff\/modal-edit\/{id}","name":"staff.edit","action":"Modules\Staff\Http\Controllers\StaffController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/staff\/create-staff","name":"staff.create-staff","action":"Modules\Staff\Http\Controllers\StaffController@store"},{"host":null,"methods":["POST"],"uri":"admin\/staff\/update-staff","name":"staff.update-staff","action":"Modules\Staff\Http\Controllers\StaffController@update"},{"host":null,"methods":["POST"],"uri":"admin\/staff\/change-status-staff","name":"staff.change-status-staff","action":"Modules\Staff\Http\Controllers\StaffController@changeStatus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/staff\/destroy-staff\/{id}","name":"staff.destroy-staff","action":"Modules\Staff\Http\Controllers\StaffController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/staff\/show-action-change","name":"staff.show-action-change","action":"Modules\Staff\Http\Controllers\StaffController@showChangeAction"},{"host":null,"methods":["POST"],"uri":"admin\/staff\/status-staff","name":"staff.status-staff","action":"Modules\Staff\Http\Controllers\StaffController@getListStatus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/category","name":"category","action":"Modules\Staff\Http\Controllers\CategoryController@index"},{"host":null,"methods":["POST"],"uri":"admin\/category\/update-category","name":"category.update-category","action":"Modules\Staff\Http\Controllers\CategoryController@updateCategory"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"App\Http\Controllers\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":null,"action":"App\Http\Controllers\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"logout","name":"logout","action":"App\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"register","name":"register","action":"App\Http\Controllers\Auth\RegisterController@showRegistrationForm"},{"host":null,"methods":["POST"],"uri":"register","name":null,"action":"App\Http\Controllers\Auth\RegisterController@register"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset","name":"password.request","action":"App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm"},{"host":null,"methods":["POST"],"uri":"password\/email","name":"password.email","action":"App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset\/{token}","name":"password.reset","action":"App\Http\Controllers\Auth\ResetPasswordController@showResetForm"},{"host":null,"methods":["POST"],"uri":"password\/reset","name":null,"action":"App\Http\Controllers\Auth\ResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/login","name":"admin.login","action":"App\Http\Controllers\Auth\StaffLoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"admin\/login","name":"admin.login.submit","action":"App\Http\Controllers\Auth\StaffLoginController@login"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/logout","name":"admin.logout","action":"App\Http\Controllers\Auth\StaffLoginController@logout"},{"host":null,"methods":["POST"],"uri":"admin\/password\/email","name":"admin.password.email","action":"App\Http\Controllers\Auth\AdminForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/password\/reset","name":"admin.password.request","action":"App\Http\Controllers\Auth\AdminForgotPasswordController@showListaffs.loginnkRequestForm"},{"host":null,"methods":["POST"],"uri":"admin\/password\/reset","name":null,"action":"App\Http\Controllers\Auth\AdminResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/password\/reset\/{token}","name":"admin.password.reset","action":"App\Http\Controllers\Auth\AdminResetPasswordController@showResetForm"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"home","name":"home","action":"App\Http\Controllers\HomeController@index"}],
            prefix: 'http://localhost/cms',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

