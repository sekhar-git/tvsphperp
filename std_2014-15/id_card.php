<?php

include("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'admin' || $_SESSION['user_name'] == 'office') 
{
include("connect.php");

$today = date("d F Y");

$id = $_GET['id'];

$data = "SELECT date_format(birth_date,'%d %M %Y') birth_date, id, name, adm, class, bldgroup, idphoto FROM std_2014_15 WHERE id = '$id'";
$row = mysql_query($data);

while($result = mysql_fetch_array( $row ))
	 {
$srno = $result['id'];
$adm = $result['adm'];
$name = $result['name'];
$class = $result['class'];
$birth_date = $result['birth_date'];
//$adm_date = $result['adm_date'];
$bldgroup = $result['bldgroup'];
$idphoto = $result['idphoto'];
$year = date ('Y');


$html = '
<hr>
<div style="width:780px; color:black;">

<!----------------------- ID Card Front side design ----------------------------------------------->
<div style="width:330px; height:175px; font-size:10px; text-decoration:none; float:left; border:0.5px solid gray;"><br><br>
<div style="background-image:url(back.jpg); background-size: 50%; background-repeat:repeat;">
<div style="width:76px; margin-top:2px; height:96; margin-left:13px; margin-right:15px; float:left;">
<img style="padding:1px; border:3px solid lightgray;" src="upload/'.$idphoto.'" width=76 height=96>
</div>
<div stye="float:none; clear:both; height:0px;"></div>

<div style="float:right; margin-bottom:5px; margin-top:5px; margin-right:12px; width:180px; font-size:11px;">
<font style="font-size:15px; font-weight:bold;" >Sahyadri School</font><br>
<small style="font-size:9px;">Krishnamurti Foundation India</small>
<hr color="red" width="100%" style="margin-top:9px; height:1px;">
Name : '.$name.'<br><br>
Adm No. : '.$adm.'
</div></div><div stye="float:none; clear:both; height:0px;"></div>

<div style="float:left; margin-top:24px; width:320px;">
<div style="float:left; width:100px; font-size:9px;">
&nbsp; &nbsp; &nbsp; &nbsp; Signature
</div><div stye="float:none; clear:both; height:0px;"></div>

<div style="float:left; width:90px; font-size:9px;">
&nbsp; &nbsp; Sr. No: '.$year.'_'.$srno.' 
</div><div stye="float:none; clear:both; height:0px;"></div>


<div style="float:right; width:100px; font-size:9px;">
&nbsp; &nbsp; Authorised Signature
</div>

<div stye="float:none; clear:both; height:0px;"></div></div></div>

<!----------------------- ID Card Back side design ----------------------------------------------->

<div style="width:330px; height:175px; font-size:11px; text-decoration:none; float:right; border:0.5px solid gray;">
<p align="center" style="margin-bottom:2px;">This card must be presented on demand</p>
<div style="background-image:url(back.jpg); background-size: 50%; background-repeat:repeat;">
<div style="margin:auto auto auto auto; margin-bottom:5px; margin-top:5px; width:230px; border:1px solid gray; padding:3px;">
&nbsp; &nbsp; Date Of Birth : '.$birth_date.'<br>
&nbsp; &nbsp; Date Of Issue : '.$today.'<br>
&nbsp; &nbsp; Blood Group : '.$bldgroup.'<br>
</div></div>
<hr color="red" width="95%" style="margin-top:9px; height:1px;">
<div style="margin-left:15px; margin-top:-10px; font-size:10px; width:320px; padding:3px;">
<font>Sahyadri School - Krishnamurti Foundation India<br>
Post : Tiwai Hill, Tal: Rajgurunagar,<br>
Dist : Pune, Pin: 410513, Maharashtra, India<br>
Tel No. : (02135) 306100, 288442, 288443<br>
Email : sahyadrischool@gmail.com, Web: www.sahyadrischool.org</font>
<div stye="float:none; clear:both; height:0px;"></div></div> 
</div>
<hr>
</div>

';
}

//==============================================================
//==============================================================
//==============================================================

include("app_pdf/mpdf.php");

$mpdf=new mPDF(); 

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================

}
else
{
echo "<p align=center><font color=red>No Access! Please contact administrator.</font></p>";
}
?>
