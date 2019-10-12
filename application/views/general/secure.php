<!--	
*	############################################################################################
*
*	Website Desa Babakan ERG UNIKOM
*	--------------------------------------------------------------------------------------------
*
*	Version		: 	1.0
*	Author		: 	Embedded Research Group | Web Team - 2019/2020 - ERG
*	Website		: 	https://desa-babakan.id/
*	Copyright	: 	Copyright 2019
*	
*	############################################################################################
-->

<!-- SECURITY WEBSITE -->
<!-- Code for showing a warning information to activate browser javascript -->
<div align="center"><noscript>
        <div style="position:fixed; top:0px; left:0px; z-index:3000; height:100%; width:100%; background-color:#FFFFFF">
            <div style="font-family: Arial; font-size: 17px; background-color:#00bbf9; padding: 11pt;">Mohon aktifkan
                javascript pada browser untuk mengakses halaman ini!</div>
        </div>
    </noscript></div>

<!-- Code for preventing selection text -->
<script type="text/javascript">
    function disableSelection(e) {
        if (typeof e.onselectstart != "undefined") e.onselectstart = function () {
            return false
        };
        else if (typeof e.style.MozUserSelect != "undefined") e.style.MozUserSelect = "none";
        else e.onmousedown = function () {
            return false
        };
        e.style.cursor = "default"
    }
    window.onload = function () {
        disableSelection(document.body)
    }
</script>

<!-- Code for shutting down the function of right click on browser -->
<script type="text/javascript">
    function mousedwn(e) {
        try {
            if (event.button == 2 || event.button == 3) return false
        } catch (e) {
            if (e.which == 3) return false
        }
    }
    document.oncontextmenu = function () {
        return false
    };
    document.ondragstart = function () {
        return false
    };
    document.onmousedown = mousedwn
</script>

<style type="text/css">
    * : (input, textarea) {
        -webkit-touch-callout: none;
        -webkit-user-select: none;

    }
</style>
<style type="text/css">
    img {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
    }
</style>

<!-- Code for preventing keyboard shortcut -->
<script type="text/javascript">
    window.addEventListener("keydown", function (e) {
        if (e.ctrlKey && (e.which == 65 || e.which == 66 || e.which == 67 || e.which == 73 || e.which == 80 || e
                .which == 83 || e.which == 85 || e.which == 86)) {
            e.preventDefault()
        }
    });
    document.keypress = function (e) {
        if (e.ctrlKey && (e.which == 65 || e.which == 66 || e.which == 67 || e.which == 73 || e.which == 80 || e
                .which == 83 || e.which == 85 || e.which == 86)) {}
        return false
    }
</script>
<script type="text/javascript">
    document.onkeydown = function (e) {
        e = e || window.event;
        if (e.keyCode == 123 || e.keyCode == 18) {
            return false
        }
    }
</script>