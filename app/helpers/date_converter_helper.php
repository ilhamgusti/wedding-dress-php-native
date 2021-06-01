<?php

function dateConverter($stringDate = '', $format = 'Y-m-d')
{
    return date($format, strtotime($stringDate));
}
