<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <a class="navbar-brand" href="./index.php">
            <img id="logo" class="d-inline-block" alt="Logo" src="./img/icons/heart-blue.png" style="height: 2.3rem;">
            <span>openWB</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardropSettings" data-toggle="dropdown">
                        Einstellungen
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="./settings/settings.php">Allgemein</a>
                        <a class="dropdown-item" href="./settings/pvconfig.php">PV-Ladeeinstellungen</a>
                        <a class="dropdown-item" href="./settings/smarthome.php">Smart Home</a>
                        <a class="dropdown-item" href="./settings/mqtt.php">MQTT-Brücke</a>
                        <a class="dropdown-item" href="./settings/modulconfig.php">Modulkonfiguration</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./settings/autoLock.php">Auto-Lock</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./settings/setTheme.php">Theme</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./settings/misc.php">Verschiedenes</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardropSystem" data-toggle="dropdown">
                        System
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#backupConfirmationModal">Backup erstellen</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#restoreConfirmationModal">Backup wiederherstellen</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#rebootConfirmationModal">Reboot</a>
                        <a class="dropdown-item" href="./settings/update.php">Update</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#downgradeConfirmationModal">Downgrade</a>
                        <a class="dropdown-item" href="./settings/debugging.php">Debugging</a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
</header>

<!-- modal backup-confirmation window -->
<div class="modal fade" id="backupConfirmationModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- modal header -->
            <div class="modal-header btn-blue">
                <h4 class="modal-title text-light">Info</h4>
            </div>

            <!-- modal body -->
            <div class="modal-body text-center">
                Das Erstellen des Backups kann einige Zeit in Anspruch nehmen.<br>
                Fortfahren?
            </div>

            <!-- modal footer -->
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-green" data-dismiss="modal" onclick="window.location.href='./tools/bckredirect.html'">Backup</button>
                <button type="button" class="btn btn-red" data-dismiss="modal">Abbruch</button>
            </div>

        </div>
    </div>
</div>

<!-- modal restore-confirmation window -->
<div class="modal fade" id="restoreConfirmationModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- modal header -->
            <div class="modal-header btn-red">
                <h4 class="modal-title text-light">Achtung</h4>
            </div>

            <!-- modal body -->
            <div class="modal-body text-center">
                        Soll wirklich ein gespeichertes Backup wiederhergestellt werden?
                        <br>
                        Die Wiederherstellung kann einige Zeit in Anspruch nehmen. Aktuelle Einstellungen werden mit dem Backup überschrieben!<br>
                        <br>
                        <b>
                            <span class="text-danger">Fahrzeuge sind vor der Wiederherstellung abzustecken!</span>
                        </b>
            </div>

            <!-- modal footer -->
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-green" data-dismiss="modal" onclick="window.location.href='./tools/upload.html'">Wiederherstellen</button>
                <button type="button" class="btn btn-red" data-dismiss="modal">Abbruch</button>
            </div>

        </div>
    </div>
</div>

<!-- modal reboot-confirmation window -->
<div class="modal fade" id="rebootConfirmationModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- modal header -->
            <div class="modal-header btn-red">
                <h4 class="modal-title text-light">Achtung</h4>
            </div>

            <!-- modal body -->
            <div class="modal-body text-center">
                Soll die openWB wirklich neu gestartet werden?
            </div>

            <!-- modal footer -->
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-green" data-dismiss="modal" onclick="window.location.href='./tools/reboot.html'">Reboot</button>
                <button type="button" class="btn btn-red" data-dismiss="modal">Abbruch</button>
            </div>

        </div>
    </div>
</div>

<!-- modal downgrade-confirmation window -->
<div class="modal fade" id="downgradeConfirmationModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- modal header -->
            <div class="modal-header btn-red">
                <h4 class="modal-title text-light">Achtung</h4>
            </div>

            <!-- modal body -->
            <div class="modal-body text-center">
                        Aktuelle Version: <?php echo file_get_contents('/var/www/html/openWB/web/version'); ?><br>
                        <br>
                        Soll wirklich ein Downgrade der openWB auf<br>
                        <b>Version 1.5 stable</b><br>
                        erfolgen?<br>
                        <br>
                        Das Downgrade kann einige Zeit in Anspruch nehmen. Alle Einstellungen bleiben erhalten.
                        Einige Optionen/Features der aktuellen Version sind nach erfolgreichem Downgrade ggf. nicht mehr verfügbar!<br>
                        <br>
                        <b>
                            Es wird empfohlen, zur Sicherheit zuvor ein Backup zu erstellen.<br>
                            <span class="text-danger">Fahrzeuge sind vor dem Downgrade abzustecken!</span>
                        </b>
            </div>

            <!-- modal footer -->
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-green" data-dismiss="modal" onclick="window.location.href='./tools/updateredirect15.html'">Downgrade</button>
                <button type="button" class="btn btn-red" data-dismiss="modal">Abbruch</button>
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">

</script>
