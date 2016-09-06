<script type="text/javascript">
function GetXmlHttpObject() 
{ 
var xmlHttp=null; 
try 
 	{ 
 	// Firefox, Opera 8.0+, Safari 
 	xmlHttp=new XMLHttpRequest(); 
 	} 
	catch (e) 
 	{ 
 	//Internet Explorer 
 	try 
 	{ 
 	xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); 
  	} 
 	catch (e) 
  	{ 
  	xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); 
  	} 
 	} 
return xmlHttp; 
}

function kirim(id) 
{ 
var xmlHttp=GetXmlHttpObject()	 
var url="modul/admin/ajax4.php"; 
url1=url+"?id="+id; 
xmlHttp.onreadystatechange=hasil; 
function hasil() 
	{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") 
 	              {	     
                      document.getElementById("tampil").innerHTML=xmlHttp.responseText; 
 	              } 
	else 
    	              { 
    	               alert("Problem retrieving data:" + xmlhttp.statusText); 
    	               }	 
	} 
	xmlHttp.open("GET",url1,true); 
	xmlHttp.send(null); 	 
}
</script>

<select name="prodi" OnChange="kirim(this.value)">
<option value='0'>- Pilih Prodi -</option>
<?php
$sql = mysql_query("SELECT * FROM prodi");
while ($dta = mysql_fetch_array($sql)){
	echo "<option value='$dta[idprodi]'>$dta[nama_prodi]</option>";
}
?>
</select>

<div id="tampil"> </div> 