<?php include_once "header.php"; ?>
    
    <!-- Main Wrapper -->
    <div id="mws-wrapper">
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        	
            <!-- Search Box -->
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="">
                	<input type="text" class="mws-search-input" />
                    <input type="submit" class="mws-search-submit" />
                </form>
            </div>
			
            <?php include_once "main_navigation.php";?>
			
        </div>
        
        
        <!-- Container Wrapper -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Main Container -->
            <div class="container">
            
            	<?php include_once "top_indicator.php"; ?>
                
            	<div class="mws-panel grid_5">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-graph">Charts</span>
                    </div>
                    <div class="mws-panel-body">
                    	<div class="mws-panel-content">
	                    	<div id="mws-dashboard-chart" style="width:100%; height:215px;"></div>
                        </div>
                    </div>
                </div>
                
            	<div class="mws-panel grid_3">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-books-2">Website Summary</span>
                    </div>
                    <div class="mws-panel-body">
                        <ul class="mws-summary">
                            <li>
                                <span>1238</span> total visits
                            </li>
                            <li>
                                <span>11</span> new members
                            </li>
                            <li>
                                <span>716</span> products
                            </li>
                            
                            <li>
                                <span>312</span> items purchased
                            </li>
                        </ul>
                    </div>
                </div>
                
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-sign-post">Add New User</span>
                    </div>
                    <div class="mws-panel-body">
                        <div class="mws-wizard clearfix">
                            <ul>
                                <li>
                                    <a class="mws-ic-16 ic-accept" href="#">User Profile</a>
                                </li>
                                <li class="current">
                                    <a href="#" class="mws-ic-16 ic-delivery">User Authentication</a>
                                </li>
                                <li>
                                    <a class="mws-ic-16 ic-user" href="#">Email Confirmation</a>
                                </li>
                            </ul>
                        </div>
                    	<form class="mws-form" action="">
                    		<div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label>Fullname</label>
                                    <div class="mws-form-item large">
                                    	<input type="text" name="fullname" class="mws-textinput" />
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label>Email</label>
                                    <div class="mws-form-item large">
                                    	<input type="text" name="email" class="mws-textinput" />
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label>Address</label>
                                    <div class="mws-form-item large">
                                    	<textarea name="address" rows="100%" cols="100%"></textarea>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label>Gender</label>
                                    <div class="mws-form-item">
	                                    <ul class="mws-form-list">
	                                    	<li><input type="radio" id="male" name="gender" /> <label for="male">Male</label></li>
	                                    	<li><input type="radio" id="female" name="gender" /> <label for="female">Female</label></li>
	                                    </ul>
                                    </div>
                                </div>
                    		</div>
                    		<div class="mws-button-row">
                    			<input type="submit" value="Prev" class="mws-button gray left" />
                    			<input type="submit" value="Next" class="mws-button green" />
                    		</div>
                    	</form>
                    </div>
                </div>        
      <?php include_once "footer.php"; ?>