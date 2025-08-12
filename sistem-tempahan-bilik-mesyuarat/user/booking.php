<?php require_once __DIR__ . '/../init.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="Template/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="Template/custom.css" media="screen" />
<link rel="stylesheet" type="text/css" href="Template/timePicker.css" media="screen" />
<link rel="stylesheet" href="Template/jquery-ui-1.7.custom.css" type="text/css" />
<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="jquery/jquery.timepicker.js"></script>
<script type="text/javascript" src="jquery/jquery.charcounter.js"></script>
<title>SISTEM TEMPAHAN BILIK MESYUARAT</title>
<script>var delay = null; currDisplay = null;function layerout(obj, bgid){var element= document.getElementById(bgid);if(element!=currDisplay){if (currDisplay) { currDisplay.style.cssText+=";display:none;"; }} clearTimeout(delay);var x,y;oRect=obj.getBoundingClientRect();x= oRect.left;y= oRect.bottom;h=obj.offsetHeight;sh = 0;sh=Math.max(document.documentElement.scrollTop, document.body.scrollTop);delay= window.setTimeout(function(){element.style.cssText+=";display:block;left:"+x+"px;top:"+(y+sh+5)+"px;";},800)}function layerin(obj,e,bgid) {clearTimeout(delay); var element = document.getElementById(bgid);currDisplay = element;if (e.currentTarget){if (e.relatedTarget != obj){if (obj != e.relatedTarget.parentNode){delay = window.setTimeout(function(){element.style.cssText+=";display:none;";}, 500);}}} else {if (e.toElement != obj){if (obj != e.toElement.parentNode) {delay = window.setTimeout(function(){element.style.cssText+=";display:none;";}, 500);}}}};function MyClose(divId){clearTimeout(delay);var element = document.getElementById(divId);element.style.cssText+=";display:none;"};</script><style type="text/css">
:root #header + #content > #left > #rlblock_left
{ display: none !important; }</style></head>

</head>

<body>
<div id="header">
        <div class="sleeve">
            <img src="Image/logoPDTbatugajah.png" width="500" height="81" />
            <small>
                <a href="../index.php">Sistem Tempahan Bilik Mesyuarat </a>
            </small>
            <div class="navbar">
                <span><a href="../user.php">Laman Utama</a></span>
                <span><a href="#">Kalendar</a></span>
                <span class="current"><a href="booking.php">Tempahan</a></span>
            </div>
        </div>
    </div>
    
    <div class="disabled" id="wrapper">
    <div class="sleeve_main">
            <div id="main">
                <h2>Tempahan</h2>
                
             <form action="addbookingdata.php" method="post" id="addform">
            <input type="hidden" name="csrf_token" value="<?php echo e(get_csrf_token()); ?>" />
            <p>
                 <label>Unit</label>
                <select name="unit">
                <option value="Tanah">Tanah</option>
                <option value="BKP">BKP</option>
                <option value="PLB">PLB</option>
                </select>
              </p>
            <p>
              <label>Nama Mesyuarat</label>
              <input type="text" placeholder="" name="meetingname" required>
        </p>
            <p>
              <label>Date</label>
              <input name="date" type="text" id="Datepicker" placeholder=""  required>
        </p>
        <p>
            <label>Tempat/Bilik Mesyuarat</label>
            <select name="Place">
                <option value="Bunga Raya">Bunga Raya</option>
                <option value="Unit Pelupusan">Unit Pelupusan</option>
                <option value="Pejabat Tanah Tingkat 3">Pejabat Tanah Tingkat 3</option>
                <option value="Lain Lain">Lain Lain</option>
                </select>
        </p> 
        <p>
            <label>Jumlah Ahli Mesyuarat</label>
            <input type="text" placeholder="" name="memnumber" required>
        </p>
        <p>
            <label>Tempahan Makanan</label>
            <select name="food">
                <option value="Set A">Set A</option>
                <option value="Set B">Set B</option>
                <option value="Set C">Set C</option>
                </select>
        </p>  
            <input type="submit" name="submit" value="Submit"></input>
            <input type="reset" name="reset" value="Reset" />
        </form>
    </div>
    </div>
    </div>
</body>
</html>