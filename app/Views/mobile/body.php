
  <style>
.channels .item img {
    max-width:125px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  </style>
  
  <div class="wrapper">
    <div class="channels">
      <div class="js-next">
        <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><g><path class="icon-pasif" fill="currentColor" d="M188.74 256l56.78 56.89L91.21 466.9a24 24 0 0 1-33.94 0l-22.7-22.65a23.93 23.93 0 0 1 0-33.84z"></path><path class="icon-aktif" fill="currentColor" d="M91.25 45.06l194.33 194a23.93 23.93 0 0 1 0 33.84l-40 40-211-211.34a23.92 23.92 0 0 1 0-33.84l22.7-22.65a24 24 0 0 1 33.97-.01z"></path></g></svg>
      </div>
      <div class="js-prev">
        <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><g><path class="icon-pasif" fill="currentColor" d="M188.74 256l56.78 56.89L91.21 466.9a24 24 0 0 1-33.94 0l-22.7-22.65a23.93 23.93 0 0 1 0-33.84z"></path><path class="icon-aktif" fill="currentColor" d="M91.25 45.06l194.33 194a23.93 23.93 0 0 1 0 33.84l-40 40-211-211.34a23.92 23.92 0 0 1 0-33.84l22.7-22.65a24 24 0 0 1 33.97-.01z"></path></g></svg>
      </div>      
      <div class="js-channels">
         
         
         
         
                                 
      </div>
    </div>
    <div class="categories">
      <ul>
        <li class="js-category-toggle" data-type="all">
          <span>TÜMÜ</span>
        </li>   
        <li class="js-category-toggle" data-type="Futbol">
          <svg class="icon"><g><use xlink:href="<?=base_url()?>/mobil/assets/images/icons.svg#sports_1"></use></g></svg>
        </li>
        <li class="js-category-toggle" data-type="Basketbol">
          <svg class="icon"><g><use xlink:href="<?=base_url()?>/mobil/assets/images/icons.svg#sports_3"></use></g></svg>
        </li>        
        <li class="js-category-toggle" data-type="Voleybol">
          <svg class="icon"><g><use xlink:href="<?=base_url()?>/mobil/assets/images/icons.svg#sports_6"></use></g></svg>
        </li>        
        <li class="js-category-toggle" data-type="Beyzbol">
          <svg class="icon"><g><use xlink:href="<?=base_url()?>/mobil/assets/images/icons.svg#sports_4"></use></g></svg>
        </li>                
        <li class="js-category-toggle" data-type="Masa Tenisi">
          <svg class="icon"><g><use xlink:href="<?=base_url()?>/mobil/assets/images/icons.svg#sports_10"></use></g></svg>
        </li>                        
        <li class="js-category-toggle" data-type="eSports">
          <svg class="icon"><g><use xlink:href="<?=base_url()?>/mobil/assets/images/icons.svg#sports_40"></use></g></svg>
        </li>                                
        <li class="js-category-toggle" data-type="CSGO">
          <svg class="icon"><g><use xlink:href="<?=base_url()?>/mobil/assets/images/icons.svg#sports_86"></use></g></svg>
        </li>                                        
        <li class="js-category-toggle" data-type="Buz Hokeyi">
          <svg class="icon"><g><use xlink:href="<?=base_url()?>/mobil/assets/images/icons.svg#sports_2"></use></g></svg>
        </li>                                                
      </ul>
    </div>
    <div id="reklam1" style="margin-bottom: 25px; text-align: center;">
      <a href=""><img src="http://via.placeholder.com/768x75" alt="" style="max-width: 100%" /> </a>
    </div>
    <div class="matches js-matches">
    </div>
  </div>
  <div class="player js-player">
    <div class="player-inner">
      <div class="video-loader js-loader">
        <div class="loader-text">
          <div class="loader-teams">
            <div class="loader-home">
              <img src={NullImage} />
              <div class="loader-team-name">Takım 1</div>
            </div>
            <div class="loader-bar">
              <div></div>
              <div></div>
              <div></div>
            </div>
            <div class="loader-away">
              <img src={NullImage} />
              <div class="loader-team-name">Takım 2</div>
            </div>
          </div>
          <div class="loader-loading">Yükleniyor...</div>
        </div>
      </div>          
      <div class="close js-player-close">KAPAT</div>
      <div class="bet-now">
        <div>1 (2.00)</div>
        <div>X (5.00)</div>
        <div>2 (2.00)</div>
        <div class="bet">BAHİS YAP</div>
      </div>
      <div class="mobile-player"></div>
      <div id="reklam2" style="text-align: center;">
        <a href=""><img src="http://via.placeholder.com/468x70" alt="" style="max-width: 100%" /></a>
      </div>
    </div>
  </div>  
