<ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="<?php echo base_url()?>index.php/clogin/index" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
              
            </li>
            
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="user-check"></i><span>Personal</span></a>
              <ul class="dropdown-menu">
                <?php if($this->session->userdata("login_type")==2){
                    $rc =   $this->cmodel->getCrecord($this->session->userdata("customer_id"))->row();
                    if(!$rc->status){
                    	?> 
                    	
                    	<li><a href="<?php echo base_url()?>index.php/clogin/changeStatus">Activate Account</a></li>
                    	
                  <?php   }else{
                  	?>
                  	 <li><a class="nav-link" href="<?php echo base_url()?>index.php/clogin/customer_reg">New Registration</a></li>
               
                   <li><a href="<?php echo base_url();?>index.php/clogin/customer_profile">View/Edit Profile</a></li>
                    <li><a href="<?php echo base_url();?>index.php/clogin/customer_Account/">Account Info</a></li>
                  	<?php 
                      }}?>
               
               
              </ul>
            </li>
            <?php                     if(!$rc->status){?>
             <li >
              <a href="<?php echo base_url()?>index.php/clogin/customer_reg" class="nav-link "><i data-feather="briefcase"></i><span>New Registration</span></a>
              
            </li>
            <?php }?>
            
            
            
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="briefcase"></i><span>My Business</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/clogin/walletIncome">Wallet Balance</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/pin/generatePin/<?php echo $this->session->userdata("customer_id");?>">My MPin Details</a></li>
                
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/clogin/tree">My Tree</a></li>
              </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="anchor"></i><span>My Downline</span></a>
              <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url();?>index.php/clogin/downline/6">Downline</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/clogin/downline/1">Direct</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/clogin/downline/2">Gold</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/clogin/downline/3">Diamond</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/clogin/downline/4">Crown</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="command"></i><span>Transactions</span></a>
              <ul class="dropdown-menu">
                   <li><a class="nav-link" href="<?php echo base_url();?>index.php/clogin/income/7">Direct Income</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/clogin/income/1">Binary (Pair) Income</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/clogin/income/2">Auto Pool Income</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/clogin/income/3">ROI Income</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/clogin/income/8">Pair Capping</a></li>
              </ul>
            </li>
           
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="copy"></i><span>Complains/Query</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="alert.html">Complains</a></li>
                <li><a class="nav-link" href="badge.html">Query</a></li>
               </ul>
            </li>
             <li >
              <a href="<?php echo base_url();?>index.php/welcome/logout" class="nav-link "><i data-feather="anchor"></i><span>Log out</span></a>
              
            </li>
             
          </ul>