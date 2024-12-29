<?php
function display_errors($msg, $title) {
    if (!empty($msg)) {
        echo '<script type="text/javascript">
            Swal.fire({
                title: "' . $title . '",
                text: "' . $msg . '",
                icon: "error"
            });
        </script>';
    }
}

function display_success($msg, $title) {
    if (!empty($msg)) {
        echo '<script type="text/javascript">
            Swal.fire({
                title: "' . $title . '",
                text: "' . $msg . '",
                icon: "success"
            });
        </script>';
    }
}
?>
