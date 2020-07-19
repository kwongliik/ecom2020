function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

function validate_product_price() {
   var x, text;
 
   // Get the value of the input field with id="numb"
   x = document.getElementById("product_price123").value;
 
   // If x is Not a Number or less than one or greater than 10000
   if (isNaN(x) || x < 1 || x > 10000) {
     text = "Invalid input of product price!";
     alert(text);
     return false;
   } 
 }