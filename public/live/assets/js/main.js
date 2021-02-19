$(function() {

  $.getJSON("https://tbcof.com/live/assets/datas.json", function(data){
      document.title = data.name + 'Ücretiz Maç İzle - 2020';
      document.description = data.name + 'Ücretiz Maç İzle - 2020';
      $('.js-message-area').text(data.site_message);
      $('.js-site-logo').attr('src', data.site_logo);
      document.documentElement.style.setProperty('--base_color', data.backgroundColor);
      data.channels.map(item => {
        $('.js-channel-items').append(`
          <div class="item js-channel-item" data-name="${item.name}">
              <img src="${item.logo}" style="width: 130px" />
          </div>
        `);
      });
      data.liveScores.map(item => {
        $('.js-live-scores').append(`
          <div class="sporFutbol sportur">
            <div class="sporBaslik">${item.category}</div>
            <div class="single-turnuva">
              <div class="turnuvaBaslik">${item.type}</div>
              <div class="live-score-match">
                <div class="teams">${item.teams}</div> 
              </div>
            </div>
          </div>
        `);
      });      
      $('.js-channel-items').slick('destroy');
      $('.js-channel-items').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
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
  }).fail(function(data){
      
  });


  if($(window).width() > 768)  {
    const videoArea = document.querySelector('.demo-player-area');
    var player = new Plyr(videoArea, {
        title: '',
        controls: `
    <div class="plyr__controls">
    <div class="player-flex">
    <div class="live-button">
        <div class="live-blink"></div>
        <div class="live-text">CANLI</div>
    </div>
        <button type="button" class="plyr__control" data-plyr="rewind">
            <svg role="presentation" viewBox="0 0 512 512">
            <g class="fa-group"><path fill="currentColor" d="M129 383a12 12 0 0 1 16.37-.56A166.77 166.77 0 0 0 256 424c93.82 0 167.24-76 168-166.55C424.79 162 346.91 87.21 254.51 88a166.73 166.73 0 0 0-113.2 45.25L84.69 76.69A247.12 247.12 0 0 1 255.54 8C392.35 7.76 504 119.19 504 256c0 137-111 248-248 248a247.11 247.11 0 0 1-166.18-63.91l-.49-.46a12 12 0 0 1 0-17z" class="fa-secondary"></path><path fill="currentColor" d="M49 41l134.06 134c15.09 15.15 4.38 41-17 41H32a24 24 0 0 1-24-24V57.94C8 36.56 33.85 25.85 49 41z" class="fa-primary"></path></g> 
            </svg>
            <span class="plyr__tooltip" role="tooltip">{seektime} saniye geriye sar</span>
        </button>
        <button type="button" class="plyr__control" aria-label="Play, {title}" data-plyr="play">
            <svg class="icon--pressed" role="presentation" viewBox="0 0 448 512">
            
            <g class="fa-group">
            <path fill="currentColor" d="M144 31H48A48 48 0 0 0 0 79v352a48 48 0 0 0 48 48h96a48 48 0 0 0 48-48V79a48 48 0 0 0-48-48zm-16 368a16 16 0 0 1-16 16H80a16 16 0 0 1-16-16V111a16 16 0 0 1 16-16h32a16 16 0 0 1 16 16zM400 31h-96a48 48 0 0 0-48 48v352a48 48 0 0 0 48 48h96a48 48 0 0 0 48-48V79a48 48 0 0 0-48-48zm-16 368a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16V111a16 16 0 0 1 16-16h32a16 16 0 0 1 16 16z"  class="fa-secondary"></path>
            <path fill="transparent" d="M112 95H80a16 16 0 0 0-16 16v288a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V111a16 16 0 0 0-16-16zm256 0h-32a16 16 0 0 0-16 16v288a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V111a16 16 0 0 0-16-16z"  class="fa-primary"></path></g>

            </svg>
            <svg class="icon--not-pressed" role="presentation" viewBox="0 0 448 512">
            <g class="fa-group"><path fill="currentColor" d="M424.41 214.66L72.41 6.55C43.81-10.34 0 6.05 0 47.87V464c0 37.5 40.69 60.09 72.41 41.3l352-208c31.4-18.54 31.5-64.14 0-82.64zM321.89 283.5L112.28 407.35C91 420 64 404.58 64 379.8V132c0-24.78 27-40.16 48.28-27.54l209.61 123.95a32 32 0 0 1 0 55.09z" class="fa-secondary"></path><path fill="transparent" d="M112.28 104.48l209.61 123.93a32 32 0 0 1 0 55.09L112.28 407.35C91 420 64 404.58 64 379.8V132c0-24.76 27-40.14 48.28-27.52z" class="fa-primary"></path></g>
            </svg>
            <span class="label--pressed plyr__tooltip" role="tooltip">Durdur</span>
            <span class="label--not-pressed plyr__tooltip" role="tooltip">Oynat</span>
        </button>

        <button type="button" class="plyr__control" data-light="on">
        <svg id="light-icon" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><g class="fa-group"><path fill="currentColor" d="M319.45,0C217.44.31,144,83,144,176a175,175,0,0,0,43.56,115.78c16.52,18.85,42.36,58.22,52.21,91.44,0,.28.07.53.11.78H400.12c0-.25.07-.5.11-.78,9.85-33.22,35.69-72.59,52.21-91.44A175,175,0,0,0,496,176C496,78.63,416.91-.31,319.45,0ZM320,96a80.09,80.09,0,0,0-80,80,16,16,0,0,1-32,0A112.12,112.12,0,0,1,320,64a16,16,0,0,1,0,32Z" class="fa-secondary"></path><path fill="currentColor" d="M240.06,454.34A32,32,0,0,0,245.42,472l17.1,25.69c5.23,7.91,17.17,14.28,26.64,14.28h61.7c9.47,0,21.41-6.37,26.64-14.28L394.59,472A37.47,37.47,0,0,0,400,454.34L400,416H240ZM112,192a24,24,0,0,0-24-24H24a24,24,0,0,0,0,48H88A24,24,0,0,0,112,192Zm504-24H552a24,24,0,0,0,0,48h64a24,24,0,0,0,0-48ZM131.08,55.22l-55.42-32a24,24,0,1,0-24,41.56l55.42,32a24,24,0,1,0,24-41.56Zm457.26,264-55.42-32a24,24,0,1,0-24,41.56l55.42,32a24,24,0,0,0,24-41.56Zm-481.26-32-55.42,32a24,24,0,1,0,24,41.56l55.42-32a24,24,0,0,0-24-41.56ZM520.94,100a23.8,23.8,0,0,0,12-3.22l55.42-32a24,24,0,0,0-24-41.56l-55.42,32a24,24,0,0,0,12,44.78Z" class="fa-primary"></path></g></svg>
            <span class="label--not-pressed plyr__tooltip" role="tooltip">Işıkları Kapat</span>
        </button>
       
    </div>


    <div class="player-flex">
        <button type="button" class="plyr__control" aria-label="Mute" data-plyr="mute">
            <svg class="icon--pressed" role="presentation" viewBox="0 0 640 512">
            
            <g class="fa-group"><path  style="opacity:.7" fill="currentColor" d="M393.11 107.22a23.9 23.9 0 0 1 33.12-7.46A185.33 185.33 0 0 1 488.74 346l-38.65-29.9a136.7 136.7 0 0 0-49.57-175.52 24.29 24.29 0 0 1-7.41-33.36zm60.68-46.79a233.7 233.7 0 0 1 73 315l38.52 29.78A282.1 282.1 0 0 0 480.35 20a24.2 24.2 0 1 0-26.56 40.46zM347.07 221.19a40 40 0 0 1 20.75 31.32l42.92 33.18A86.79 86.79 0 0 0 416 256a87.89 87.89 0 0 0-45.78-76.86 24 24 0 1 0-23.16 42.06zM288 190.82V88c0-21.46-26-32-41-17l-49.7 49.69zM32 184v144a24 24 0 0 0 24 24h102.06L247 441c15 15 41 4.47 41-17v-71.4L43.76 163.84C36.86 168.05 32 175.32 32 184z" class="fa-secondary"></path><path fill="currentColor" d="M594.54 508.63L6.18 53.9a16 16 0 0 1-2.81-22.45L23 6.18a16 16 0 0 1 22.47-2.81L633.82 458.1a16 16 0 0 1 2.82 22.45L617 505.82a16 16 0 0 1-22.46 2.81z" class="fa-primary"></path></g>
            
            </svg>
            <svg class="icon--not-pressed" role="presentation" viewBox="0 0 576 512">
            
            <g class="fa-group"><path fill="currentColor" d="M0 328V184a24 24 0 0 1 24-24h102.06l89-88.95c15-15 41-4.49 41 17V424c0 21.44-25.94 32-41 17l-89-88.95H24A24 24 0 0 1 0 328z" class="fa-secondary"></path><path fill="currentColor" d="M338.23 179.13a24 24 0 1 0-23.16 42.06 39.42 39.42 0 0 1 0 69.62 24 24 0 1 0 23.16 42.06 87.43 87.43 0 0 0 0-153.74zM480 256a184.64 184.64 0 0 0-85.77-156.24 23.9 23.9 0 0 0-33.12 7.46 24.29 24.29 0 0 0 7.41 33.36 136.67 136.67 0 0 1 0 230.84 24.28 24.28 0 0 0-7.41 33.36 23.94 23.94 0 0 0 33.12 7.46A184.62 184.62 0 0 0 480 256zM448.35 20a24.2 24.2 0 1 0-26.56 40.46 233.65 233.65 0 0 1 0 391.16A24.2 24.2 0 1 0 448.35 492a282 282 0 0 0 0-472.07z" class="fa-primary"></path></g>
            
            </svg>
            <span class="label--pressed plyr__tooltip" role="tooltip">Sesi Aç</span>
            <span class="label--not-pressed plyr__tooltip" role="tooltip">Sesi Kapat</span>
        </button>

        <div class="plyr__volume">
            <input data-plyr="volume" type="range" min="0" max="1" step="0.05" value="1" autocomplete="off" aria-label="Volume">
      </div>
      


        <button type="button" class="plyr__control js-screen" data-plyr="wide">
        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrows-alt-h" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" ><path fill="currentColor" d="M508.485 247.515l-99.03-99.029c-7.56-7.56-20.485-2.206-20.485 8.485V228H123.03v-71.03c0-10.691-12.926-16.045-20.485-8.485l-99.03 99.029c-4.686 4.686-4.686 12.284 0 16.971l99.03 99.029c7.56 7.56 20.485 2.206 20.485-8.485V284h265.941v71.03c0 10.691 12.926 16.045 20.485 8.485l99.03-99.029c4.686-4.687 4.686-12.285-.001-16.971z" class=""></path></svg>
            <span class="label--not-pressed plyr__tooltip" role="tooltip">Genişlet</span>
        </button>

        <button type="button" class="plyr__control" data-plyr="fullscreen">
            <svg class="icon--pressed" role="presentation"><use xlink:href="#plyr-exit-fullscreen"></use></svg>
            <svg class="icon--not-pressed" role="presentation"><use xlink:href="#plyr-enter-fullscreen"></use></svg>
            <span class="label--pressed plyr__tooltip" role="tooltip">Tam Ekrandan Çık</span>
            <span class="label--not-pressed plyr__tooltip" role="tooltip">Tam Ekran Yap</span>
        </button>

    </div>
    </div>
    `,
        settings: ['quality'],
        blankVideo: 'https://cdn.plyr.io/static/blank.mp4',
        seekTime: 15,
        autoplay: true,
        clickToPlay: true,
        disableContextMenu: true,
        displayDuration: false,
        ratio: '4:3',
        quality: {
            default: 720,
            options: [1080, 720, 480, 360, 240]
        },
        fullscreen: {
            enabled: true,
            iosNative: true
        },
        captions: {
            active: true,
            update: true,
            language: 'tr'
        },
        i18n: {
            restart: 'Yeniden Oynat',
            rewind: '{seektime} saniye geri al',
            play: 'Oynat',
            pause: 'Durdur',
            fastForward: '{seektime} saniye ilerlet',
            seek: 'Seek',
            seekLabel: '{currentTime} of {duration}',
            played: 'Durduruldu',
            buffered: 'Buffered',
            currentTime: 'Şuanki süre',
            duration: 'Süre',
            volume: 'Ses',
            mute: 'Sesi Kapat',
            unmute: 'Sesi Aç',
            enterFullscreen: 'Tam Ekran Yap',
            exitFullscreen: 'Tam Ekrandan Çık',
            frameTitle: '{title} Oynatılıyor',
            captions: 'Altyazılar',
            settings: 'Ayarlar',
            menuBack: 'Önceki menüye dön',
            speed: 'Hız',
            normal: 'Normal',
            quality: 'Kalite',
            loop: 'Loop',
            start: 'Başlat',
            end: 'Bitir',
            all: 'Hepsi',
            reset: 'Sıfırla',
            disabled: 'Kapalı',
            enabled: 'Açık',
            debug: true,
            advertisement: 'Sponsor',
            qualityBadge: {
                2160: '4K',
                1440: 'HD',
                1080: 'HD',
                720: 'HD',
                576: 'SD',
                480: 'SD',
            },
        },
    });
  }

(function(a, b, c, d, e, f, g, h, i) {
  a[e] || (i = a[e] = function() {
          (a[e].q = a[e].q || []).push(arguments)
      }, i.l = 1 * new Date, i.o = f,
      g = b.createElement(c), h = b.getElementsByTagName(c)[0], g.async = 1, g.src = d, g.setAttribute("n", e), h.parentNode.insertBefore(g, h)
  )
  })(window, document, "script", "https://widgets.sir.sportradar.com/sportradar/widgetloader", "SIR", {
  language: 'tr',
  theme:false
  })
  SIR('addWidget', '#fwgt', 'match.matchList', {
      sportId: 1,
      favoriteTournaments: [7,679,505,96,52,98,17,8,35,23,34],
      showOdds: false,
      isLive:true,                
      onTrack: function(param1, param2) {
      let bahisControl = setInterval(() => {
          if (!document.querySelector('.sr-match-bahisyap')) {
              $('.sr-match-default__match').append(`<a href="link" target="_blank" class="sr-match-bahisyap" style="margin-right: 15px">Bahis Yap</a`);
          } else {
              clearInterval(bahisControl)
          }
      }, 50)              
        

      },
      onItemClick: function(matchType, matchInfo) {
          document.querySelector('a[data-fancybox]').href = `https://s5.sir.sportradar.com/universalsoftwaresolutions/tr/1/match/${matchInfo.matchId}`;
          document.querySelector('a[data-fancybox]').click();
      }
  })
  SIR('addWidget', '#bwgt', 'match.matchList', {
      sportId: 2,
      isLive:true,                
      onTrack: function(param1, param2) {
          
      },
      onItemClick: function(matchType, matchInfo) {
          document.querySelector('a[data-fancybox]').href = `https://s5.sir.sportradar.com/universalsoftwaresolutions/tr/1/match/${matchInfo.matchId}`;
          document.querySelector('a[data-fancybox]').click();
      }
  })



  $.ajax({
      url: "https://matches-getter.herokuapp.com/",
      type: 'GET',
      success: function(res) {
          res.live.map(item => {
            $('.js-live-matches').append(`
              <div class="single-match show match js-match-item" data-matchfilter="${item.type}" data-stream="${item.streamId}">
                <img src="${item.homeLogo}" width="24" height="24">
                <div class="match-detail">
                  <div class="date">${moment.unix(item.time).format("HH:mm")} / ${item.type}</div>
                  <div class="event">${item.category}</div>
                  <div class="teams">
                    <div class="home">${item.homeName}</div>
                    <div class="away">${item.awayName}</div>
                  </div>
                </div>
                <img src="${item.awayLogo}" width="24" height="24">
              </div>              
            `);
          });

          res.live.slice(0,6).map(item => {
            $('.js-matchday-items').append(`
              <div>
                <div class="item js-match-item" data-type="${item.type}" data-stream="${item.streamId}">
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
              </div>    
            `);
          });          

          $('.js-matchday-items').slick('unslick');
          $('.js-matchday-items').slick({
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

          $('.live-matches .js-match-item:nth-child(1)').trigger('click');
          $('.live-matches .js-category-toggle:nth-child(1)').trigger('click');

          if($('.js-match-item:nth-child(1)').attr('data-stream') !== 'null') {
            var video = document.querySelector('.demo-player-area');

            var videoSrc = $(this).attr('data-stream');
            if (Hls.isSupported()) {
              var hls = new Hls();
              hls.loadSource(videoSrc);
              hls.attachMedia(video);
              hls.on(Hls.Events.MANIFEST_PARSED, function() {
                video.play();
              });
            }
          
          }
      }
  }); 

  $('.js-matchday-items').slick({
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
  $('.matches-day .js-next').on('click', function() {
    $('.js-matchday-items').slick('slickNext');
  });
  $('.matches-day .js-prev').on('click', function() {
    $('.js-matchday-items').slick('slickPrev');
  });


  $('.js-channel-items').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
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
    $('.js-channel-items').slick('slickNext');
  });
  $('.channels .js-prev').on('click', function() {
    $('.js-channel-items').slick('slickPrev');
  });


  $(document).on('click', '.js-channel-item', function(e) {
    e.preventDefault();
    let title = $(this).attr('data-name') + "-Canlı İzle";
    document.title = $(this).attr('data-name') + " - Canlı İzle";
    document.description = $(this).attr('data-name') + " - Canlı İzle";
    const homeTeam = $(this).find('.teams div:nth-child(1)').text().replace(/\s/g,"-").toLowerCase();
    const awayTeam = $(this).find('.teams div:nth-child(2)').text().replace(/\s/g,"-").toLowerCase();
    window.history.pushState('tv', title, '/live/canli-izle/' + title.replace(/\s/g,"-").toLowerCase());
  });  

  $(document).on('click', '.js-channel-item', function(e) {
    $('.next-match-splash').hide();
    $('.js-loader').hide();
    $('.live-matches .js-match-item:nth-child(1)').trigger('click');
  });

  $(document).on('click', '.js-match-item', function(e) {
    e.preventDefault();
    $('.next-match-splash').hide();
    $('.js-loader').show();
    $('.js-loader').css('display', 'flex');
    $('.js-loader .loader-home img, .js-homelogo-area').attr('src', $(this).find('> img:nth-child(1)').attr('src'));
    $('.js-loader .loader-away img, .js-awaylogo-area').attr('src', $(this).find('> img:nth-child(3)').attr('src'));
    $('.js-loader .loader-home .loader-team-name, .js-hometeam').text($(this).find('.teams div:nth-child(1)').text());
    $('.js-loader .loader-away .loader-team-name, .js-awayteam').text($(this).find('.teams div:nth-child(2)').text());

    let title = $(this).find('.teams div:nth-child(1)').text() + "-" + $(this).find('.teams div:nth-child(2)').text() + "maçını SLive TV'de HD izle";
    document.title = $(this).find('.teams div:nth-child(1)').text() + "-" + $(this).find('.teams div:nth-child(2)').text() + "maçını SLive TV'de HD izle";
    document.description = $(this).find('.teams div:nth-child(1)').text() + "-" + $(this).find('.teams div:nth-child(2)').text() + "maçını SLive TV'de hd kalite ile izleyebilirisiniz.";
    const homeTeam = $(this).find('.teams div:nth-child(1)').text().replace(/\s/g,"-").toLowerCase();
    const awayTeam = $(this).find('.teams div:nth-child(2)').text().replace(/\s/g,"-").toLowerCase();
    window.history.pushState('match', title, '/live/maci-canli-izle/'+homeTeam+'-' + awayTeam);


    
    
    setTimeout(() => {
     $('.js-loader').hide();
    }, 2000);

    if($(this).attr('data-stream') !== 'null') {
      $('body').removeClass('hide-player');
      $('body').addClass('player-active');

      if($(window).width() > 768)  {
        var video = document.querySelector('.demo-player-area');
        var videoSrc = $(this).attr('data-stream');
        if (Hls.isSupported()) {
          var hls = new Hls();
          hls.loadSource(videoSrc);
          hls.attachMedia(video);
          hls.on(Hls.Events.MANIFEST_PARSED, function() {
            video.play();
          });
        }
      }

      if($(window).width() <= 768)  {
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
            fs: '0',
            preload: "metadata",
            playback: {
              controls: false,
              playInline: false,
              recycleVideo: false,            
              minimumDvrSize: null,
              hlsjsConfig: {
                  maxMaxBufferLength: 7,
                  hlsUseNextLevel: true
              },
              shakaConfiguration: {},
            }          
        });        
      }
  
    }
  });  

  $('.js-screen').on('click', function() {
    $('.player-container').toggleClass('wide');
    if($('.player-container').hasClass('wide')) {
      $('.js-screen span').text('Daralt');
    } else {
      $('.js-screen span').text('Genişlet');
    }
  });
  $('.plyr__control[data-light]').on('click', function() {
    let value = $(this).attr('data-light');
    if (value == 'on') {
        $('[data-light] span').text('Işıkları Aç');
        $('[data-light]').attr('data-light', 'off');
        $('#light-icon').html(`<g class="fa-group"><path fill="currentColor" d="M163.75 94.79C192.16 39.71 249 .2 319.45 0a175.9 175.9 0 0 1 133 291.78c-3.86 4.41-8.24 9.94-12.79 16.25l-197-152.29A80.16 80.16 0 0 1 320 96a16 16 0 1 0 0-32 112.16 112.16 0 0 0-104.22 71zm0 161.77a176 176 0 0 0 23.83 35.22c16.52 18.85 42.36 58.23 52.21 91.45 0 .26.07.52.11.78h88.74zM240 416v38.35a32 32 0 0 0 5.41 17.65l17.09 25.69A32 32 0 0 0 289.14 512h61.71a32 32 0 0 0 26.64-14.28L394.58 472a32 32 0 0 0 5.36-17.69V439.1L370 416z" class="fa-secondary"></path><path fill="currentColor" d="M3.37 31.45L23 6.18a16 16 0 0 1 22.47-2.81L633.82 458.1a16 16 0 0 1 2.82 22.45L617 505.82a16 16 0 0 1-22.46 2.81L6.18 53.9a16 16 0 0 1-2.81-22.45z" class="fa-primary"></path></g>`);

        $('body').append(`<div class="body-light"></div>`);
    } else {
        $('[data-light] span').text('Işıkları Kapat');
        $('[data-light]').attr('data-light', 'on');
        $('#light-icon').html(`<g class="fa-group"><path fill="currentColor" d="M319.45,0C217.44.31,144,83,144,176a175,175,0,0,0,43.56,115.78c16.52,18.85,42.36,58.22,52.21,91.44,0,.28.07.53.11.78H400.12c0-.25.07-.5.11-.78,9.85-33.22,35.69-72.59,52.21-91.44A175,175,0,0,0,496,176C496,78.63,416.91-.31,319.45,0ZM320,96a80.09,80.09,0,0,0-80,80,16,16,0,0,1-32,0A112.12,112.12,0,0,1,320,64a16,16,0,0,1,0,32Z" class="fa-secondary"></path><path fill="currentColor" d="M240.06,454.34A32,32,0,0,0,245.42,472l17.1,25.69c5.23,7.91,17.17,14.28,26.64,14.28h61.7c9.47,0,21.41-6.37,26.64-14.28L394.59,472A37.47,37.47,0,0,0,400,454.34L400,416H240ZM112,192a24,24,0,0,0-24-24H24a24,24,0,0,0,0,48H88A24,24,0,0,0,112,192Zm504-24H552a24,24,0,0,0,0,48h64a24,24,0,0,0,0-48ZM131.08,55.22l-55.42-32a24,24,0,1,0-24,41.56l55.42,32a24,24,0,1,0,24-41.56Zm457.26,264-55.42-32a24,24,0,1,0-24,41.56l55.42,32a24,24,0,0,0,24-41.56Zm-481.26-32-55.42,32a24,24,0,1,0,24,41.56l55.42-32a24,24,0,0,0-24-41.56ZM520.94,100a23.8,23.8,0,0,0,12-3.22l55.42-32a24,24,0,0,0-24-41.56l-55.42,32a24,24,0,0,0,12,44.78Z" class="fa-primary"></path></g>`);

        $('.body-light').remove();
    }
  });

  $('.js-category-toggle').on('click', function() {
    $(this).closest('.list-container').find('.count').remove();
    $(this).closest('.list-container').find('.js-category-toggle').removeClass('active');
    $(this).addClass('active');

    $(this).append(`
      <div class="list-count"><span>${$('.js-matches .js-match-item').length} </span>&nbsp;Maç</div>
    `);

    const active = $(this).attr('data-matchfilter');
    filterMatches(active, $(this).closest('.list-container').attr('data-tabbed'));
  });


  const filterMatches = function(type, type2) {
    if(type2 == 'live') {
      $('.js-live-matches .js-match-item').show();
      var count = 0;
      if(type !== 'all') {
        $('.js-live-matches .js-match-item').map(function() {
          if($(this).attr('data-matchfilter') !== type) {
            $(this).hide();
          } else {
            count++;
          }
        });

        $('.list-count span').text(parseInt(count));
      } else {
        $('.list-count span').text(parseInt($('.js-live-matches .js-match-item').length));
      }
    } else {
      $('.js-soon-matches .js-soon-item').show();
      var count = 0;
      if(type !== 'all') {
        $('.js-soon-matches .js-soon-item').map(function() {
          if($(this).attr('data-matchfilter') !== type) {
            $(this).hide();
          } else {
            count++;
          }
        });

        $('.list-count span').text(parseInt(count));
      } else {
        $('.list-count span').text(parseInt($('.js-soon-matches .js-soon-item').length));
      }
    }
  };  

  $('.js-tab-item').on('click', function() {
    $('.js-tab-item').removeClass('active');
    $(this).addClass('active');
    var category = $(this).attr('data-focustab');
    $('.js-tab-area').removeClass('active');
    if(category == 'live') {
      $('.js-tab-area[data-tabbed="live"]').addClass('active');
      $('.live-matches .js-category-toggle:nth-child(1)').trigger('click');
    } else {
      $('.js-tab-area[data-tabbed="soon"]').addClass('active');
      $('.soon-matches .js-category-toggle:nth-child(1)').trigger('click'); 

      if($('.js-soon-matches > div').length === 0) {
        $.ajax({
            url: "https://matches-getter.herokuapp.com/",
            type: 'GET',
            success: function(res) {
                res.soon.map(item => {
                  $('.js-soon-matches').append(`
                    <div class="single-match show match js-soon-item" data-matchfilter="${item.type}" data-stream="${item.streamId}">
                      <img src="${item.homeLogo}" width="24" height="24">
                      <div class="match-detail">
                        <div class="date">${moment.unix(item.time).format("HH:mm")} / ${item.type}</div>
                        <div class="event">${item.category}</div>
                        <div class="teams">
                          <div class="home">${item.homeName}</div>
                          <div class="away">${item.awayName}</div>
                        </div>
                      </div>
                      <img src="${item.awayLogo}" width="24" height="24">
                    </div>              
                  `);
                });         

                setTimeout(() => {
                  $('.soon-matches .js-category-toggle:nth-child(1)').trigger('click'); 
                }, 150);
            }
        }); 
      }

    }
  });

  $(document).on('click', '.js-soon-item', function() {
    $('.next-match-splash').show();
    $('.next-match-splash').css('display', 'flex');
  });

  $('.next-match-splash .close-splash').on('click', function() {
    $('.next-match-splash').hide();
  });
});

