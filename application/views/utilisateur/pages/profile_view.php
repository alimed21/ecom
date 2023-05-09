<div class="conatiner-fluid content-inner mt-n5 py-0">
      <div class="row">
          <div class="col-lg-12">
             <div class="card">
                  <div class="card-body">
                     <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="d-flex flex-wrap align-items-center">
                           <div class="profile-img position-relative me-3 mb-3 mb-lg-0 profile-logo profile-logo1">
                              <img src="<?php echo base_url();?>assets/images/avatars/01.png" alt="User-Profile" class="theme-color-default-img img-fluid rounded-pill avatar-100">
                              <img src="<?php echo base_url();?>assets/images/avatars/avtar_1.png" alt="User-Profile" class="theme-color-purple-img img-fluid rounded-pill avatar-100">
                              <img src="<?php echo base_url();?>assets/images/avatars/avtar_2.png" alt="User-Profile" class="theme-color-blue-img img-fluid rounded-pill avatar-100">
                              <img src="<?php echo base_url();?>assets/images/avatars/avtar_4.png" alt="User-Profile" class="theme-color-green-img img-fluid rounded-pill avatar-100">
                              <img src="<?php echo base_url();?>assets/images/avatars/avtar_5.png" alt="User-Profile" class="theme-color-yellow-img img-fluid rounded-pill avatar-100">
                              <img src="<?php echo base_url();?>assets/images/avatars/avtar_3.png" alt="User-Profile" class="theme-color-pink-img img-fluid rounded-pill avatar-100">
                           </div>
                           <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                              <h4 class="me-2 h4"><?php echo $this->session->userdata('username');?></h4>
                              <span> - Commerçant</span>
                           </div>
                        </div>
                        <ul class="d-flex nav nav-pills mb-0 text-center profile-tab" data-toggle="slider-tab" id="profile-pills-tab" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active show" data-bs-toggle="tab" href="#profile-activity" role="tab" aria-selected="false">Activité</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#profile-profile" role="tab" aria-selected="false">Profile</a>
                           </li>
                        </ul>
                     </div>
                  </div>
             </div>
          </div>
          <div class="col-lg-3">
   
             <div class="card">
               <div class="card-header">
                  <div class="header-title">
                     <h4 class="card-title">Nouveaux produits</h4>
                  </div>
               </div>
               <div class="card-body">
                  <?php if($lastProd != false):?>
                     <?php foreach($lastProd as $prod):?>
                        <div class="twit-feed">
                           <div class="d-flex align-items-center mb-2">
                              <img class="rounded-pill img-fluid avatar-50 me-3 p-1 bg-soft-danger ps-2" src="<?php echo base_url();?>uploads/produit/<?php echo $prod->image;?>" alt="">
                              <div class="media-support-info">
                                 <h6 class="mb-0"><?php echo $prod->prod;?></h6>
                                 <p class="mb-0">@<?php echo $prod->username;?>
                                    <span class="text-primary">
                                       <svg class="icon-15" width="15" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M10,17L5,12L6.41,10.58L10,14.17L17.59,6.58L19,8M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                                       </svg>
                                    </span>
                                 </p>
                              </div>
                           </div>
                           <div class="media-support-body">
                              <p class="mb-0"><?php echo $prod->description;?></p>
                              <div class="twit-date">
                                 
                                 <?php echo date("l jS \o\f F Y", strtotime($prod->date_prod));?>
                              </div>
                           </div>
                        </div>
                        <hr class="my-4">
                     <?php endforeach;?>
                  <?php endif;?>
                  
                 
               </div>
            </div>
          </div>
          <div class="col-lg-6">
             <div class="profile-content tab-content">
               <div id="profile-activity" class="tab-pane fade active show">
                  <div class="card" style="width: 100%; height: 907px; overflow-y: scroll;">
                     <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                           <h4 class="card-title">Activité</h4>
                        </div>
                     </div>
                     <div class="card-body">
                        <div class="iq-timeline0 m-0 d-flex align-items-center justify-content-between position-relative">
                           <ul class="list-inline p-0 m-0">
                              <?php if($historyUser != false):?>
                                <?php foreach($historyUser as $his):?>
                                    <li>
                                         <div class="timeline-dots timeline-dot1 border-<?php echo $his->his_color;?> text-<?php echo $his->his_color;?>"></div>
                                         <h6 class="float-left mb-1"><?php echo $his->action_user;?></h6>
                                         <small class="float-right mt-1"><?php echo $his->date_his;?></small>
                                    </li>
                                <?php endforeach;?>
                              <?php endif;?>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="profile-profile" class="tab-pane fade">
                  <div class="card">
                     <div class="card-header">
                        <div class="header-title">
                           <h4 class="card-title">Profile</h4>
                        </div>
                     </div>
                     <div class="card-body">
                        <div class="text-center">
                           <div class="user-profile">
                              <img src="../../assets/images/avatars/01.png" alt="profile-img" class="rounded-pill avatar-130 img-fluid">
                           </div>
                           <div class="mt-3">
                              <h3 class="d-inline-block">Austin Robertson</h3>
                              <p class="d-inline-block pl-3"> - Web developer</p>
                              <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header">
                        <div class="header-title">
                           <h4 class="card-title">About User</h4>
                        </div>
                     </div>
                     <div class="card-body">
                        <div class="user-bio">
                           <p>Tart I love sugar plum I love oat cake. Sweet roll caramels I love jujubes. Topping cake wafer.</p>
                        </div>
                        <div class="mt-2">
                        <h6 class="mb-1">Joined:</h6>
                        <p>Feb 15, 2021</p>
                        </div>
                        <div class="mt-2">
                        <h6 class="mb-1">Lives:</h6>
                        <p>United States of America</p>
                        </div>
                        <div class="mt-2">
                        <h6 class="mb-1">Email:</h6>
                        <p><a href="#" class="text-body"> austin@gmail.com</a></p>
                        </div>
                        <div class="mt-2">
                        <h6 class="mb-1">Url:</h6>
                        <p><a href="#" class="text-body" target="_blank"> www.bootstrap.com </a></p>
                        </div>
                        <div class="mt-2">
                        <h6 class="mb-1">Contact:</h6>
                        <p><a href="#" class="text-body">(001) 4544 565 456</a></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
          </div>
          <div class="col-lg-3">
             <div class="card">
               <div class="card-header">
                  <div class="header-title">
                     <h4 class="card-title">A propos de vous</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="mb-1">Nom d'utilisateur: <?php echo $this->session->userdata('username');?></div>
                  <div class="mb-1">Email : <?php echo $this->session->userdata('email');?></div>
                  <div class="mb-1">Boutique : <?php echo $this->session->userdata('nom_boutique');?></div>
                  <div>Location: <span class="ms-3">DJ</span></div>
               </div>
                <div class="card-header">
                  <div class="header-title">
                     <h4 class="card-title">A propos de la boutique</h4>
                  </div>
               </div>
                <div class="card-body">
                  <?php if($infoBou != false):?>
                     <?php foreach($infoBou as $info):?>
                         <div class="mb-1">Code : <?php echo $info->code_boutique;?></div>
                        <div class="mb-1">Nom : <?php echo $info->nom_boutique;?></div>
                        <div class="mb-1">Adresse : <?php echo $info->adr_boutique;?></div>
                        <div class="mb-1">Téléphone : <?php echo $info->tele_boutique;?></div>
                        <div class="mb-1">Page facebook : <?php echo $info->page_facebook;?></div>
                        <div>Location: <span class="ms-3">DJ</span></div>
                     <?php endforeach;?>
                  <?php endif;?>
               </div>
             </div>
             <div class="card">
               <div class="card-header">
                  <div class="header-title">
                     <h4 class="card-title">Logo</h4>
                  </div>
               </div>
               <div class="card-body">
                  <?php if($logoBou != false):?>
                     <?php foreach($logoBou as $logo):?>
                        <?php if($logo->logo_boutique == NULL):?>
                           <img src="<?php echo base_url();?>assets/images/img/missing.jpg" class="logoBou"/>
                           <div class="addLogo">
                              <a href="<?php echo base_url();?>Parametres/ajouterLogo">
                                 <button class="btn btn-primary">
                                    Ajouter
                                 </button>
                              </a>
                           </div>
                         
                        <?php else:?>
                           <img src="<?php echo base_url();?>uploads/logo/<?php echo $logo->logo_boutique;?>" class="logoBou"/>
                            <div class="addLogo">
                              <a href="<?php echo base_url();?>Parametres/modifierLogo">
                                 <button class="btn btn-success">
                                    Modifier
                                 </button>
                              </a>
                           </div>
                        <?php endif;?>
                     <?php endforeach;?>
                  <?php endif;?>
               </div>
             </div>
          </div>
      </div>