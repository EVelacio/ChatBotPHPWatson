<?php
   $relative_path = '';
   include_once($relative_path . 'app/global.php');
   include_once ($relative_path . 'html_templates/html_header.php');
   include_once ($relative_path . 'html_templates/nav_bar.php');
   
   if(empty($_SESSION['firstName']))
   {
      $_SESSION['firstName'] = 'Alumno';
      $_SESSION['lastName'] = 'Sistemas';
      $_SESSION['email'] = 'sistemas@ia.com';
      $_SESSION['uid'] = '12345678';
      $_SESSION['exp'] = time() + 36000;
   }
?>
      
      <div class="container-fluid">
         <div class="row">
           <div class="page-header text-center">
             <h2>Chatbot using IBM Watson Assistant</small></h2>
           </div>
           <div class="col-md-6 col-md-offset-3">
             <div class="thumbnail text-center">
               <img src="<?php echo base_url('assets/images/ebschatbot.png');?>" alt="" class="img-responsive" style="height: 100px;">
               <div class="caption">
                 <h3>Reservation Bot</h3>
                 <p>This chatbot is a demo of IBM Watson Assistant tool on building a chatbot.</p>
                 <p><a href="<?php echo base_url('app/ajax/conversation_start.php');?>" class="btn btn-danger" role="button">Launch Demo</a></p>
               </div>
             </div>
           </div>
         </div>
         <div class="well well-sm text-center">ITSLP - Inteligencia artificial - Equipo VIP</div>
      </div>
<?php
   include_once ($relative_path . 'html_templates/footer.php');
?>