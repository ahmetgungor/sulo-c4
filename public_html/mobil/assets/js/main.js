
  
  $(function() {

    $.getJSON("https://intrabettv.com/services/kanal_listesi/tbcof.com/1", function(data){
      document.title = data.baslik + 'Ücretiz Maç İzle - 2020';
      document.description = data.baslik + 'Ücretiz Maç İzle - 2020';
      $("#reklam1 img").attr("src",upload_dir+data.mobile_reklam1)
      $("#reklam1 a").attr("href",data.mobile_reklam1url)
      $("#reklam2 img").attr("src",upload_dir+data.mobile_reklam2)
      $("#reklam2 a").attr("href",data.mobile_reklam2url)
      $(".bet").click(function(e){
        window.location.href = data.bahisyap_btn;
      })
      data.channels.map(item => {
        $('.js-channels').append(`
          <div class="item js-match-item" data-name="${item.name}" data-stream="${item.stream}">
              <center><img src="${item.logo}" /></center>
          </div>
        `);
        $('.js-channels').slick('unslick');
    $('.js-channels').slick({
      slidesToShow: 3,
      slidesToScroll: 3,
      responsive: [
        {
          breakpoint: 690,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        }
      ]              
    });
        
    });

    data.channels.map(item => {
      $('.news-list').append(`
      <div class="single-news">
      <div class="single-news-image"><img src="${upload_dir+item.resim}" alt=""></div>
      <div class="single-news-detail">
        <div class="news-date"></div>
        <div class="news-title">${item.baslik}</div>
      </div>
    </div>
      `);
      });

    var url = 'https://1-xbahis61688.com/LiveFeed/Get1x2_VZip?count=500&lng=tr&mode=7';
    $.ajax({
        url: "https://matches-getter.herokuapp.com/",
        type: 'GET',
        success: function(res) {
            res.live.map(item => {
              $('.js-matches').append(`
                <div class="match js-match-item" data-type="${item.type}" data-stream="${item.streamId}">
                  <div>
                    <img src="${item.homeLogo}" alt="" />
                  </div>
                  <div class="info">
                    <p>${moment.unix(item.time).format("HH:mm")} / ${item.type}</p>
                    <p>${item.category}</p>
                    <div class="teams">
                      <div>${item.homeName}</div>
                      <div>${item.awayName}</div>
                    </div>
                  </div>
                  <div>
                    <img src="${item.awayLogo}" alt="" />
                  </div>
                </div>
              `);
            });
         
           /*buraya yapışacak*/
           
            $('.js-category-toggle:nth-child(1)').trigger('click');
        }
      }); 
    }); 
  
    // Channels
    $('.js-channels').slick({
      slidesToShow: 3,
      slidesToScroll: 3,
      responsive: [
        {
          breakpoint: 690,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]       
    });
    $('.channels .js-next').on('click', function() {
      $('.js-channels').slick('slickNext');
    });
    $('.channels .js-prev').on('click', function() {
      $('.js-channels').slick('slickPrev');
    });
  
  
    $(document).on('click', '.js-match-item', function() {
      $('.js-loader').show();
      $('.js-loader .loader-home img').attr('src', $(this).find('> div:nth-child(1) img').attr('src'));
      $('.js-loader .loader-away img').attr('src', $(this).find('> div:nth-child(3) img').attr('src'));
      $('.js-loader .loader-home .loader-team-name').text($(this).find('.teams div:nth-child(1)').text());
      $('.js-loader .loader-away .loader-team-name').text($(this).find('.teams div:nth-child(2)').text());
  
      setTimeout(() => {
       $('.js-loader').hide();
      }, 2000);
  
      if($(this).attr('data-stream') !== 'null') {
        $('body').removeClass('hide-player');
        $('body').addClass('player-active');
  
          $('.mobile-player').empty();
            var player = new Clappr.Player({
            width: "100%",
            height: "250px",
            source: $(this).attr('data-stream'),
            parentId: ".mobile-player",
            language: "tr-TR",
            disableVideoTagContextMenu: false,
            autoPlay: true,
            mute: false,
            playback: {
              playInline: true,
              recycleVideo: true,
            },
            fs: '0',
            preload: "metadata",
            playback: {
              controls: true,
              playInline: true,
              minimumDvrSize: null,
              hlsjsConfig: {
                  maxMaxBufferLength: 7,
                  hlsUseNextLevel: true
              },
              shakaConfiguration: {},
            }          
        });
  
        var hammertime = new Hammer(document.getElementsByClassName('js-player')[0]);
        hammertime.on('pan', function(ev) {
          $('body').addClass('hide-player');
          $('body').removeClass('player-active');
          $('.mobile-player').empty();  
        });     
      }
    });
  
    const filterMatches = function(type) {
      $('.js-matches .js-match-item').show();
      var count = 0;
      if(type !== 'all') {
        $('.js-matches .js-match-item').map(function() {
          if($(this).attr('data-type') !== type) {
            $(this).hide();
          } else {
            count++;
          }
        });
  
        $('.count strong').text(parseInt(count));
      } else {
        $('.count strong').text(parseInt($('.js-matches .js-match-item').length));
      }
    };
  
    $('.js-category-toggle').on('click', function() {
      $('.count').remove();
      $('.js-category-toggle').removeClass('active');
      $(this).addClass('active');
  
      $(this).append(`
        <small class="count"><strong>${$('.js-matches .js-match-item').length}</strong> MAÇ </small>
      `);
  
      const active = $(this).attr('data-type');
      filterMatches(active);
    });
  
    $('.js-player-close').on('click', function() {
      $('body').addClass('hide-player');
      $('body').removeClass('player-active');
      $('.mobile-player').empty();  
    });
  });