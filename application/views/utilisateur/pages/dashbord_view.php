<div class="iq-navbar-header" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h1>ShopyGram</h1>
                                <p>Plateforme e-commerce.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="iq-header-img">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header1.png" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header2.png" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header3.png" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header4.png" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header5.png" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
            </div>
        </div>          <!-- Nav Header Component End -->
        <!--Nav End-->
    </div>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
<div class="row">
   <div class="col-md-12 col-lg-12">
      <div class="row row-cols-1">
         <div class="overflow-hidden d-slider1 ">
            <ul  class="p-0 m-0 mb-2 swiper-wrapper list-inline">
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700" style="width: 300px !important; background: wheat;">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-01" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24"  viewBox="0 0 24 24">
                              <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                           </svg>
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Total vendu</p>
                           <h4 class="counter">
                                <?php if($totalVendu->totalVendu == null):?>
                                    0fdj
                                <?php else:?>
                                    <?php echo $totalVendu->totalVendu;?>fdj
                                <?php endif;?>
                           </h4>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-02" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg>
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Clients</p>
                           <h4 class="counter">
                                <?php if($totalClient->totalClient == null):?>
                                    0
                                <?php else:?>
                                    <?php echo $totalClient->totalClient;?>
                                <?php endif;?>
                           </h4>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-03" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg>
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Total investi</p>
                              <h4 class="counter">
                                <?php if($produitTotal == null):?>
                                    0fdj
                                <?php else:?>
                                    <?php echo $produitTotal;?>fdj
                                <?php endif;?>
                           </h4>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-04" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="60" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24px"  viewBox="0 0 24 24">
                              <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                           </svg>
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Total des ventes</p>
                            <h4 class="counter">
                                <?php if($totalVente->totalVent == null):?>
                                    0
                                <?php else:?>
                                    <?php echo $totalVente->totalVent;?>
                                <?php endif;?>
                           </h4>
                        </div>
                     </div>
                  </div>
               </li>
            </ul>
            <div class="swiper-button swiper-button-next"></div>
            <div class="swiper-button swiper-button-prev"></div>
         </div>
      </div>
   </div>
   <div class="col-md-12 col-lg-8">
      <div class="row">
         <div class="col-md-12 col-xl-6">
            <div class="card" data-aos="fade-up" data-aos-delay="900">
               <div class="flex-wrap card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Commande par gemre</h4>
                  </div>
               </div>
               <div class="card-body">
                   <div id="main" style="width: 600px;height:400px;margin-top: 75px;"></div>
                   <script type="text/javascript">
                       // based on prepared DOM, initialize echarts instance
                       var myChart = echarts.init(document.getElementById('main'));

                       // specify chart configuration item and data
                       option = {
                           tooltip: {
                               trigger: 'item',
                               formatter: '{a} <br/>{b}: {c} ({d}%)'
                           },
                           legend: {
                               orient: 'vertical',
                               left: 10,
                               data: ['Homme', 'Femme']
                           },
                           series: [
                               {
                                   name: 'Vos commandes par genre',
                                   type: 'pie',
                                   radius: ['50%', '70%'],
                                   avoidLabelOverlap: false,
                                   label: {
                                       show: false,
                                       position: 'center'
                                   },
                                   emphasis: {
                                       label: {
                                           show: true,
                                           fontSize: '30',
                                           fontWeight: 'bold'
                                       }
                                   },
                                   labelLine: {
                                       show: false
                                   },
                                   data: [
                                       {value: <?php echo $commandeGenreF->sexe;?>, name: 'Homme'},
                                       {value: <?php echo $commandeGenreH->sexe;?>, name: 'Femme'}
                                   ]
                               }
                           ]
                       };
                       // use configuration item and data specified to show chart
                       myChart.setOption(option);
                   </script>
               </div>
            </div>
         </div>
         <div class="col-md-12 col-xl-6">
            <div class="card" data-aos="fade-up" data-aos-delay="1000">
               <div class="flex-wrap card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Conversions</h4>            
                  </div>
                  <div class="dropdown">
                     <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                        This Week
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton3">
                        <li><a class="dropdown-item" href="#">This Week</a></li>
                        <li><a class="dropdown-item" href="#">This <M></M>onth</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                     </ul>
                  </div>
               </div>
               <div class="card-body">
                   <div id="main2" style="width: 600px;height:400px;margin-top: 75px;"></div>
                   <script type="text/javascript">
                       // based on prepared DOM, initialize echarts instance
                       var myChart = echarts.init(document.getElementById('main2'));
                       let commandeMois = <?php echo json_encode($commandeMois);?>;
                       let month = [];
                       let count = [];



                       for(var i = commandeMois.length - 1; i >= 0; i--){
                           month.push((commandeMois[i]).month);
                           count.push((commandeMois[i]).count);
                       }

                       // specify chart configuration item and data
                       option = {
                           color: ['#3398DB'],
                           tooltip: {
                               trigger: 'axis',
                               axisPointer: {            // 坐标轴指示器，坐标轴触发有效
                                   type: 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                               }
                           },
                           grid: {
                               left: '3%',
                               right: '4%',
                               bottom: '3%',
                               containLabel: true
                           },
                           xAxis: [
                               {
                                   type: 'category',
                                   data: month,
                                   axisTick: {
                                       alignWithLabel: true
                                   }
                               }
                           ],
                           yAxis: [
                               {
                                   type: 'value'
                               }
                           ],
                           series: [
                               {
                                   name: 'Nombre de commande',
                                   type: 'bar',
                                   barWidth: '60%',
                                   data: count
                               }
                           ]
                       };

                       // use configuration item and data specified to show chart
                       myChart.setOption(option);
                   </script>
               </div>
            </div>
         </div>         
         <div class="col-md-12 col-lg-12">
            <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
               <div class="flex-wrap card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="mb-2 card-title">Vos commandes</h4>
                     <p class="mb-0">
                        <svg class ="me-2 text-primary icon-24" width="24"  viewBox="0 0 24 24">
                           <path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
                        </svg>
                        15 new acquired this month
                     </p>            
                  </div>
               </div>
               <div class="p-0 card-body">
                  <div class="mt-4 table-responsive">
                     <table id="basic-table" class="table mb-0 table-striped" role="grid">
                        <thead>
                           <tr>
                               <th>N°commande</th>
                               <th>Produit</th>
                               <th>Client</th>
                               <th>Quantité</th>
                               <th>Prix</th>
                               <th>Voir</th>
                               <th>Valider</th>
                               <th>Rejecter</th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php if($listeCommande != false):?>
                                <?php foreach($listeCommande as $cmd):?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img class="rounded bg-soft-primary img-fluid avatar-40 me-3" src="../assets/images/shapes/01.png" alt="profile">
                                                <h6><?= $cmd->code_cmd;?></h6>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $cmd->prod;?>
                                        </td>
                                        <td>
                                            <?= $cmd->nom;?>
                                        </td>
                                        <td>
                                            <?= $cmd->quantite;?>
                                        </td>
                                        <td>
                                            <?= $cmd->prix;?>fdj
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#voirPLus<?= $cmd->code_cmd;?>" style="background: none;border: none;">
                                                <i class="icon">
                                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="color: #1f9126;">
                                                        <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M17.7366 6.04606C19.4439 7.36388 20.8976 9.29455 21.9415 11.7091C22.0195 11.8924 22.0195 12.1067 21.9415 12.2812C19.8537 17.1103 16.1366 20 12 20H11.9902C7.86341 20 4.14634 17.1103 2.05854 12.2812C1.98049 12.1067 1.98049 11.8924 2.05854 11.7091C4.14634 6.87903 7.86341 4 11.9902 4H12C14.0683 4 16.0293 4.71758 17.7366 6.04606ZM8.09756 12C8.09756 14.1333 9.8439 15.8691 12 15.8691C14.1463 15.8691 15.8927 14.1333 15.8927 12C15.8927 9.85697 14.1463 8.12121 12 8.12121C9.8439 8.12121 8.09756 9.85697 8.09756 12Z" fill="currentColor"></path>                                <path d="M14.4308 11.997C14.4308 13.3255 13.3381 14.4115 12.0015 14.4115C10.6552 14.4115 9.5625 13.3255 9.5625 11.997C9.5625 11.8321 9.58201 11.678 9.61128 11.5228H9.66006C10.743 11.5228 11.621 10.6695 11.6601 9.60184C11.7674 9.58342 11.8845 9.57275 12.0015 9.57275C13.3381 9.57275 14.4308 10.6588 14.4308 11.997Z" fill="currentColor"></path>
                                                    </svg>
                                                </i>
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-light" style="background: none;border: none;">
                                                <a href="<?php echo base_url();?>Admin/Commande/validCommande/<?= $cmd->code_cmd;?>">
                                                    <i class="icon">
                                                        <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="color: #4878dd;">
                                                            <path opacity="0.4" d="M16.3405 1.99976H7.67049C4.28049 1.99976 2.00049 4.37976 2.00049 7.91976V16.0898C2.00049 19.6198 4.28049 21.9998 7.67049 21.9998H16.3405C19.7305 21.9998 22.0005 19.6198 22.0005 16.0898V7.91976C22.0005 4.37976 19.7305 1.99976 16.3405 1.99976Z" fill="currentColor"></path>                                <path d="M10.8134 15.248C10.5894 15.248 10.3654 15.163 10.1944 14.992L7.82144 12.619C7.47944 12.277 7.47944 11.723 7.82144 11.382C8.16344 11.04 8.71644 11.039 9.05844 11.381L10.8134 13.136L14.9414 9.00796C15.2834 8.66596 15.8364 8.66596 16.1784 9.00796C16.5204 9.34996 16.5204 9.90396 16.1784 10.246L11.4324 14.992C11.2614 15.163 11.0374 15.248 10.8134 15.248Z" fill="currentColor"></path>
                                                        </svg>
                                                    </i>
                                                </a>
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-light" style="background: none;border: none;">
                                                <a href="<?php echo base_url();?>Admin/Commande/rejetCommande/<?= $cmd->code_cmd;?>" onclick="return confirm('Etes-vous sûr de vouloir rejeter cette commande?');">
                                                    <i class="icon">
                                                        <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="color: red;">
                                                            <path opacity="0.4" d="M19.643 9.48851C19.643 9.5565 19.11 16.2973 18.8056 19.1342C18.615 20.8751 17.4927 21.9311 15.8092 21.9611C14.5157 21.9901 13.2494 22.0001 12.0036 22.0001C10.6809 22.0001 9.38741 21.9901 8.13185 21.9611C6.50477 21.9221 5.38147 20.8451 5.20057 19.1342C4.88741 16.2873 4.36418 9.5565 4.35445 9.48851C4.34473 9.28351 4.41086 9.08852 4.54507 8.93053C4.67734 8.78453 4.86796 8.69653 5.06831 8.69653H18.9388C19.1382 8.69653 19.3191 8.78453 19.4621 8.93053C19.5953 9.08852 19.6624 9.28351 19.643 9.48851Z" fill="currentColor"></path>                                <path d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z" fill="currentColor"></path>
                                                        </svg>
                                                    </i>
                                                </a>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            <?php else:?>
                            <?php endif;?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-12 col-lg-4">
      <div class="row">
         <div class="col-md-12 col-lg-12">
            <div class="card credit-card-widget" data-aos="fade-up" data-aos-delay="900">
               <div class="card-body">
                  <div class="flex-wrap mb-4 d-flex align-itmes-center justify-content-between">
                     <div class="d-flex align-itmes-center me-0 me-md-4">
                        <div>
                           <div class="p-3 mb-2 rounded bg-soft-primary">
                              <svg class="icon-20"  width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9303 7C16.9621 6.92913 16.977 6.85189 16.9739 6.77432H17C16.8882 4.10591 14.6849 2 12.0049 2C9.325 2 7.12172 4.10591 7.00989 6.77432C6.9967 6.84898 6.9967 6.92535 7.00989 7H6.93171C5.65022 7 4.28034 7.84597 3.88264 10.1201L3.1049 16.3147C2.46858 20.8629 4.81062 22 7.86853 22H16.1585C19.2075 22 21.4789 20.3535 20.9133 16.3147L20.1444 10.1201C19.676 7.90964 18.3503 7 17.0865 7H16.9303ZM15.4932 7C15.4654 6.92794 15.4506 6.85153 15.4497 6.77432C15.4497 4.85682 13.8899 3.30238 11.9657 3.30238C10.0416 3.30238 8.48184 4.85682 8.48184 6.77432C8.49502 6.84898 8.49502 6.92535 8.48184 7H15.4932ZM9.097 12.1486C8.60889 12.1486 8.21321 11.7413 8.21321 11.2389C8.21321 10.7366 8.60889 10.3293 9.097 10.3293C9.5851 10.3293 9.98079 10.7366 9.98079 11.2389C9.98079 11.7413 9.5851 12.1486 9.097 12.1486ZM14.002 11.2389C14.002 11.7413 14.3977 12.1486 14.8858 12.1486C15.3739 12.1486 15.7696 11.7413 15.7696 11.2389C15.7696 10.7366 15.3739 10.3293 14.8858 10.3293C14.3977 10.3293 14.002 10.7366 14.002 11.2389Z" fill="currentColor"></path>
                              </svg>
                           </div>
                        </div>
                        <div class="ms-3">
                           <h5>
                               <?php if($totalStock->totalstock == null):?>
                                   0
                               <?php else:?>
                                   <?php echo $totalStock->totalstock;?>
                               <?php endif;?>
                           </h5>
                           <small class="mb-0">Produits en stock</small>
                        </div>
                     </div>
                     <div class="d-flex align-itmes-center">
                        <div>
                           <div class="p-3 mb-2 rounded bg-soft-info">
                              <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1213 11.2331H16.8891C17.3088 11.2331 17.6386 10.8861 17.6386 10.4677C17.6386 10.0391 17.3088 9.70236 16.8891 9.70236H14.1213C13.7016 9.70236 13.3719 10.0391 13.3719 10.4677C13.3719 10.8861 13.7016 11.2331 14.1213 11.2331ZM20.1766 5.92749C20.7861 5.92749 21.1858 6.1418 21.5855 6.61123C21.9852 7.08067 22.0551 7.7542 21.9652 8.36549L21.0159 15.06C20.8361 16.3469 19.7569 17.2949 18.4879 17.2949H7.58639C6.25742 17.2949 5.15828 16.255 5.04837 14.908L4.12908 3.7834L2.62026 3.51807C2.22057 3.44664 1.94079 3.04864 2.01073 2.64043C2.08068 2.22305 2.47038 1.94649 2.88006 2.00874L5.2632 2.3751C5.60293 2.43735 5.85274 2.72207 5.88272 3.06905L6.07257 5.35499C6.10254 5.68257 6.36234 5.92749 6.68209 5.92749H20.1766ZM7.42631 18.9079C6.58697 18.9079 5.9075 19.6018 5.9075 20.459C5.9075 21.3061 6.58697 22 7.42631 22C8.25567 22 8.93514 21.3061 8.93514 20.459C8.93514 19.6018 8.25567 18.9079 7.42631 18.9079ZM18.6676 18.9079C17.8282 18.9079 17.1487 19.6018 17.1487 20.459C17.1487 21.3061 17.8282 22 18.6676 22C19.4969 22 20.1764 21.3061 20.1764 20.459C20.1764 19.6018 19.4969 18.9079 18.6676 18.9079Z" fill="currentColor"></path>
                              </svg>
                           </div>
                        </div>
                        <div class="ms-3">
                            <h5>
                                <?php if($totalStockVendu->totalstockvendu == null):?>
                                    0
                                <?php else:?>
                                    <?php echo $totalStockVendu->totalstockvendu;?>
                                <?php endif;?>
                            </h5>
                           <small class="mb-0">Quantité vendu</small>
                        </div>
                     </div>
                  </div>
                  <div class="mb-4">
                     <div class="flex-wrap d-flex justify-content-between">
                        <h2 class="mb-2">$405,012,300</h2>
                        <div>
                           <span class="badge bg-success rounded-pill">YoY 24%</span>
                        </div>
                     </div>
                     <p class="text-info">Life time sales</p>
                  </div>
                  <div class="grid-cols-2 d-grid gap-card">
                     <button class="p-2 btn btn-primary text-uppercase">SUMMARY</button>
                     <button class="p-2 btn btn-info text-uppercase">ANALYTICS</button>
                  </div>
               </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="500">
               <div class="text-center card-body d-flex justify-content-around">
                  <div>
                     <h2 class="mb-2">
                         <?php if($cmdTotal->totalCommande == null):?>
                             0
                         <?php else:?>
                             <?php echo $cmdTotal->totalCommande;?>
                         <?php endif;?>
                     </h2>
                     <p class="mb-0 text-gray">Total des commandes</p>
                  </div>
                  <hr class="hr-vertial">
                  <div>
                     <h2 class="mb-2">
                         <?php if($cmdMois->totalCommandeMois == null):?>
                             0
                         <?php else:?>
                             <?php echo $cmdMois->totalCommandeMois;?>
                         <?php endif;?>
                     </h2>
                     <p class="mb-0 text-gray">Commande(s) par mois</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12 col-lg-12">
            <div class="card" data-aos="fade-up" data-aos-delay="600">
               <div class="flex-wrap card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="mb-2 card-title">Vos activités</h4>
                     <p class="mb-0">
                        <svg class ="me-2 icon-24" width="24" height="24" viewBox="0 0 24 24">
                           <path fill="#17904b" d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" />
                        </svg>
                        16% this month
                     </p>
                  </div>
               </div>
               <div class="card-body">
                   <?php if($historyUser != false):?>
                        <?php foreach ($historyUser as $his):?>
                           <div class="mb-2  d-flex profile-media align-items-top">
                               <div class="mt-1 profile-dots-pills border-<?php echo $his->his_color;?>"></div>
                               <div class="ms-4">
                                   <h6 class="mb-1 "><?php echo $his->action_user;?></h6>
                                   <span class="mb-0"><?php echo $his->date_his;?></span>
                               </div>
                           </div>
                        <?php endforeach;?>
                   <?php else:?>
                   <?php endif;?>
               </div>
            </div>
         </div>
      </div>
   </div> 
</div>



<!-- Modal -->
<?php if ($listeCommande != false): ?>
<?php foreach ($listeCommande as $cmd): ?>
    <div class="modal fade" id="voirPLus<?php echo $cmd->code_cmd; ?>" tabindex="-1"
         aria-labelledby="voirPLus<?php echo $cmd->code_cmd; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="voirPLus<?php echo $cmd->code_cmd; ?>">Détails de la commande <?php echo $cmd->code_cmd; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="right">
                        <h5>Information de la commande : </h5>
                        <div class="divText">
                            <p>Code de la commande : <?php echo $cmd->code_cmd; ?></p>
                            <p>Nom du produit : <?php echo $cmd->prod; ?></p>
                            <p>Prix du produit : <?php echo $cmd->prix; ?>fdj</p>
                            <p>Produit en promotion : <?php echo $cmd->promo; ?></p>
                            <?php if ($cmd->promo == "oui"): ?>
                                <p>Prix de réudction du produit : <?php echo $cmd->prix_promo; ?>fdj</p>
                            <?php endif; ?>
                            <p>Quantité du produit : <?php echo $cmd->quantite; ?></p>
                            <p>Total à payer : <?php echo $cmd->totalPrix; ?>fdj</p>
                            <p>Commander le :<?php echo date("d-m-Y h:ia", strtotime($cmd->date_cmd)); ?></p>
                        </div>
                        <h5>Information du client : </h5>
                        <div class="divText">
                            <p>Commander par : <?php echo $cmd->nom;?></p>
                            <p>Téléphone : <?php echo $cmd->telephone; ?></p>
                            <p>Email : <?php echo $cmd->email; ?></p>
                            <p>Adresse : <?php echo $cmd->adresse; ?></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php endif; ?>