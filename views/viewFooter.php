    </div>
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
            document.getElementById("digital_watch").innerHTML = hours + ":" + minutes;// + ":" + seconds;
            setTimeout("digitalWatch()", 1000);
        }
    </script>
</body>
