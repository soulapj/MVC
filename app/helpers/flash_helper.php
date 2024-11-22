<?php
function flash($msg='', $class='alert alert-success') {
    if(!empty($msg)) {
        $_SESSION['flash'] = '<div class="alert alert-success">'.$msg.'</div>';
    } else {
        return '';
    }
}