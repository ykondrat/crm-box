        <script type="text/javascript">
            function digitalWatch() {
                var date = new Date();
                var hours = date.getHours();
                var minutes = date.getMinutes();

                if (hours < 10) {
                    hours = "0" + hours;
                }
                if (minutes < 10) {
                    minutes = "0" + minutes;
                }
                document.getElementById("digital_watch").innerHTML = hours + ":" + minutes;
                setTimeout("digitalWatch()", 1000);
            }
        </script>
        <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
        <script src="./public/javascript/sign-forms.js"></script>
        <script src="./public/javascript/handelRoutes.js"></script>
        <script src="./public/javascript/service.js"></script>
    </body>
</html>