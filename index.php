<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Calendar</title>
<link rel="stylesheet" href="index.css">
</head>
<body>

    <form method="post" action="okok.php">
    <label for="birthday">Birthday:</label>
    <input id="birthday" name="birthday" type="text"/>
    <label for="name">Name:</label>
    <input id="name" name="name" type="text"/>
    <input type="submit" name="subm" value="Done"/>
    </form>

<?php
echo `whoami`;
error_reporting(E_ALL); 
ini_set('display_errors','1'); 
include 'namnsdag.php';
include 'birthdays.txt';
$thisd = $_GET['date'] ?? date('Y-m-d');

$thisdate=date($thisd); 

$thisdatum = strtotime($thisdate);

$monthdays = cal_days_in_month(CAL_GREGORIAN, date('m', strtotime($thisdate)) , date('Y', strtotime($thisdate)));
$image = '<img src="spooky.webp" alt="spooky">';

 $prevmonth = date('Y-m-01', strtotime("-1 month", $thisdatum));
 $nextmonth = date('Y-m-01', strtotime("+1 month", $thisdatum));


ob_start();
$eldiv = '<table id="rep"> ';
for ($i = 0; $i < $monthdays; $i++){
$dag = date('d', strtotime($thisdate. "+ 6 days"));

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
if($months == "Oct")
{
    $image = '<img src="spooky.webp" alt="october">';
}
else if($months == "Nov")
{
    $image = '<img src="november.jpeg" alt="november">';
}
else if($months == "Dec")
{
    $image = '<img src="december.jpeg" alt="december">';
}
else if($months == "Jan")
{
    $image = '<img src="january.jpeg" alt="january">';
}
else if($months == "Feb")
{
    $image = '<img src="february.jpeg" alt="february">';
}
else if($months == "Mar")
{
    $image = '<img src="march.jpeg" alt="march">';
}
else if($months == "Apr")
{
    $image = '<img src="april.jpeg" alt="april">';
}
else if($months == "May")
{
    $image = '<img src="may.jpeg" alt="may">';
}
else if($months == "Jun")
{
    $image = '<img src="june.jpeg" alt="june">';
}
else if($months == "Jul")
{
    $image = '<img src="july.jpeg" alt="july">';
}
else if($months == "Aug")
{
    $image = '<img src="august.jpeg" alt="august">';
}
else {
    $image = '<img src="september.jpeg" alt="september">';
}
}
$eldiv .= "</table>";
preg_replace('/<table>.*?</table>/s', '', $eldiv);
echo $image;
echo $eldiv;
 
#$myfile = fopen("birthdays.txt", "a+") or die("unable");
#$txt = $_POST['birthday']." ".$_POST['name'];
#fwrite($myfile, $txt);
#fclose($myfile);

?>
   <br><br>
  <a href="<?php echo '?date='.$prevmonth ?>" class="button">Previous Month</a>
  <a href="<?php echo '?date='.$nextmonth ?>" class="button">Next <br>Month</a>
</body>
</html>