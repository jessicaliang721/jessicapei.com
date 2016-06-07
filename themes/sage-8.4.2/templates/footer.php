<footer class="content-info text-center">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
  <div class="container-fluid">
    <div class="container">
      <p>Copyright &copy Jessica Pei <?php echo date('Y'); ?></p>
      <ul>
        <li>
          <a href="http://github.com/<?php echo get_option('github_handle'); ?>">Github</a>
        </li>
        <li>
          <a href="http://instagram.com/<?php echo get_option('instagram_handle'); ?>">Instagram</a>
        </li>
        <li>
          <a href="https://www.linkedin.com/in/<?php echo of_get_option('linkedin_handle'); ?>"><img src="<?php echo of_get_option('linkedin_icon');?>"></a>
        </li>
      </ul>

    </div>
  </div>
</footer>
