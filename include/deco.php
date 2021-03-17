<?php

    if(isset($_SESSION["charge"])) {
        session_unset();
?>
    <script type="text/javascript">
        window.location.href = "index.php";
    </script>
<?php
    }
    else
    {
        ?>
        <script type="text/javascript">
        window.location.href = 'index.php';
        </script>
        <?php
    }

?>
