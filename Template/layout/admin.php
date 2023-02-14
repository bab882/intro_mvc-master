<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"> 
    <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
    <title><?php echo isset($title_for_layout)?$title_for_layout:'Administration'; ?></title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    </head> 
    <body>       
      
        <div class="topbar" style="position:static"> 
          <div class="topbar-inner"> 
            <div class="container"> 
              <h3><a href="<?php echo Router::url('admin/posts/index'); ?>">Administration</a></h3> 
              <ul class="nav"> 
                <li><a href="<?php echo Router::url('admin/posts/index'); ?>">Articles</a></li>
                <li><a href="<?php echo Router::url('admin/pages/index'); ?>">Pages</a></li>
                <li><a href="<?php echo Router::url('/'); ?>">Voir le site</a></li>
              </ul>
            </div> 
          </div> 
        </div> 
 
        <div class="container" style="padding-top:60px;">
            <?php echo $this->Session->flash(); ?>
        	<?php echo $content_for_layout; ?>
        </div>
         
    </body> 
</html>