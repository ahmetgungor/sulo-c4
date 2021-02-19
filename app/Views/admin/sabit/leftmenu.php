<div class="main-sidebar" style="overflow: hidden; outline: none;">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Panel v1</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">v1</a>
          </div>
          <ul class="sidebar-menu">
              
              <li ><a class="nav-link" href="blank.html"><i class="fas fa-fire"></i> <span>Ana Sayfa</span></a></li>
              
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Sayfa İşlemleri</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?=base_url("admin/yazi/index/1/1")?>">Yeni Sayfa</a></li>
                  <li><a class="nav-link" href="<?=base_url("admin/yazi/list/1")?>">Listele</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Blog İşlemleri</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?=base_url("admin/yazi/index/4/1")?>">Yeni Sayfa</a></li>
                  <li><a class="nav-link" href="<?=base_url("admin/yazi/list/4")?>">Listele</a></li>
                </ul>
              </li>
              <li class="nav-item "><a href="<?=base_url("admin/kategori/index/2")?>" class="nav-link" title="Kategori İşlemleri"><i class="fas fa-th"></i> <span>Kategori İşemleri</span></a>
              </li>
              <li class="nav-item "><a href="<?=base_url("admin/menu/index")?>" class="nav-link" title="Menu İşlemleri"><i class="fas fa-th"></i> <span>Menu</span></a>
              </li>
              <li class="nav-item "><a href="<?=base_url("admin/ayar/index?promo=false")?>" class="nav-link" title="Menu İşlemleri"><i class="fas fa-th"></i> <span>Site Ayarları</span></a>
              </li>
              
            </ul>

            <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
              </a>
            </div> -->
        </aside>
      </div>