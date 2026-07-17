function valueselect()
{
    var i = document.getElementById('pekerjaan');
    var p = i.options[i.selectedIndex].value;
    alert(p);
    if (p == '11' || p == '15')
    {
    document.getElementById("sim").required = true;
    }
    else
    {
     document.getElementById("sim").required = false;
     
    }
}