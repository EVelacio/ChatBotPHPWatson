<!-- Navigation -->
       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           <div class="container-fluid">
               <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                       <span class="sr-only">Toggle navigation</span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                   </button>
                   <a class="navbar-brand" href="<?php echo base_url();?>">Chatbot Demo</a>
               </div>
               <!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                   <ul class="nav navbar-nav">
                       <li>
                           <a href="<?php echo base_url('app/ajax/conversation_start.php');?>">Reservation ChatBot</a>
                       </li>
                   </ul>
                   <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="#"><?php (isset($_SESSION['firstName'])) ? print 'Welcome ' . $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] : print 'Guest'; ?></a>
                       </li>
                   </ul>
               </div>
               <!-- /.navbar-collapse -->
           </div>
       </nav>