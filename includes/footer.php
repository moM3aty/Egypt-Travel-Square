<?php
// Path: /includes/footer.php
?>
  <footer class="footer" id="contact" style="background: var(--logo-navy); padding: 80px 0 0; position: relative;">
    <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, var(--logo-gold), #8B6914, var(--logo-gold));"></div>
    <div class="container">
      <div style="display: grid; grid-template-columns: 1.5fr 1fr 1fr 1.5fr; gap: 50px; padding-bottom: 60px; border-bottom: 1px solid rgba(255, 255, 255, 0.08);" class="footer-grid">
        <div class="footer-brand">
          <a href="index.php" class="logo" style="display:inline-block; margin-bottom:15px;">
            <?php if(!empty($global_settings['default_logo'])): ?>
                <img src="<?= $site_logo ?>" alt="Egypt Travel Square" style="height: 70px; border-radius: 8px;">
            <?php else: ?>
                <div style="display:flex; align-items:center; gap:10px;">
                    <div style="width:40px; height:40px; background:var(--logo-gold); border-radius:8px; display:flex; align-items:center; justify-content:center; color:var(--logo-navy); font-size:18px;"><i class="fa-solid fa-ankh"></i></div>
                    <span style="color:var(--pure-white); font-family:var(--font-display); font-size:20px; font-weight:700;">Egypt<span style="color:var(--logo-gold);">Travel</span>Square</span>
                </div>
            <?php endif; ?>
          </a>
          <p style="color: rgba(255, 255, 255, 0.6); font-size: 15px; line-height: 1.9; margin: 24px 0;">Your trusted partner for extraordinary Egyptian adventures. With expert guides, luxury accommodations, and exclusive experiences, we transform travel dreams into reality.</p>
          
          <div style="display: flex; gap: 12px; flex-wrap: wrap;" class="footer-social">
            <?php if(!empty($global_settings['facebook'])): ?>
                <a href="<?= htmlspecialchars($global_settings['facebook']) ?>" style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 4px; display: flex; align-items: center; justify-content: center; color: var(--pure-white); transition: 0.3s;" onmouseover="this.style.background='var(--logo-gold)'; this.style.borderColor='var(--logo-gold)'; this.style.color='var(--logo-navy)';" onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.1)'; this.style.color='var(--pure-white)';" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
            <?php endif; ?>
            <?php if(!empty($global_settings['instagram'])): ?>
                <a href="<?= htmlspecialchars($global_settings['instagram']) ?>" style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 4px; display: flex; align-items: center; justify-content: center; color: var(--pure-white); transition: 0.3s;" onmouseover="this.style.background='var(--logo-gold)'; this.style.borderColor='var(--logo-gold)'; this.style.color='var(--logo-navy)';" onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.1)'; this.style.color='var(--pure-white)';" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            <?php endif; ?>
            <?php if(!empty($global_settings['tiktok'])): ?>
                <a href="<?= htmlspecialchars($global_settings['tiktok']) ?>" style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 4px; display: flex; align-items: center; justify-content: center; color: var(--pure-white); transition: 0.3s;" onmouseover="this.style.background='var(--logo-gold)'; this.style.borderColor='var(--logo-gold)'; this.style.color='var(--logo-navy)';" onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.1)'; this.style.color='var(--pure-white)';" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
            <?php endif; ?>
            <?php if(!empty($global_settings['youtube'])): ?>
                <a href="<?= htmlspecialchars($global_settings['youtube']) ?>" style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 4px; display: flex; align-items: center; justify-content: center; color: var(--pure-white); transition: 0.3s;" onmouseover="this.style.background='var(--logo-gold)'; this.style.borderColor='var(--logo-gold)'; this.style.color='var(--logo-navy)';" onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.1)'; this.style.color='var(--pure-white)';" target="_blank"><i class="fa-brands fa-youtube"></i></a>
            <?php endif; ?>
            <?php if(!empty($global_settings['tripadvisor'])): ?>
                <a href="<?= htmlspecialchars($global_settings['tripadvisor']) ?>" style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 4px; display: flex; align-items: center; justify-content: center; color: var(--pure-white); transition: 0.3s;" onmouseover="this.style.background='var(--logo-gold)'; this.style.borderColor='var(--logo-gold)'; this.style.color='var(--logo-navy)';" onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.1)'; this.style.color='var(--pure-white)';" target="_blank">
                  <svg viewBox="0 0 512 512" width="16" height="16" fill="currentColor"><path d="M374.3 125.8c-14.8-14.8-40.2-14.8-54.9 0L256 189.2l-63.4-63.4c-14.8-14.8-40.2-14.8-54.9 0L24.5 239c-15.6 15.6-15.6 40.9 0 56.5l113.1 113.1c14.8 14.8 40.2 14.8 54.9 0L256 345.3l63.4 63.4c14.8 14.8 40.2 14.8 54.9 0l113.1-113.1c15.6-15.6 15.6-40.9 0-56.5l-113.1-113.2zM256 312c-30.9 0-56-25.1-56-56s25.1-56 56-56 56 25.1 56 56-25.1 56-56 56z"></path></svg>
                </a>
            <?php endif; ?>
          </div>
        </div>
        
        <div>
          <h4 style="font-family: var(--font-display); font-size: 22px; font-weight: 700; color: var(--pure-white); margin-bottom: 28px; position: relative; padding-bottom: 16px;">Quick Links<span style="position: absolute; bottom: 0; left: 0; width: 40px; height: 2px; background: var(--logo-gold);"></span></h4>
          <ul style="list-style:none; padding:0;">
            <li style="margin-bottom:14px;"><a href="about.php" style="color: rgba(255, 255, 255, 0.6); font-size: 15px; text-decoration:none;" onmouseover="this.style.color='#fff';" onmouseout="this.style.color='rgba(255,255,255,0.6)';">About Us</a></li>
            <li style="margin-bottom:14px;"><a href="packages.php" style="color: rgba(255, 255, 255, 0.6); font-size: 15px; text-decoration:none;" onmouseover="this.style.color='#fff';" onmouseout="this.style.color='rgba(255,255,255,0.6)';">Tour Packages</a></li>
            <li style="margin-bottom:14px;"><a href="faq.php" style="color: rgba(255, 255, 255, 0.6); font-size: 15px; text-decoration:none;" onmouseover="this.style.color='#fff';" onmouseout="this.style.color='rgba(255,255,255,0.6)';">Travel Tips & FAQs</a></li>
            <li style="margin-bottom:14px;"><a href="gallery.php" style="color: rgba(255, 255, 255, 0.6); font-size: 15px; text-decoration:none;" onmouseover="this.style.color='#fff';" onmouseout="this.style.color='rgba(255,255,255,0.6)';">Gallery</a></li>
          </ul>
        </div>
        
        <div>
          <h4 style="font-family: var(--font-display); font-size: 22px; font-weight: 700; color: var(--pure-white); margin-bottom: 28px; position: relative; padding-bottom: 16px;">Support<span style="position: absolute; bottom: 0; left: 0; width: 40px; height: 2px; background: var(--logo-gold);"></span></h4>
          <ul style="list-style:none; padding:0;">
            <li style="margin-bottom:14px;"><a href="faq.php" style="color: rgba(255, 255, 255, 0.6); font-size: 15px; text-decoration:none;" onmouseover="this.style.color='#fff';" onmouseout="this.style.color='rgba(255,255,255,0.6)';">FAQs</a></li>
            <li style="margin-bottom:14px;"><a href="payment.php" style="color: rgba(255, 255, 255, 0.6); font-size: 15px; text-decoration:none;" onmouseover="this.style.color='#fff';" onmouseout="this.style.color='rgba(255,255,255,0.6)';">Payment Methods</a></li>
            <li style="margin-bottom:14px;"><a href="privacy.php" style="color: rgba(255, 255, 255, 0.6); font-size: 15px; text-decoration:none;" onmouseover="this.style.color='#fff';" onmouseout="this.style.color='rgba(255,255,255,0.6)';">Privacy Policy</a></li>
            <li style="margin-bottom:14px;"><a href="cancellation.php" style="color: rgba(255, 255, 255, 0.6); font-size: 15px; text-decoration:none;" onmouseover="this.style.color='#fff';" onmouseout="this.style.color='rgba(255,255,255,0.6)';">Cancellation Policy</a></li>
          </ul>
        </div>
        
        <div>
          <h4 style="font-family: var(--font-display); font-size: 22px; font-weight: 700; color: var(--pure-white); margin-bottom: 28px; position: relative; padding-bottom: 16px;">Contact Us<span style="position: absolute; bottom: 0; left: 0; width: 40px; height: 2px; background: var(--logo-gold);"></span></h4>
          <ul style="list-style:none; padding:0;">
            <li style="display: flex; align-items: flex-start; gap: 16px; margin-bottom: 20px; color: rgba(255, 255, 255, 0.6); font-size: 15px; line-height: 1.6;"><i class="fa-solid fa-phone" style="color: var(--logo-gold); margin-top: 4px; width: 16px;"></i><span><?= htmlspecialchars($global_settings['phone'] ?? '+20 100 679 6511') ?></span></li>
            <li style="display: flex; align-items: flex-start; gap: 16px; margin-bottom: 20px; color: rgba(255, 255, 255, 0.6); font-size: 15px; line-height: 1.6;"><i class="fa-solid fa-envelope" style="color: var(--logo-gold); margin-top: 4px; width: 16px;"></i><span><?= htmlspecialchars($global_settings['email'] ?? 'info@egypttravelsquare.com') ?></span></li>
            <li style="display: flex; align-items: flex-start; gap: 16px; margin-bottom: 20px; color: rgba(255, 255, 255, 0.6); font-size: 15px; line-height: 1.6;"><i class="fa-solid fa-location-dot" style="color: var(--logo-gold); margin-top: 4px; width: 16px;"></i><span><?= htmlspecialchars($global_settings['address'] ?? 'Cairo, Egypt') ?></span></li>
          </ul>
        </div>
      </div>
      
      <div style="padding: 24px 0; display: flex; justify-content: space-between; align-items: center; color: rgba(255, 255, 255, 0.5); font-size: 14px;" class="footer-bottom">
        <p>© <?= date('Y') ?> Egypt Travel Square. All Rights Reserved.</p>
        <p>Designed by <span style="color: var(--logo-gold); font-weight: 600; letter-spacing: 1px;">GMTWEB</span></p>
      </div>
    </div>
  </footer>

  <!-- الأزرار العائمة -->
  <a href="reviews.php" style="position: fixed; left: 30px; bottom: 105px; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; color: var(--logo-navy); background: var(--logo-gold); box-shadow: 0 4px 12px rgba(0,0,0,0.3); z-index: 999; transition: 0.3s; text-decoration: none;" onmouseover="this.style.transform='scale(1.1)'; this.style.background='#b38f22';" onmouseout="this.style.transform='scale(1)'; this.style.background='var(--logo-gold)';" title="Guest Reviews">
    <i class="fa-solid fa-star"></i>
  </a>
  <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $global_settings['phone'] ?? '201006796511') ?>" target="_blank" rel="noopener" style="position: fixed; left: 30px; bottom: 30px; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 28px; color: white; background: #25D366; box-shadow: 0 4px 12px rgba(0,0,0,0.3); z-index: 999; transition: 0.3s; text-decoration: none;" onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='scale(1)';" aria-label="Chat on WhatsApp">
    <i class="fa-brands fa-whatsapp"></i>
  </a>

  <!-- Core Scripts -->
  <script>
    (function(){
      'use strict';
      var header = document.getElementById('header'),
          topBar = document.getElementById('topBar'),
          toggle = document.getElementById('mobileToggle'),
          nav = document.getElementById('navLinks'),
          icon = toggle.querySelector('i'),
          drops = document.querySelectorAll('[data-dropdown]');

      function onScroll(){ 
          if(window.scrollY > 60) {
              header.classList.add('scrolled');
          } else {
              header.classList.remove('scrolled');
          }
      }
      window.addEventListener('scroll', onScroll, {passive:true});
      onScroll();

      function openMenu(){
        nav.classList.add('active');
        icon.className='fa-solid fa-xmark';
        document.body.classList.add('menu-open');
      }
      function closeMenu(){
        nav.classList.remove('active');
        icon.className='fa-solid fa-bars';
        document.body.classList.remove('menu-open');
        document.querySelectorAll('.dropdown.open').forEach(function(d){d.classList.remove('open')});
      }
      toggle.addEventListener('click', function(){ nav.classList.contains('active') ? closeMenu() : openMenu(); });

      document.addEventListener('click', function(e){
        if(!nav.classList.contains('active')) return;
        if(e.target.closest('.header')) return;
        closeMenu();
      });

      drops.forEach(function(t){
        t.addEventListener('click', function(e){
          if(window.innerWidth > 991) return;
          e.preventDefault();
          var p = this.parentElement, was = p.classList.contains('open');
          document.querySelectorAll('.dropdown.open').forEach(function(d){ if(d !== p) d.classList.remove('open'); });
          p.classList.toggle('open', !was);
        });
      });

      function revealOnScroll() { 
          const reveals = document.querySelectorAll('.reveal'); 
          const windowHeight = window.innerHeight; 
          reveals.forEach(el => { 
              const elementTop = el.getBoundingClientRect().top; 
              if (elementTop < windowHeight - 80) el.classList.add('active'); 
          }); 
      }
      window.addEventListener('scroll', revealOnScroll, {passive:true}); 
      revealOnScroll();
    })();

    // WhatsApp Function
    function sendToWhatsApp(e, itemName) {
        e.preventDefault();
        const form = e.target;
        const name = form.name ? form.name.value : '';
        const email = form.email ? form.email.value : '';
        const msg = form.msg ? form.msg.value : '';
        const phone = "<?= preg_replace('/[^0-9]/', '', $global_settings['phone'] ?? '201006796511') ?>";
        const text = `Hello Egypt Travel Square! 🌟%0A%0A` + 
                     `I would like to book/inquire about:%0A` + 
                     `*${itemName}*%0A%0A` + 
                     `*Name:* ${name}%0A` + 
                     `*Email:* ${email}%0A` + 
                     `*Message Details:* ${msg}`;
        window.open(`https://wa.me/${phone}?text=${text}`, '_blank');
    }
  </script>

  <!--Start of Tawk.to Script (Cleaned & Tracked)-->
  <script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    
    Tawk_API.onLoad = function() {
        var pageName = "<?= isset($pageTitle) ? addslashes(str_replace(' | Egypt Travel Square', '', $pageTitle)) : 'Home Page' ?>";
        var pageUrl = window.location.href;

        Tawk_API.setAttributes({
            'Currently Viewing': pageName
        }, function (error) {});

        if(pageUrl.indexOf('tour.php') !== -1 || pageUrl.indexOf('destination.php') !== -1) {
            Tawk_API.addEvent('Viewed_Tour', {
                'Tour Name': pageName,
                'URL': pageUrl
            });
        }
    };

    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5dd51f20d96992700fc85857/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
  </script>
  <!--End of Tawk.to Script-->

</body>
</html>