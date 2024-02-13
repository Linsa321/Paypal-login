
<form method="POST" >
    @csrf
    <span id='lippButton'></span>
        <script src='https://www.paypalobjects.com/js/external/api.js'></script>
            <script>
            paypal.use( ['login'], function (login) {
            login.render ({
                "appid":"AcrZMWqMYi0BJ5DcLEjD4rHHhcXwzOOURe3eAOslueXid3umJKktewa0JIrYf5xDOPw9vq18mXJsWZ9O",
                "authend":"sandbox",
                "scopes":"openid profile email",
                "containerid":"lippButton",
                "responseType":"code id_Token",
                "locale":"en-in",
                "buttonType":"LWP",
                "buttonShape":"pill",
                "buttonSize":"lg",
                "fullPage":"true",
                "returnurl":"http://paypal-login.test/paypal-success-return"
            });
        });
        </script>
</form>


