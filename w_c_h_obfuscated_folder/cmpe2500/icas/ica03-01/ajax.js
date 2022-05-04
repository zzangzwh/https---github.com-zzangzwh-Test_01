function AjaxRequest( type, url, sendData, responseType, fncSuccess, fncFail )
{
  var options = {};
  options["type"] = type;
  options["url"] = url;
  options["data"] = sendData;
  options["dataType"] = responseType;
  options["success"] = fncSuccess;
  options["error"] = fncFail;
  $.ajax( options );
}

