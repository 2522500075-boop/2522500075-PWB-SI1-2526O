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

function tampilkanBiodata($conf, $arr)
{
$html = "";
foreach ($conf as $k => $v) {
$label = $v["label"];
$nilai = bersihkan($arr[$k] ?? '');
$suffix = $v["suffix"];
$html .= "<p><strong>{$label}</strong> {$nilai}{$suffix}</p>";
}
return $html;
}