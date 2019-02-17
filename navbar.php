<?php

?>




    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
    <div id="mySidenav" class="sidenav" style="width: 150px ">

        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "150px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>


