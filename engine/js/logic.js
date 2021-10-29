//funzione che mostra il modulo in ambito lavorativo

function moreLavorativa() {
    let presetLavorativa = `
    <h1> Ulteriore esperienza </h1>
    <h3>Sezione esperienza lavorativa</h3>
        

    
    <label id="datestartjob">Inserisci la data d'inizio del lavoro...<input class="input-group-text" type="date" id="datestartjob" name="datestartjob[]" placeholder="Inserisci la data di inizio  lavoro" autocomplete="off"></label><br>

    <label id="datefinejob">Inserisci la data fine lavoro...<input class="input-group-text" type="date" id="datefinejob"
        name="datefinejob[]" placeholder="Inserisci la data di fine  lavoro" 
        autocomplete="off"></label><br><br>

   
    <input class="form-control" type="text" id="nameinc" name="nameinc[]" placeholder="Inserisci nome o indirizzo dell’azienda o datore di lavoro..." required=""
           autocomplete="off"><br>

    
    <input class="form-control" type="text" id="typeinc" name="typeinc[]"
        placeholder="Inserisci il tipo di azienda o settore..." required="" autocomplete="off"
         ><br>

    
    <input class="form-control" type="text" id="typework" name="typework[]" placeholder="Inserisci la tipologia dell'impiego" required=""
        autocomplete="off"  ><br>

    
    <input class="form-control" type="text" id="responsability" name="responsability[]" placeholder="Tipo di responsabilità.." required=""
        autocomplete="off"  ><br>
   
    <textarea class="form-control" id="description" name="description[]" placeholder="Inserisci una breve descrizione" required="" autocomplete="off"  rows="16" cols="100%"></textarea>
   <br /><br /> <br />\r\n`;

  
    document.getElementById('more').innerHTML += presetLavorativa; 
   

     }
         
     function moreLingua() 
     {
        let presetLingua = `
        <h1> Lingua extra </h1>
        <h3>Sezione lingua extra</h3>
        <input class="form-control" type="text" id="linguaExtra" name="linguaExtra[]"
             placeholder="Inserisci la lingua.." autocomplete="off"><br>
          
             Capacità di lettura  <select class="form-select" name="lettura[]" id="lettura">
                   <option value="Eccellente">Eccellente</option>
                   <option value="Buono">Buono</option>
                   <option value="Elementare">Elementare</option>
                 </select>
            Capacità di scrittura  <select class="form-select" name="scrittura[]" id="scrittura">
                   <option value="Eccellente">Eccellente</option>
                   <option value="Buono">Buono</option>
                   <option value="Elementare">Elementare</option>
                 </select>
            Capacità di espressione orale  <select class="form-select" name="orale[]" id="orale">
                   <option value="Eccellente">Eccellente</option>
                   <option value="Buono">Buono</option>
                   <option value="Elementare">Elementare</option>
                 </select>
            `;
        document.getElementById('lingua').innerHTML += presetLingua;
       
     }
     function moreScolastiche()
     {
         let presetSchool = `
         <h2>Ulteriore formazione scolastica</h2> 
         <label id="dateStartSchool">Inserisci la data d'inizio della formazione<input class="input-group-text" type="date" id="dateStartSchool" name="dateStartSchool[]" placeholder="Inserisci la data d'inizio della formazione" autocomplete="off"></label><br>
  
         <label id="dateEndSchool">Inserisci la data della fine della formazione<input class="input-group-text" type="date" id="dateEndSchool"
             name="dateEndSchool[]" placeholder="Inserisci la data della fine della formazione" 
             autocomplete="off"></label><br><br>
  
        
         <input class="form-control" type="text" id="typeschool" name="typeschool[]" placeholder="Tipo di istruzione o formazione" required=""
                autocomplete="off"><br>
  
        
         <input class="form-control" type="text" id="principaliMaterie" name="principaliMaterie[]"
             placeholder="Principali materie/abilità professionali oggetto dello studio " required="" autocomplete="off"
              ><br>
  
       
         <input class="form-control" type="text" id="qualifica" name="qualifica[]" placeholder="Qualifica conseguita" required=""
             autocomplete="off"  ><br>
             <h3>Aggiungere più formazioni scolastiche?</h3>
           <input class="btn btn-dark form-control" type="button" name="scolastiche"  onclick="moreScolastiche()" value="Aggiungi formazione extra!" />
             `;
             document.getElementById('istruzione').innerHTML += presetSchool;
     }

    function initialize() 
    {
        var script = document.createElement("script");
        script.innerHTML = ` 
        
        var btnTop = $('#button');
        var btnBottom = $('#buttonBottom');
    
        btnBottom.addClass('show');
        $(window).scroll(function() {
          if ($(window).scrollTop() > 300) {
            btnTop.addClass('show');
           
          } else {
            btnTop.removeClass('show');
           
          }
         
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
               btnBottom.removeClass('show');
            } 
            else 
            {
                btnBottom.addClass('show');
            }
       
        });
        btnBottom.on('click', function(e) {
            e.preventDefault();
            $("html, body").animate({ scrollTop: $(document).height() }, 100);
          });
     
        btnTop.on('click', function(e) {
          e.preventDefault();
          $('html, body').animate({scrollTop:0}, 100);
        });
        
        `;
    
        document.head.appendChild(script);
    
    
    }

   
