<?php
session_start();

function isLoggedIn()
{
    if (isset($_SESSION['data_id'])) {
        return true;
    } else {
        return false;
    }
}
