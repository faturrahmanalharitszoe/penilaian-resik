function valueselect()
{
    var i = document.getElementById('bagian');
    var p = i.options[i.selectedIndex].value;
    if (p == '11' || p == '15')
    {
    document.getElementById("sim").required = true;
    document.getElementById("lb_sim").innerHTML = "Surat Izin Mengemudi "+"<span style='color: red;'>*</span>";
    }
    else
    {
     document.getElementById("sim").required = false;
     document.getElementById("lb_sim").innerHTML = "Surat Izin Mengemudi (jika ada)";
     
    }
}