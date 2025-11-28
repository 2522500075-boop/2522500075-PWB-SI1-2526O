<?php  
function bersihkan($str)
{
    return htmlspecialchars(trim($str));
}

function tidakkosong(str)
{
    return starlen(trim($strm)) > 0;
}

function formattanggal($tgl)
{
    return date("d M Y", strtotime($tgl));
}