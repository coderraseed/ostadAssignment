<?php
$tuitionFee = 20000;
$discount1 = ($tuitionFee / 100) * 25;
$discount2 = ($tuitionFee / 100) * 20;
$discount3 = ($tuitionFee / 100) * 15;

$commCltr = ($tuitionFee >= 20000) ? "25% commission \${$discount1}" : (($tuitionFee >= 10000) ? "20% commission \${$discount2}" : (($tuitionFee >= 7000) ? "15% commission \${$discount3}" : "Not applicable for commission"));

echo $commCltr;