//funzione che mostra il modulo in ambito lavorativo
function display() {
       
    //prendo, seguendo l'ID, la div che contiene tutte le impostazioni
    let divLavoro =  document.getElementById("lavoro");
        //se NON checked (al momento del click) ALLORA rendilo disponibile 
         if ( !divLavoro.checked ) {
            divLavoro.style.display = "block";
            divLavoro.checked = true;          
        } else {
            divLavoro.style.display = "none";
            divLavoro.checked = false;
        }
     }
         
 

    function sendForm() 
    {
        
        let divLavoro =  document.getElementById("lavoro");
        if ( divLavoro.checked ) {
          
            //al momento dell'invio, se il checkbox risulta true, impostare una flag di necessità ai bottoni sottostanti
            document.getElementById("datestartjob").required = true;
            document.getElementById("datefinejob").required = true;
            document.getElementById("nameinc").required = true;
            document.getElementById("typeinc").required = true;
            document.getElementById("typework").required = true;
            document.getElementById("responsability").required = true;
            document.getElementById("description").required = true;
           
       } else {
          
            //Disattivo le impostazioni sottostanti
           document.getElementById("datestartjob").required = false;
           document.getElementById("datefinejob").required = false;
           document.getElementById("nameinc").required = false;
           document.getElementById("typeinc").required = false;
           document.getElementById("typework").required = false;
           document.getElementById("responsability").required = false;
           document.getElementById("description").required = false;

           //Elimino i precedenti contenuti
           document.getElementById("datestartjob").required = false;
           document.getElementById("datefinejob").value = null;
           document.getElementById("nameinc").value = null;
           document.getElementById("typeinc").value = null;
           document.getElementById("typework").value = null;
           document.getElementById("responsability").value = null;
           document.getElementById("description").value = null;

          

       }
    }