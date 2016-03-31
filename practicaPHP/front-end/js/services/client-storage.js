angular.module('practicaPHP01.services')
    /**
     * Almacena datos del lado del cliente.
     */
    .service('ClientStorage',
        function() {
            /**
             * @param key
             * @param object
             */
            var put = function(key, object) {
                localStorage.setItem(key, angular.toJson(object));
            };

            /**
             *
             * @param key
             * @returns {{}}
             */
            var get = function(key) {
                return angular.fromJson(localStorage.getItem(key));
            };

            /**
             *
             * @param key
             */
            var erase = function(key) {
                localStorage.removeItem(key);
            };

            return {
                erase: erase,
                get: get,
                put: put
            }
        }
    );
