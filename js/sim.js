function simnumberonly(){

  var e = document.getElementById('no_sim');

  if (!/^[0-9]+$/.test(e.value)) 
{ 
alert("Please enter only number.");
e.value = e.value.substring(0,e.value.length-1);
}
}   