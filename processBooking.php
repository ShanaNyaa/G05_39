<?php
    include "booking.php";

    if(isSet($_POST["approvalAcceptButton"])){
        approvalAccept();
    }

    if(isSet($_POST["approvalRejectButton"])){
        approvalReject();
    }

    if(isSet($_POST["approvalDeleteButton"])){
        approvalDelete();
    }
?>