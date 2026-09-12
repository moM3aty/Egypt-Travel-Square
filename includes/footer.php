<?php
// Path: /includes/footer.php
?>
  <footer class="footer" id="contact">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <a href="index.php" class="logo">
            <?php if(!empty($global_settings['default_logo'])): ?>
                <img src="<?= $site_logo ?>" alt="Egypt Travel Square" style="height: 75px; border-radius: 30px;">
            <?php else: ?>
                <div class="logo-icon"><i class="fa-solid fa-ankh"></i></div>
                <span class="logo-text">Egypt<span>Travel</span>Square</span>
            <?php endif; ?>
          </a>
          <p>Your trusted partner for extraordinary Egyptian adventures. With expert guides, luxury accommodations, and exclusive experiences, we transform travel dreams into reality.</p>
          
          <div class="footer-social">
            <?php if(!empty($global_settings['facebook'])): ?>
                <a href="<?= htmlspecialchars($global_settings['facebook']) ?>" aria-label="Facebook" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
            <?php endif; ?>
            <?php if(!empty($global_settings['instagram'])): ?>
                <a href="<?= htmlspecialchars($global_settings['instagram']) ?>" aria-label="Instagram" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            <?php endif; ?>
            <?php if(!empty($global_settings['tiktok'])): ?>
                <a href="<?= htmlspecialchars($global_settings['tiktok']) ?>" aria-label="TikTok" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
            <?php endif; ?>
            <?php if(!empty($global_settings['youtube'])): ?>
                <a href="<?= htmlspecialchars($global_settings['youtube']) ?>" aria-label="YouTube" target="_blank"><i class="fa-brands fa-youtube"></i></a>
            <?php endif; ?>
            <?php if(!empty($global_settings['tripadvisor'])): ?>
                <a href="<?= htmlspecialchars($global_settings['tripadvisor']) ?>" aria-label="TripAdvisor" target="_blank">
                  <svg viewBox="0 0 512 512" width="16" height="16" fill="currentColor"><path d="M374.3 125.8c-14.8-14.8-40.2-14.8-54.9 0L256 189.2l-63.4-63.4c-14.8-14.8-40.2-14.8-54.9 0L24.5 239c-15.6 15.6-15.6 40.9 0 56.5l113.1 113.1c14.8 14.8 40.2 14.8 54.9 0L256 345.3l63.4 63.4c14.8 14.8 40.2 14.8 54.9 0l113.1-113.1c15.6-15.6 15.6-40.9 0-56.5l-113.1-113.2zM256 312c-30.9 0-56-25.1-56-56s25.1-56 56-56 56 25.1 56 56-25.1 56-56 56z"></path></svg>
                </a>
            <?php endif; ?>
          </div>
        </div>
        
        <div>
          <h4 class="footer-title">Quick Links</h4>
          <ul class="footer-links">
            <li><a href="about.php">About Us</a></li>
            <li><a href="packages.php">Tour Packages</a></li>
            <li><a href="faq.php">Travel Tips & FAQs</a></li>
            <li><a href="gallery.php">Gallery</a></li>
          </ul>
        </div>
        
        <div>
          <h4 class="footer-title">Support</h4>
          <ul class="footer-links">
            <li><a href="faq.php">FAQs</a></li>
            <li><a href="payment.php">Payment Methods</a></li>
            <li><a href="privacy.php">Privacy Policy</a></li>
            <li><a href="cancellation.php">Cancellation Policy</a></li>
          </ul>
        </div>
        
        <div>
          <h4 class="footer-title">Contact Us</h4>
          <ul class="footer-contact">
            <li><i class="fa-solid fa-phone"></i><span><?= htmlspecialchars($global_settings['phone'] ?? '+20 100 679 6511') ?></span></li>
            <li><i class="fa-solid fa-envelope"></i><span><?= htmlspecialchars($global_settings['email'] ?? 'info@egypttravelsquare.com') ?></span></li>
            <li><i class="fa-solid fa-location-dot"></i><span><?= htmlspecialchars($global_settings['address'] ?? 'Cairo, Egypt') ?></span></li>
          </ul>
        </div>
      </div>
      
      <div class="footer-bottom">
        <p>© <?= date('Y') ?> Egypt Travel Square. All Rights Reserved.</p>
        <p class="designed-by">Designed by <span>GMTWEB</span></p>
      </div>
    </div>
  </footer>

  <!-- أزرار الواتساب والتقييمات العائمة (على اليسار) -->
  <a href="reviews.php" class="floating-btn reviews-btn" title="Guest Reviews">
    <i class="fa-solid fa-star"></i>
  </a>
  <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $global_settings['phone'] ?? '201006796511') ?>" target="_blank" rel="noopener" class="floating-btn whatsapp-btn" aria-label="Chat on WhatsApp">
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
  </script>

  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
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