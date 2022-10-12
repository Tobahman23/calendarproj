<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Calendar</title>
<link rel="stylesheet" href="index.css">
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
include 'namnsdag.php';
$thisdate = date('Y-m-d');
$monthdays = cal_days_in_month(CAL_GREGORIAN, date('m') , date('Y'));
$image = '<img src="spooky.webp" alt="spooky">';
if(isset($_POST['button1'])) {
    $thisdate = date('Y-m-d', strtotime($thisdate. "- 1 months"));   //kan bara ta bort eller lägga till en månad pågrund av att php är serverbaserat
    $monthdays = cal_days_in_month(CAL_GREGORIAN, date('m', strtotime(" - 1 months")) , date('Y'));
    $image = '<img src="september.jpeg">';
}
else if(isset($_POST['button2'])) {
    $thisdate = $thisdate;
    $image = '<img src="spooky.webp">';
}
else if(isset($_POST['button3'])) {
    $thisdate = date('Y-m-d', strtotime($thisdate. "+ 1 months"));
    $monthdays = cal_days_in_month(CAL_GREGORIAN, date('m', strtotime(" + 1 months")) , date('Y'));
    $image = '<img src="november.jpeg">';
}
 

ob_start();
$eldiv = '<table id="rep"> ';
for ($i = 0; $i < $monthdays; $i++){
$dag = date('d', strtotime($thisdate. "- 1 days"));

$dayof = date('l', strtotime($thisdate. "+".$i."days". "- $dag days"));
$weeknum = date('W', strtotime($thisdate. "+".$i."days". "- 7 days"));
$mony = date('m', strtotime($thisdate));
$yeary = date('Y', strtotime($thisdate));
$daynum = $i + 1;
$dateofyear = date('z', mktime(0,0,0,$mony, $daynum, $yeary))+1;
$dateofnamn = implode(" ", $namnsdag["$dateofyear"]);        
if ($i == 0 && $months != date('M',strtotime($thisdate))){
$months = date('M', strtotime($thisdate));
$eldiv .= "<tr class='monthheader'>";
$eldiv .= '<th>0</th>';
$eldiv .= "<th class='monthheader' name='montheader'>$months</th>";
$eldiv .= '</tr>';
}
$eldiv .= "<tr class='monw'>";
$eldiv .= "<td> $daynum. </td>";
if ($dayof == "Sunday"){
$eldiv .= "<td style='color:red'> $dayof </td>";
'<br>';
$eldiv .= "<td class='dty'> Day numner: $dateofyear</td>";
$eldiv .= "<td class='dty'> $dateofnamn</td>";
}
else if ($dayof == "Monday"){
    $eldiv .= "<td> $dayof week: $weeknum </td>";
    '<br';
    $eldiv .= "<td class='dty'>Day number: $dateofyear</td>";
    $eldiv .= "<td class='dty'> $dateofnamn</td>";
    }
else{
    $eldiv .= "<td> $dayof </td>";
    '<br>';
    $eldiv .= "<td class='dty'>Day number: $dateofyear</td>";
    $eldiv .= "<td class='dty'> $dateofnamn</td>";
}
 $eldiv .= "</tr>";
}
$eldiv .= "</table>";
preg_replace('/<table>.*?</table>/s', '', $eldiv);
echo $image;
echo $eldiv;
?>
</body>
</html>