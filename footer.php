  
    <footer class="footer">
      <div class="section dark">
        <div class="flex flex-wrap mx-auto max-w-5xl gap-8 px-2 py-4 md:py-0">
          <div class="footer-col"><?php dynamic_sidebar('footer-col-1'); ?></div>
          <div class="footer-col"><?php dynamic_sidebar('footer-col-2'); ?></div>
          <div class="footer-col"><?php dynamic_sidebar('footer-col-3'); ?></div>
        </div>
      </div>
      <div class="py-8 text-lg text-center copyright">
        <p class="mx-auto text-black-dark text-base">&copy; The Arctic Institute, <script>document.write(new Date().getFullYear());</script>. All rights reserved. Privacy Policy.</p>
        <?php dynamic_sidebar('footer-1'); ?>
      </div>
    </footer>
  </div>
  <?php wp_footer() ?>
  </body>
</html>