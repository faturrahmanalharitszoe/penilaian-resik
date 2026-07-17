function ktpnumberonly(){

  var e = document.getElementById('no_ktp');

  if (!/^[0-9]+$/.test(e.value)) 
{ 
alert("Please enter only number.");
e.value = e.value.substring(0,e.value.length-1);
}
}   