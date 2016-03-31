angular.module('practicaPHP01.services')
    /**
     * Encargado de todas las operaciones relacionadas con los usuarios.
     */
    .service('UserService', ['$http', 'ClientStorage', function ($http, ClientStorage) {
        /**
         *
         * @param email
         * @param password
         */
        var currentUser={};

        var login = function(email, password) {
            var result = {
                success: false,
                message: null
            };

            if(email && password){
                //"./back-end/index.php/user/login";
                var url= "/NATY/practicaPHP/back-end/index.php/user/login";
                var data= {
                    email: email,
                    password: password
                };

                var config = {
                    headers : {
                        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                    }
                }
                
                result= $http.post(url, data)
                
                .success(function (data, status) {
                    currentUser = data;

                    console.log("printing currentUser", currentUser);
                     console.log(status);

                })
                .error(function (data, status) {
                    console.log("promise error");
                    console.log(status);
                    console.log(data);
                })
                 console.debug(result);

            };

            return result;
        };

        /**
         * Cierra la sesión del usuario.
         *
         * @returns {boolean}
         */
        var logout = function logout() {
            var result = {
                success: false,
                message: null
            };

            return result;
        };

        /**
         * Registra un usuario en el sistema.
         *
         * @param email
         * @param password
         *
         */
        var register = function register(email, password) {
            var result = {
                success: false,
                message: null
            };

            return result;
        };

        /**
         * Revisa si el usuario tiene una sesión activa.
         *
         * @returns {boolean}
         */
        var isLoggedIn = function isLoggedIn() {
            var result = {
                success: false,
                message: null
            };
            var currentSession= ClientStorage.get('currentUser');
            if(currentSession){
                result.success= true;
                result.message= "si hay sesión activa";
            }else{
                result.message= "sesión no encontrada";
                console.log(result.message);
                login();
            };

            return result;
        };

        /**
         * Obtiene información sobre el usuario actual.
         *
         * @returns {{email: string, fullName: string}}|null
         */
        var getCurrentUser = function getCurrentUser() {
            var user = {
                email: null,
                fullName: null
            };
            var currentUser= ClientStorage.get('currentUser');
            if(currentUser){
                user.email= currentUser.email;
                user.fullName= currentUser.fullName;
                console.log("si hay usuario");
            }else{
                console.log("no hay usuario");
            };

            return user;
        };

        return {
            getCurrentUser: getCurrentUser,
            isLoggedIn: isLoggedIn,
            login: login,
            logout: logout,
            register: register
        };
    }]);
