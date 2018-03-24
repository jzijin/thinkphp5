<?php
function acc() {
    if(cookie('name') === NULL || cookie('ccode') === NULL) {
        return false;
    }
    return cookie('ccode') == md5(cookie('name'));

    
}