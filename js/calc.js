var table = document.getElementById("table");
var sumVal = 0;
var prix = 25;
var salaire;

for (var i=1; i < table.rows.length; i++)
{
    sumVal = sumVal + parseFloat(table.rows[i].cells[9].innerHTML);
    salaire = sumVal * prix;

}
document.getElementById('val').innerHTML = sumVal;
document.getElementById('salaire').innerHTML = salaire;
