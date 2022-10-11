<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Calendar</title>
</head>
<body>
<input type="date" id="picker"  value="2022-10-01" min="2022-10-01">
<form method="post">
        <input type="submit" name="button1"
                class="button" value="Button1" />
          
        <input type="submit" name="button2"
                class="button" value="Button2" />
    </form>
<?php

$thisdate = date('Y-m-d');

if(isset($_POST['button1'])) {
    $thisdate = date('Y-m-d', strtotime($thisdate. "- 1 months"));
}
else if(isset($_POST['button2'])) {
    $thisdate = date('Y-m-d', strtotime($thisdate. "+ 1 months"));
}
 
$monthdays = cal_days_in_month(CAL_GREGORIAN, date('m') , date('Y'));

ob_start();
$eldiv = '<table id="rep"> 
          <tr>
          <th>0</th>
          <th id="monthheader">Month</th>
          </tr>
';
for ($i = 0; $i < $monthdays; $i++){
$dayof = date('l', strtotime($thisdate. "+".$i."days"));

$daynum = $i + 1;
$eldiv .= "<tr>";
$eldiv .= "<td> .$daynum. </td>";
if ($dayof == "Sunday"){
$eldiv .= "<td style='color:red'> .$dayof. </td>";
}
else{
    $eldiv .= "<td> .$dayof. </td>";
}
 $eldiv .= "</tr>";
}
$eldiv .= "</table>";
preg_replace('/<table>.*?</table>/s', '', $eldiv);
echo $eldiv;
?>
</body>
</html>