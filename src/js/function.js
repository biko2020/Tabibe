
// fonction pour selectionner le jour du rendez-vous

function get_TdValue() {
       
   var Ttable = document.getElementById("T_table");
         
        for(var i = 0; i < Ttable.rows.length; i++) {
        
            for(var j = 0 ; j < Ttable.rows[i].cells.length; j++) {
                  
                 Ttable.rows[i].cells[j].onclick = function () {getRv_Date(this);} 
                    
            }

        }

}

function getRv_Date(_myRv,_toDay) {
    
    document.getElementById("dte").value = _myRv.innerHTML;

    _toDay =  _myRv.innerHTML;

 return _toDay;
 
}




