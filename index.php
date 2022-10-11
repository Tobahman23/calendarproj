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
                class="button" value="Previous month" />
          
        <input type="submit" name="button2"
                class="button" value="This month" />

                <input type="submit" name="button3"
                class="button" value="Next month" />
    </form>
<?php

$thisdate = date('Y-m-d');
$monthdays = cal_days_in_month(CAL_GREGORIAN, date('m') , date('Y'));
if(isset($_POST['button1'])) {
    $thisdate = date('Y-m-d', strtotime($thisdate. "- 1 months"));
    $monthdays = cal_days_in_month(CAL_GREGORIAN, date('m') , date('Y'));
}
else if(isset($_POST['button2'])) {
    $thisdate = $thisdate;
}
else if(isset($_POST['button3'])) {
    $thisdate = date('Y-m-d', strtotime($thisdate. "+ 1 months"));
}
 

ob_start();
$eldiv = '<table id="rep"> ';
for ($i = 0; $i < $monthdays; $i++){
$dayof = date('l', strtotime($thisdate. "+".$i."days"));
$weeknum = date('W', strtotime($thisdate. "+".$i."days". "- 7 days"));

$daynum = $i + 1;
if ($i == 0 && $months != date('M',strtotime($thisdate))){
$months = date('M', strtotime($thisdate));
$eldiv .= '<tr>';
$eldiv .= '<th>0</th>';
$eldiv .= "<th id='monthheader' name='montheader'>$months</th>";
$eldiv .= '</tr>';
}
$eldiv .= "<tr>";
$eldiv .= "<td> .$daynum. </td>";
if ($dayof == "Sunday"){
$eldiv .= "<td style='color:red'> .$dayof. </td>";
}
else if ($dayof == "Monday"){
    $eldiv .= "<td> .$dayof. week: $weeknum </td>";
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