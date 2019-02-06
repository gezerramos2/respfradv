 

 <!-- Atualiza div com php -->   

 <ul class="navigation">
                    <div class="user">
                        
                        <a href="#" class="name">
                            <span>	 
							<?php echo strtoupper($_SESSION['user_session']);?></span>
                           
							
							<div class=""> Sair  <a href="../home/?sai=sair"><button class="btn btn-danger"><span class="icon-remove icon-white"></span></button></a>
                                        
                        </a>
						   <div class="popup" id="menup">
                                <div class="arrow"></div>
                               <div class="row-form">
                                        <div class="span4 span4-marg">Sair</div>
                                        <div class="span8 span8-marg"> <a href="../home/?sai=sair"><button class="btn btn-danger"><span class="icon-remove icon-white"></span></button></a>
                                        
                                       
                                        </div>
                                    </div>                                     
                                                                  
                                    
                            </div>
                    </div>
                  

                                
                 
                    
                </li>                
            </ul>