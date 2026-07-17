function lainselect()
{
    var i = document.getElementById('pendidikan');
    var p = i.options[i.selectedIndex].value;
    if (p == 'Lain-Lain')
    {
    document.getElementById("pendidikan_lain").disabled = false;
    }
    else
    {
     document.getElementById("pendidikan_lain").disabled = true;
    }
}