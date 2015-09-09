<!Doctype HTML>

<head>
    <meta charset="utf-8" />
    <title> Urban Hair & Color </title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="style/skeleton.css" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href="style/normalize.css" rel="stylesheet" type="text/css"/>
    
    
    <script type="text/javascript">
    
    $(function(){
  var body = document.body, html = document.documentElement;
  var pageHeight = Math.max( body.scrollHeight, body.offsetHeight, 
    html.clientHeight, html.scrollHeight, html.offsetHeight );
  var windowHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
  var pages = Math.floor(pageHeight / windowHeight);
  $('.1').click(function(){
    $('html, body').animate({
        scrollTop: (0)
    }, 2000);
  });
  $('.2').click(function(){
    $('html, body').animate({
        scrollTop: (windowHeight)
    }, 2000);
  });
  $('.3').click(function(){
    $('html, body').animate({
        scrollTop: (windowHeight * 2)
    }, 2000);
  });
  $('.4').click(function(){
    $('html, body').animate({
        scrollTop: (windowHeight * 4)
    }, 2000);
  });
});

  </script>
</head>


<body>
    <div class='buttons'>
        <button class='button 1'>Accueil</button>
        <button class='button 2'>Produits</button>
        <button class='button 3'>Galerie</button>
        <button class='button 4'>Rendez-vous</button>
    </div>

<div class='outer full-height accueil pannel'>
  <div class='inner'> 
    <div class='center'>
      
      
      <div id="content-center">
            <h1 id="titre1"> Accueil </h1>
            <div class="bloc-large">
                <h2 id="titre2"> Urban Coiffure</h2>
                <p> Besoin à un moment de Bien-Être?
                    Traitement pour la Coloration des cheveux crée pour restructurer, colorer et conditionner dans une façon nouvelle, simple, sûre et sans ammoniaque.
                    Produits professionnels qui propose une formidable opportunité pour un service de coloration qui fait la différence des couleurs traditionnel.
                    Les colorations OIL de NYCE sont à base de principe actif et d’extraits naturels.
                    Une gamme de produits naturels qui satisfait le bien-être à la qualité.</p>
            </div>
        </div>
    </div>
  </div>
 </div>

    
    
    <!-- Produits -->
    
<div class='outer full-height produits pannel'>
  <div class='inner'>
    <div class='center big-text'>
        
        
        <div id="content-center">
            <h1 id="titre1"> Liste de Prix  </h1>
            <div class="bloc-large">
                <h2 id="titre2">N.Y.C.E - New York Costmetic Experience </h2>
                <p> Nous utilisons des produits de la marque N.Y.C.E afin de satisfaire les exigences de notre clientèle! </br> </br>
                    Nos clorations d’oxydation sont composé d’huile sans ammoniaque. Elle ne tache pas le cuir chevelu et permettent une haute pénétration des pigments dans le cheveu, avec une délicatesse absolue. 
                    De plus la composition est sans ammoniaque « ammonia free » et sans parfum « fragrance free »
                    donc, délicat pour le cuir chevelu et les cheveux. </br></br>
                    La couleur à une grande durée et une stabilité d'éclat, dans le temps. 
                    Nos produits garantisse une brillance maximale et la couverture des cheveux blancs à 100%. </br> </br>
                    Nous avons à disposition une gamme de 36 nuances intenses et lumineuses pour garantir la plus grande expression de la couleur et la plus grande personnalisation du service. </br></br>
                    Les produits N.Y.C.E sont exclusivement réservé aux coiffeurs. Cependant, vous pourrez trouver une gamme de prduits, tels que shampoign, soins, gel, etc.  disponible dans notre salon. </p>
                    </div>
            </div>
        </div>
    
                    
    </div>
  </div>
    
    
<!-- Galerie-->

<div class='outer full-height images pannel'>
  <div class='inner'>
    <div class='center'>
      <h1 id="titre1"> Galerie </h1>
      
       <!--<div class="bloc-large">-->
        <div id="galerie" >
            <img src="images/huile.JPG" alt="urban_produits" title=""/>
            <img src="images/shampoign.jpg" alt="urban_produits" title=""/>
            <img src="images/produit.JPG" alt="urban_produits" title=""/>
           <!-- <img src="img/DSC_0146.JPG" alt="urban_produits" title=""/>
            <img src="img/DSC_0173.JPG" alt="urban_produits" title=""/>-->
        </div> 
   
   <!-- </div>-->
  </div>
  </div>
</div>
    
<!--
<div class='outer half-height blue pannel'>
  <div class='inner'>
    <div class='center big-text'>
      half - height
    </div>
  </div>
 </div>-->



<!-- Rendez-vous -->

<div class='outer full-height rdv pannel'>
  <div class='inner'> 
    <div class='center'>
      
      
      <div id="content-center">
            <h1 id="titre1"> Rendez-vous </h1>
            <div class="bloc-large">
                
     
          <script src="//app.agenda.ch/javascripts/widget_over_2.js" type="text/javascript"></script>
          <script type="text/javascript">
              AgendaCH.renderButton({company:1228,btnStyle:2,btnTarget:'modal',btnText:"Prendre rendez-vous"})
            </script>
        
          
                <h2 id="titre2"> Besoin de nous contacter ?</h2>
                
                   <?php

             include('formular/formular.php');
             ?>
                <p> Choisissez votre date et remplissez le formulaire. </p>
                  </div>
<!--
               <div id="calendar">
                <h3>October</h3>
                <table>
                <tr><td class="lastmonth">30</td><td>1</td><td>2</td><td>3</td><td class="hastask">4</td><td>5</td><td>6</td></tr>
                <tr><td>7</td><td class="current">8</td><td class="hastask">9</td><td>10</td><td>11</td><td class="hastask">12</td><td>13</td></tr>
                <tr><td>14</td><td class="hastask">15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td></tr>
                <tr><td class="hastask">21</td><td>22</td><td>23</td><td>24</td><td>25</td><td class="hastask">26</td><td>27</td></tr>
                <tr><td>28</td><td>29</td><td class="hastask">30</td><td>31</td><td class="nextmonth">1</td><td>2</td><td>3</td></tr>
                </table>
                </div>
            
            <secti on>-->
           <!-- <h3>Formulaire de contact</h3>-->
             
             
            
           <!-- <div id="formular">
    
             <form>
            <input name="Nam" type="text" class="input name" placeholder="Name">
            <input name="Prenom" type="text" class="input name" placeholder="Prénom">
            <input name="email" type="text" class="input email" placeholder="email@email.com" />
            <input name="telephone" type="text" class="votre numéro" placeholder="Téléphone"/>
 
            <a href="#" id="boton">Envoyer<a/>
        
            </form>-->
     
   </div><!-- /formulario -->
    
 </section>
      
            </div>
        </div>
    </div>
  </div>
 </div>

<!-- QUARTER -->

<!--<div class='outer quarter-height red pannel'>
  <div class='inner'>
    <div class='center big-text'>
      quarter - height
    </div>
  </div>
 </div> 
<div class='outer quarter-height green pannel'>
  <div class='inner'>
    <div class='center big-text'>
      quarter - height
    </div>
  </div>
 </div>
<div class='outer quarter-height purple pannel'>
  <div class='inner'>
    <div class='center big-text'>
      quarter - height
    </div>
  </div>
 </div> 
<div class='outer quarter-height blue pannel'>
  <div class='inner'>
    <div class='center big-text'>
      quarter - height
    </div>
  </div>
 </div>--> 
</body>